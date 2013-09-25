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
 <link rel="stylesheet" type="text/css" media="all" href="../css/main.css" />
 <title>Administration - Add User</title>
<link rel="icon" 
      type="image/ico" 
      href="../images/favicon.ico" /> 
<script type="text/javascript" src="../script/jquery.js" ></script>
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
<h1 class="pageTitle">Add User</h1>

<form id="addfrm" method="post" action="processUser.php" onsubmit="return Validate()">

<p><input type="checkbox" name="enabled" value="1" checked="checked" />Enabled</p>
<div>
<fieldset>
<legend>Priviledges</legend>
<table>
<tr><td>&nbsp;</td><td><label>None</label></td><td><label>Full</label></td><td><label>Read-only</label></td></tr>
<tr>
<td><label>Screener</label></td>
<td><input type="radio" name="screener" value="none" checked="checked"></td>
<td><input type="radio" name="screener" value="full"></td>
<td><input type="radio" name="screener" value="readonly"></td>
</tr>
<tr>
<td><label>Receiver</label></td>
<td><input type="radio" name="receiver" value="none" checked="checked"></td>
<td><input type="radio" name="receiver" value="full"></td>
<td><input type="radio" name="receiver" value="readonly"></td>
</tr>
<tr>
<td><label>Lab</label></td>
<td><input type="radio" name="lab" value="none" checked="checked"></td>
<td><input type="radio" name="lab" value="full"></td>
<td><input type="radio" name="lab" value="readonly"></td>
</tr>
<tr>
<td><label>Delivery</label></td>
<td><input type="radio" name="delivery" value="none" checked="checked"></td>
<td><input type="radio" name="delivery" value="full"></td>
<td><input type="radio" name="delivery" value="readonly"></td>
</tr>
<tr>
<td><label>Researcher</label></td>
<td><input type="radio" name="researcher" value="none" checked="checked"></td>
<td><input type="radio" name="researcher" value="full"></td>
<td><input type="radio" name="researcher" value="readonly"></td>
</tr>
<tr>
<td><label>Accounting</label></td>
<td><input type="radio" name="accounting" value="none" checked="checked"></td>
<td><input type="radio" name="accounting" value="full"></td>
<td><input type="radio" name="accounting" value="readonly"></td>
</tr>
<tr>
<td><label>Administration</label></td>
<td><input type="radio" name="admin" value="none" checked="checked"></td>
<td><input type="radio" name="admin" value="full"></td>
<td><input type="radio" name="admin" value="readonly"></td>
</tr>
<tr>
<td><label>Reports</label></td>
<td><input type="radio" name="reports" value="none" checked="checked"></td>
<td><input type="radio" name="reports" value="full"></td>
<td><input type="radio" name="reports" value="readonly"></td>
</tr>
</table>

</fieldset>

</div>
<div class="sectionBlock">
<table cellpadding="5" cellspacing="3">
<tr><td><label>First Name</label></td><td><input name="firstname" id="firstname" type="text" /></td></tr>
<tr><td><label>Middle Name</label></td><td><input name="middlename" id="middlename" type="text" /></td></tr>
<tr><td><label>Last Name</label></td><td><input name="lastname" id="lastname" type="text" /></td></tr>
<tr><td><label>Employee ID</label></td><td><input name="employeeid" id="employeeid" type="text" /></td></tr>
<tr><td><label>User Name</label></td><td><input name="username" id="username" type="text" /></td></tr>
<tr><td><label>New Password</label></td><td><input name="password" id="password" type="text" /></td></tr>
<tr><td><label>Retype Password</label></td><td><input name="password2" id="password2" type="text" /></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Submit" /></td></tr>
</table>
</div>
</form>

<script type="text/javascript">
function Validate()
{
   var obj = document.getElementById("firstname");
   var val = obj.value;
   if( val.length == 0 )
   {
     alert("Enter First Name");
     obj.focus();
     return false;
   }
   obj = document.getElementById("lastname");
   val = obj.value;
   if( val.length == 0 )
   {
     alert("Enter Last Name");
     obj.focus();
     return false;
   }
   obj = document.getElementById("employeeid");
   val = obj.value;
   if( val.length == 0 )
   {
     alert("Enter Employee ID");
     obj.focus();
     return false;
   }
   obj = document.getElementById("username");
   val = obj.value;
   if( val.length == 0 )
   {
     alert("Enter User Name");
     obj.focus();
     return false;
   }
   
   // check if entered password
   obj = document.getElementById("password");
   var pwd = obj.value;
   pwd = pwd.trim();
   obj.value = pwd;
   
   if( pwd.length == 0 )
   {
      alert("Enter Password");
      obj.focus();
      return false;
   }
   
   // check if password and retype password match
   var obj2 = document.getElementById("password2");
   var pwd2 = obj2.value;
   pwd2 = pwd2.trim();
   obj2.value = pwd2;
   if( pwd != pwd2 )
   {
      alert("Entered passwords do not match");
      obj.focus();
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
