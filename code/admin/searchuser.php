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

// clear any saved search
if( isset($_SESSION['savedusersearch']) )
{
  unset($_SESSION['savedusersearch']);
}
?>

<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Search User</title>
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

<h1 class="pageTitle">Search User</h1>

<fieldset class="search">
<legend>Search By Name:</legend>
<form id="searchfrm" method="post" action="searchUserResults.php" onsubmit="return DoFind()">
<p><label>First Name</label><input type="text" name="firstname" /></p>
<p><label>Last Name</label><input type="text" name="lastname" /></p>

<p><input type="submit" name="search_name" value="Search" /></p>
</form>

</fieldset>
<fieldset class="search">
<legend>Search By Privileges</legend>
<form id="searchRightsFrm" method="post" action="searchUserResults.php" onsubmit="return DoFind()">
<p><input type="checkbox" name="screener" value="1" /><label>Screener</label></p>
<p><input type="checkbox" name="receiver" value="1" /><label>Receiver</label></p>
<p><input type="checkbox" name="lab" value="1" /><label>Lab</label></p>
<p><input type="checkbox" name="delivery" value="1" /><label>Delivery</label></p>
<p><input type="checkbox" name="acct" value="1" /><label>Accounting</label></p>
<p><input type="checkbox" name="admin" value="1" /><label>Administration</label></p>
<p><input type="checkbox" name="research" value="1" /><label>Researcher</label></p>
<p><input type="submit" name="search_rights" value="Search" /></p>
</form>
</fieldset>
<fieldset class="search">
<legend>Search By User Name</legend>
<form id="searchIDForm" method="post" action="searchUserResults.php" onsubmit="return DoFind()">
<p><label>User Name</label><input type="text" name="username" /></p>
<p><input type="submit" name="search_username" value="Search" /></p>
</form>
</fieldset>



<div id="searchResults"></div>

<script type="text/javascript" src="/mothersmilk/script/jquery.js"></script>
<script type="text/javascript" >
function DoFind()
{
   // do validation here
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
