<?php
session_start();
// store session data

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 3.3  (Linux)">
	<META NAME="AUTHOR" CONTENT="Pat Dumalanta">
	<META NAME="CREATED" CONTENT="20121123;15512700">
	<META NAME="CHANGEDBY" CONTENT="Pat Dumalanta">
	<META NAME="CHANGED" CONTENT="20121123;16005500">

<?php include '../mystyle.php'; ?>


</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>

<menu>
       <form action="../dbenter.php" style="display:inline">
  <li>
          <input type="submit" id="mysubmit" value="Main Menu">
  </li>
       </form>
  <li>
       <form action="./recipsearch.php" style="display:inline">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="mysubmit" value="Recipient Search">
       </form>
  </li>
</menu>



<?php



Print_r ($_SESSION);



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
