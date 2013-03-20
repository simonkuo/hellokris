<?php
// --- make sure session variables cleared ------
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="css/main.css" />
 <title>No Page Rights</title>
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
<h1 class="pageTitle">No Page Rights</h1>

You do not have privileges to access the page.
<br>Contact the system administrator.
<div class="actionbutton"><a href="home.php">Go back to home</a></div>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.inc"); ?>
</div>
</div>
</body>
</html>
