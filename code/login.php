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
<div id="systemmessage">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/SystemMessage.php"); ?>
</div>
<div id="menu"></div>

<div id="content">
<h1 class="pageTitle">Login</h1>

<div>
<form id="frmLogin" action="processLogin.php" method="post" onSubmit="return DoValidation();"> 
<?php
$returnpage = "";
$returnpage = $_GET['pg'];
echo '<input type="hidden" name="returnpage" value="' . $returnpage . '" />';
?>
<table cellpadding="5" cellspacing="5">
<tr><td><label>User Name:</label></td><td><input type="text" id="username" name="username" /></td></tr>
<tr><td><label>Password:</label></td><td><input type="password" id="password" name="password" autocomplete="off" /></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Log In" /></td></tr>
</table>
</form>

</div>
<script type="text/javascript">

document.getElementById("username").focus();
function DoValidation()
{
  var val = document.getElementById("username").value;
  if( val.length == 0 )
  {
     alert( "Enter User Name" );
     document.getElementById("username").focus();
     return false;
  }
  val = document.getElementById("password").value;
  if( val.length == 0 )
  {
     alert( "Enter Password" );
     document.getElementById("password").focus();
     return false;
  }
  return true;
}
</script>

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
