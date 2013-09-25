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
 <title>Edit User</title>
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

<?php
$username = $_GET['uname'];
$urights = 0;
$firstname="";
$middlename="";
$lastname="";
$password="";
$employeeid="";

// ---- open connection --------
$con = new mysqli(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
if ($con->connect_errno) {
    die( "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error);
}

// ---- query database ---
if($stmt = $con->prepare("SELECT userrights, firstname, middlename, lastname, password, employeeid FROM usertable where username=?"))
{
  try{$bret = $stmt->bind_param('s', $username);}
  catch (Exception $e) 
   {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
   $stmt->execute();
}

// --- bind result to variable ---------
$stmt->bind_result($urights,$firstname,$middlename,$lastname, $password, $employeeid);

// --- get result --------------------
$stmt->fetch(); 

$enable = "";
$s1 = $s2 = $s3 = "";
$r1 = $r2 = $r3 = "";
$l1 = $l2 = $l3 = "";
$d1 = $d2 = $d3 = "";
$rs1 = $rs2 = $rs3 = "";
$acct1 = $acct2 = $acct3 = "";
$ad1 = $ad2 = $ad3 = "";

if( $urights & ENABLED )
  $enabled = "checked";
if( $urights & SCREENER_FULL )
  $s2 = "checked";
else if( $urights & SCREENER_READONLY )
  $s3 = "checked";
else
  $s1 = "checked";

if( $urights & RECEIVER_FULL )
  $r2 = "checked";
else if( $urights & RECEIVER_READONLY )
  $r3 = "checked";
else
  $r1 = "checked";
 
if( $urights & LAB_FULL )
  $l2 = "checked";
else if( $urights & LAB_READONLY )
  $l3 = "checked";
else
  $l1 = "checked";

if( $urights & DELIVERY_FULL )
  $d2 = "checked";
else if( $urights & DELIVERY_READONLY )
  $d3 = "checked";
else
  $d1 = "checked";

if( $urights & RESEARCHER_FULL )
  $rs2 = "checked";
else if( $urights & RESEARCHER_READONLY )
  $rs3 = "checked";
else
  $rs1 = "checked";

if( $urights & ACCOUNTING_FULL )
  $acct2 = "checked";
else if( $urights & ACCOUNTING_READONLY )
  $acct3 = "checked";
else
  $acct1 = "checked";

if( $urights & ADMIN_FULL )
  $ad2 = "checked";
else if( $urights & ADMIN_READONLY )
  $ad3 = "checked";
else
  $ad1 = "checked";

if( $urights & REPORTS_FULL )
  $rt2 = "checked";
else if( $urights & REPORTS_READONLY )
  $rt3 = "checked";
else
  $rt1 = "checked";


// --- close statement --------------------
$stmt->close();

// --- close connection -----------------
$con->close();

?>
<form id="editfrm" method="post" action="processUser.php?edit=1" onsubmit="return validate();">

<p><input type="checkbox" name="enabled" value="1" <?php echo $enabled ?> />Enabled</p>
<div>
<fieldset>
<legend>Priviledges</legend>
<table>
<tr><td>&nbsp;</td><td><label>None</label></td><td><label>Full</label></td><td><label>Read-only</label></td></tr>
<tr>
<td><label>Screener</label></td>
<td><input type="radio" name="screener" value="none" <?php echo $s1 ?> ></td>
<td><input type="radio" name="screener" value="full" <?php echo $s2 ?> ></td>
<td><input type="radio" name="screener" value="readonly" <?php echo $s3 ?> ></td>
</tr>
<tr>
<td><label>Receiver</label></td>
<td><input type="radio" name="receiver" value="none" <?php echo $r1 ?> ></td>
<td><input type="radio" name="receiver" value="full" <?php echo $r2 ?> ></td>
<td><input type="radio" name="receiver" value="readonly" <?php echo $r3 ?> ></td>
</tr>
<tr>
<td><label>Lab</label></td>
<td><input type="radio" name="lab" value="none" <?php echo $l1 ?> ></td>
<td><input type="radio" name="lab" value="full" <?php echo $l2 ?> ></td>
<td><input type="radio" name="lab" value="readonly" <?php echo $l3 ?> ></td>
</tr>
<tr>
<td><label>Delivery</label></td>
<td><input type="radio" name="delivery" value="none" <?php echo $d1 ?> ></td>
<td><input type="radio" name="delivery" value="full" <?php echo $d2 ?> ></td>
<td><input type="radio" name="delivery" value="readonly" <?php echo $d3 ?> ></td>
</tr>
<tr>
<td><label>Researcher</label></td>
<td><input type="radio" name="researcher" value="none" <?php echo $rs1 ?> ></td>
<td><input type="radio" name="researcher" value="full" <?php echo $rs2 ?> ></td>
<td><input type="radio" name="researcher" value="readonly" <?php echo $rs3 ?> ></td>
</tr>
<tr>
<td><label>Accounting</label></td>
<td><input type="radio" name="accounting" value="none" <?php echo $acct1 ?> ></td>
<td><input type="radio" name="accounting" value="full" <?php echo $acct2 ?> ></td>
<td><input type="radio" name="accounting" value="readonly" <?php echo $acct3 ?> ></td>
</tr>
<tr>
<td><label>Administration</label></td>
<td><input type="radio" name="admin" value="none" <?php echo $ad1 ?> ></td>
<td><input type="radio" name="admin" value="full" <?php echo $ad2 ?> ></td>
<td><input type="radio" name="admin" value="readonly" <?php echo $ad3 ?> ></td>
</tr>
<tr>
<td><label>Reports</label></td>
<td><input type="radio" name="reports" value="none" <?php echo $rt1 ?> ></td>
<td><input type="radio" name="reports" value="full" <?php echo $rt2 ?> ></td>
<td><input type="radio" name="reports" value="readonly" <?php echo $rt3 ?> ></td>
</tr>
</table>
</fieldset>

</div>
<div class="sectionBlock">
<table cellpadding="2" cellspacing="2">
<tr><td><label>User Name</label></td><td><?php echo $username ?></td></tr>
<tr><td><label>First Name</label></td><td><input name="firstname" type="text" value="<?php echo $firstname ?>" /></td></tr>
<tr><td><label>Middle Name</label></td><td><input name="middlename" type="text" value="<?php echo $middlename ?>" /></td></tr>
<tr><td><label>Last Name</label></td><td><input name="lastname" type="text" value="<?php echo $lastname ?>" /></td></tr>
<tr><td><label>Employee ID</label></td><td><input name="employeeid" type="text" value="<?php echo $employeeid ?>" /></td></tr>
<tr><td><input name="username" type="hidden" value="<?php echo $username ?>" />
<label>New Password</label></td><td><input name="password" id="password" type="text" value="" /></td></tr>
<tr><td><label>Retype Password</label></td><td><input name="password2" id="password2" type="text" value="" /></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Submit" />&nbsp;<input type="button" class="backbutton" name="back" value="Back" onclick="document.location.href='searchUserResults.php'" /></td></tr>
</table>
</div>

</form>

<script language="javascript">
function validate()
{
    // if password entered, check if matched retype password
   var obj = document.getElementById("password");
   var pwd = obj.value;
   pwd = pwd.trim();
   obj.value = pwd;
   
   var obj2 = document.getElementById("password2");
   var pwd2 = obj2.value;
   pwd2 = pwd2.trim();
   obj2.value = pwd2;
  
   if( pwd.length > 0 && pwd2.length > 0 ) // entered password
   {
      if( pwd != pwd2 )
      {
        alert("Entered passwords do not match");
        obj.focus();
        return false;
      }
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
