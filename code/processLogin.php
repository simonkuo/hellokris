<?php include('config/main_config.php'); ?>
<?php

$urights = 0;
$fname='';
$lname='';
$dbpassword='';

// get username and password
$username = $_POST['username'];
$password = $_POST['password'];

// ---- open connection --------
$con = new mysqli(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
if ($con->connect_errno) {
    die( "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error);
}

// ---- query database ---
if($stmt = $con->prepare("SELECT userrights, firstname, lastname, password FROM usertable where username=?"))
{
  try{$bret = $stmt->bind_param('s', $username);}
  catch (Exception $e) 
   {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
   $stmt->execute();
}

// --- store result ---------- 
$stmt->store_result();

// --- bind result to variable ---------
$stmt->bind_result($urights,$fname,$lname, $dbpassword);

// --- get result --------------------
$stmt->fetch();

// --- free result -----------------
$stmt->free_result();

// --- close stmt ------------------
$stmt->close();

// ----- close connection ----
$con->close();

// check password
 
if( crypt($username . "_" . $password, $dbpassword) == $dbpassword ) 
{ // password is correct 
   
  if(($urights > 0) && ($urights & ENABLED) )
  {  // found matching username-password and enabled, set as logged in 
     session_start();
     $_SESSION['urights'] = $urights;
     $_SESSION['loginusername'] = $fname . " " . $lname;
     $_SESSION['uname'] = $username;
     $_SESSION['starttime'] = mktime();
 
     // go to home page 
     header('Location: ' . 'home.php');
     exit();
   } 
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="css/main.css" />
 <title>Login</title>
<link rel="icon" 
      type="image/ico" 
      href="images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.php"); ?>
</div>
<div id="menu"></div>
<div id="content">

<span class="message">Unable to login</span>
<div class="actionbutton  adminColor"><a href="login.php">Log In</a></div>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
