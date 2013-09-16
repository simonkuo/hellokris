<!-- 
This is sample page
need to:
(1) change text in title tage
(2) add page content in the div with id of content
(3) modify user rights checking (eg. sample is checking admin rights ADMIN_RIGHTS )
-->
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
<!-- uncomment if including message display
<div id="systemmessage">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/SystemMessage.php"); ?>
</div>
-->
<div id="content">

<!-- add content here -->

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
