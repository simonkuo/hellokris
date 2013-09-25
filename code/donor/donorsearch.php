<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & SCREENER_RIGHTS) )
  { // no admin rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }

// clear any saved search
if( isset($_SESSION['saveddonorsearch']) )
  unset($_SESSION['saveddonorsearch']);
if( isset($_SESSION["donorpagenum"]) ) 
   unset($_SESSION["donorpagenum"]);
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Donor Search</title>
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

<div id="content">

<h1 class="pageTitle">Donor Search</h1>

<label>Donor Application Date:</label>

<form action="donorslt.php" method="post">

<p><label>From:</label> 
<input type="int" name="fdnrapmm" size="2" maxlength="2">&nbsp;
<input type="int" name="fdnrapdd" size="2" maxlength="2">&nbsp;
<input type="int" name="fdnrapyr" size="4" maxlength="4">
&nbsp;mm-dd-yyyy
</p>


<p><label>To:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="int" name="tdnrapmm" size="2" maxlength="2">&nbsp;
<input type="int" name="tdnrapdd" size="2" maxlength="2">&nbsp;
<input type="int" name="tdnrapyr" size="4" maxlength="4">
&nbsp;mm-dd-yyyy
</p>



</br>

<p><b>Last Name:</b>&nbsp;&nbsp;<input type="text" name="lastname"></p>
 
<p><b>Donor #:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="int" name="donornumber"></p>
 
<input type="submit" value="Search">
</br>
</form>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

