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
 <title>Donor Entry Management Home</title>
<link rel="icon" 
      type="image/ico" 
      href="/mothersmilk/images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.php"); ?>
</div>
<div id="menu"></div>
<div id="messagebar">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/MessageBar.php"); ?>
</div>
<!--<div id="message" class="marquee"></div> -->
<div id="content">

<?php
$return="";

// --- get posted form values -----
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];

$sql="";
$params="";


// --- 
$sql="select username, firstname, middlename, lastname from usertable";
if (isset($_POST['search_username']))
{ // searching by username
  if( isset($_POST['username']) && strlen(trim($_POST['username'])) > 0 )
  {
    $sql .= " where username like '%" . $_POST['username'] . "%'"; 
  }   
 
}

if (isset($_POST['search_rights']))
{ // searching by privileges
  $where ="";
  if( isset($_POST['screener']) && ($_POST['screener']== 1 ) )
    $where .= "(userrights & " . SCREENER_RIGHTS . " > 0) or (userrights & " . SCREENER_READONLY . " > 0)";
  if( isset($_POST['receiver']) && ($_POST['receiver']== 1 ) )
  { 
    if( strlen($where) > 0 ) $where .= " or ";
    $where .= "(userrights & " . RECEIVER_RIGHTS . " > 0) or (userrights & " . RECEIVER_READONLY . " > 0)";
  }
  if( isset($_POST['lab']) && ($_POST['lab']== 1 ) )
  { 
    if( strlen($where) > 0 ) $where .= " or ";
    $where .= "(userrights & " . LAB_RIGHTS . " > 0) or (userrights & " . LAB_READONLY . " > 0)";
  }
  if( isset($_POST['delivery']) && ($_POST['delivery']== 1 ) )
  { 
    if( strlen($where) > 0 ) $where .= " or ";
    $where .= "(userrights & " . DELIVERY_RIGHTS . " > 0) or (userrights & " . DELIVERY_READONLY . " > 0)";
  }
 if( isset($_POST['acct']) && ($_POST['acct']== 1 ) )
  { 
    if( strlen($where) > 0 ) $where .= " or ";
    $where .= "(userrights & " . ACCOUNTING_RIGHTS . " > 0) or (userrights & " . ACCOUNTING_READONLY . " > 0)";
  }
 if( isset($_POST['admin']) && ($_POST['admin']== 1 ) )
  { 
    if( strlen($where) > 0 ) $where .= " or ";
    $where .= "(userrights & " . ADMIN_RIGHTS . " > 0) or (userrights & " . ADMIN_READONLY . " > 0)";
  }
  if( isset($_POST['research']) && ($_POST['research']== 1 ) )
  { 
    if( strlen($where) > 0 ) $where .= " or ";
    $where .= "(userrights & " . RESEARCHER_RIGHTS . " > 0) or (userrights & " . RESEARCHER_READONLY . " > 0)";
  }
  if( strlen($where) > 0 )
    $sql .= " where " . $where;
}
if (isset($_POST['search_name']))
{ // searching by name
  $fields = 0;
  $where = ""; 
  if( isset($_POST['firstname']) && (strlen($_POST['firstname']) > 0) )
     $where .= " where firstname like '%" . $_POST['firstname'] . "%'";
  if( isset($_POST['lastname']) && (strlen($_POST['lastname']) > 0) )
  {
    if( strlen($where) > 0 )
      $where .= " or "; 
    else
      $where .= " where "; 
    $where .= "lastname like '%" . $_POST['lastname'] . "%'";
  }
  $sql .= $where;   
}



// ---- open connection --------
$con = new mysqli(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
if ($con->connect_errno) {
    die( "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error);
}


// process results
if ($result = $con->query($sql)) 
{
   echo "<table cellpadding=5 cellspacing=5 border=1>\n";
   echo "<tr><td>user name</td><td>Name</td><td>Action</td></tr>\n";
    /* fetch object array */
    while ($row = $result->fetch_row()) 
    {
        echo "<tr>\n";
        echo "<td>" . $row[0] . "</td>\n";
        echo "<td>" . $row[1]  . " " . $row[2] . " " . $row[3] . "</td>\n";
        echo '<td><a href="edituser.php?uname=' . $row[0] . '">edit</a></td>';
        echo "</tr>\n";
    }
    echo "</table>";

    /* free result set */
    $result->close();
}

/* close connection */
$con->close();


echo $return;


?>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
