<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");
  
  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & ADMIN_RIGHTS) )
  { // no admin rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }
?>  

<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Process User</title>
<link rel="icon" 
      type="image/ico" 
      href="/mothersmilk/images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.php"); ?>
</div>
<div id="messagebar">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/MessageBar.php"); ?>
</div>
<div id="content">
<?php 

function CreatePasswordHash($input)
{
  $salt_char_set = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./');

  $salt = "";
  for($i=0; $i < 22; $i++) 
  { 
    $salt .= $salt_char_set[array_rand($salt_char_set)];
  }
  $hash = crypt($input, '$2a$08$' . $salt);
  return $hash; 
}

// add or edit user
$bEdit = isset($_GET['edit']) ? $_GET['edit'] : 0;

// ---  get form elements  -----
$urights = 0;
$username="";
$password="";
$firstname="";
$middlename="";
$lastname="";
$techtype="";

if( isset($_POST['enabled']) && $_POST['enabled'] == '1' )
  $urights += ENABLED;
if( isset($_POST['screener']) )
{

  if( $_POST['screener'] == 'full' )
    $urights += SCREENER_FULL;
  else if( $_POST['screener'] == 'readonly')
    $urights += SCREENER_READONLY;
}

if( isset($_POST['receiver']) )
{
 if( $_POST['receiver'] == 'full' )
    $urights += RECEIVER_FULL;
  else if( $_POST['receiver'] == 'readonly')
    $urights += RECEIVER_READONLY;
}
if( isset($_POST['lab']) )
{
 if( $_POST['lab'] == 'full' )
    $urights += LAB_FULL;
  else if( $_POST['lab'] == 'readonly')
    $urights += LAB_READONLY;
}
if( isset($_POST['delivery']) )
{
 if( $_POST['delivery'] == 'full' )
    $urights += DELIVERY_FULL;
  else if( $_POST['delivery'] == 'readonly')
    $urights += DELIVERY_READONLY;
}
if( isset($_POST['accounting']) )
{
 if( $_POST['accounting'] == 'full' )
    $urights += ACCOUNTING_FULL;
  else if( $_POST['accounting'] == 'readonly')
    $urights += ACCOUNTING_READONLY;
}
if( isset($_POST['admin']) )
{
 if( $_POST['admin'] == 'full' )
    $urights += ADMIN_FULL;
  else if( $_POST['admin'] == 'readonly')
    $urights += ADMIN_READONLY;
}
if( isset($_POST['researcher']) )
{
 if( $_POST['researcher'] == 'full' )
    $urights += RESEARCHER_FULL;
  else if( $_POST['researcher'] == 'readonly')
    $urights += RESEARCHER_READONLY;
}

if( isset($_POST['reports']) )
{
 if( $_POST['reports'] == 'full' )
    $urights += REPORTS_FULL;
  else if( $_POST['reports'] == 'readonly')
    $urights += REPORTS_READONLY;
}

$username = $_POST['username'];
$password = $_POST['password']; 
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$employeeid = $_POST['employeeid'];

$hasFailed = false;
$resultMessage = "";

// ---- open connection --------
$con = new mysqli(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
if ($con->connect_errno) {
    die( "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error);
}


// ---- execute statement ---
if( $bEdit == 1 )
{
   $resultMessage = "Updated User";
   $sql = "update usertable set userrights=?,firstname=?,lastname=?,middlename=?,employeeid=?";
   
   if( $password != "" )
     $sql .= ",password=?";
   
   $sql .= " where username=?";
   if( $stmt = $con->prepare($sql) )
   {
      if( $password != "" )
   	  {
   	     $password = CreatePasswordHash($username . "_" . $password);
   	     if( !$stmt->bind_param("issssss", $urights, $firstname, $lastname, $middlename,$employeeid,$password,$username) )
   	        $hasFailed = true;  
      }
      else 
   	  {   
   	     if( !$stmt->bind_param("isssss", $urights, $firstname, $lastname, $middlename,$employeeid,$username))
   	       $hasFailed = true;
   	  }
      if( !$stmt->execute() )
        $hasFailed = true;   	
      $stmt->close();      
   }
   else
   {
     $hasFailed = true;
   }
   
   if( $hasFailed )
   {
     $resultMessage = "Unable to modify user information.<br>Error:" .  $con->error;
   }
   
}
else
{
   $resultMessage = "Added New User";

   //check if username is duplicate
   $stmt = $con->prepare("select * from usertable where username=?");
   $stmt->bind_param("s",$username);
   $stmt->execute();
   $stmt->store_result();
   if( $stmt->num_rows == 0 )  // username not used
   { 
     $stmt->close(); 
     $password = CreatePasswordHash($username . "_" . $password);
     $stmt = $con->prepare("insert into usertable(userrights,firstname,lastname,middlename,password,employeeid,username) values (?,?,?,?,?,?,?)");
     if( $stmt->bind_param("issssss", $urights, $firstname, $lastname, $middlename, $password,$employeeid,$username) )
     {
       if( !$stmt->execute() )
         $hasFailed = true;
     }  
     if( $hasFailed )
     {
       $resultMessage = "Unable to modify user information.<br>Error:" .  $con->error;
     }
   }
   else
   {
      $hasFailed = true;
      $resultMessage = "Unable to add new user. <br>The user name '" . $username . "' is already used.";
   }
   $stmt->close(); 
}


// ---- close connection --------
$con->close();

echo "<span class=\"message\">" . $resultMessage . "</span>";
 
?>
<div class="actionbutton adminColor"><a href="AdminHome.php">Admin Home</a></div>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
