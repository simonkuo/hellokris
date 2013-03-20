<?php include('config/main.config'); ?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="css/main.css" />
 <title>Administration Home</title>
<link rel="icon" 
      type="image/ico" 
      href="images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.inc"); ?>
</div>
<div id="menu"></div>
<div id="content">
<?php

$urights = 0;
$fname='';
$lname='';

// get username and password
$username = $_POST['username'];
$password = $_POST['password'];
 
// get page to return
$returnpage = $_POST['returnpage'];

// ---- open connection --------
$con = new mysqli(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
if ($con->connect_errno) {
    die( "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error);
}

// ---- query database ---
if($stmt = $con->prepare("SELECT urights, fname, lname FROM milkusr where mlktech=? and password=?"))
{
  try{$bret = $stmt->bind_param('ss', $username, $password);}
  catch (Exception $e) 
   {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
   $stmt->execute();
}

// --- store result ---------- 
$stmt->store_result();

// --- bind result to variable ---------
$stmt->bind_result($urights,$fname,$lname);

// --- get result --------------------
$stmt->fetch();

// --- free result -----------------
$stmt->free_result();

// --- close stmt ------------------
$stmt->close();

// ----- close connection ----
$con->close();

if($urights > 0 )
{  // found matching username-password, set as logged in 
  session_start();
  $_SESSION['urights'] = $urights;
  $_SESSION['loginusername'] = $fname . " " . $lname;
  $_SESSION['starttime'] = mktime();
  header('Location: ' . $returnpage);  
  exit();
} 

?>
Unable to login
<div class="actionbutton"><a href="login.php?pg=<?php echo $returnpage ?>">Log In</a></div>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.inc"); ?>
</div>
</div>
</body>
</html>
