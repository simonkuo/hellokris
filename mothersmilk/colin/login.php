
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
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.inc"); ?>
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
<p><label>User Name&nbsp;&nbsp;</label><input type="text" name="username" /></p>
<p><label>Password&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="password" name="password" autocomplete="off" /></p>
<p><input type="submit" name="submit" value="submit" /></p>
</form>

</div>
<script type="text/javascript">
function DoValidation()
{
  return true;
}
</script>

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.inc"); ?>
</div>
</div>
</body>
</html>
