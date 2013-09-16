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
 <title>Administration Home</title>
<link rel="icon" 
      type="image/ico" 
      href="../images/favicon.ico" />
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
<div id="content">
<h1 class="pageTitle">Administration</h1>

<section class="centerblock">
<div class="actionbutton adminColor"><a href="adduser.php">Add User</a></div>
<div class="actionbutton adminColor"><a href="searchuser.php">Search User</a></div>
</section>

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
