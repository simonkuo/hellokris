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
	<META NAME="AUTHOR" CONTENT="Thanh Au">
	<META NAME="CREATED" CONTENT="20131413;15512700">
	<META NAME="CHANGEDBY" CONTENT="Thanh Au">
	<META NAME="CHANGED" CONTENT="20131413;16005500">
	<link type="text/css" rel="stylesheet" href="../donor/mystyle.css">
<!--

-->

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<div>
<h1> Inventory Report </h1>

<?php
include 'receiverFunction.php'; 
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);
mysql_select_db('milk_db', $con);
if (!mysql_select_db('milk_db', $con)) 
   {
      echo 'Could not select database';
      exit;
   }
/*
$sql = "SELECT donornumberr,packagenumber,numberofounces,milkgrade,expressionrange,storagelocation,receivedate FROM receivertable where packetstate = 'W' order by donornumberr";
$result = mysql_query($sql, $con); 
*/
$result = invetoryBaseOnMilkStatus('R','donornumberr','packagenumber','numberofounces','milkgrade','expressionrange','storagelocation','receivedate');
?>
<h2>Milk with "Ready" Status</h2>
<table class = "inventoryReport" width="1000" border="1">
	<thead>
		<th>Donor number</th>
		<th>Package number</th>
		<th>Number of Ounces</th>
		<th>Milk grade</th>
		<th>Expression date range</th>
		<th>Location in freezer</th>
		<th>Date received</th>
	</thead>
	<tbody>
<?php
	while ($row = mysql_fetch_assoc($result))
	{
		$donornum = $row['donornumberr'];
		$packagenumber = $row['packagenumber'];
		$numberofounces = $row['numberofounces'];
		$milkgrade = $row['milkgrade'];
		$expressionrange = $row['expressionrange'];
		$storagelocation = $row['storagelocation'];
		$receivedate = $row['receivedate'];
		echo "<tr>";
		echo "<td>$donornum</td>";
		echo "<td>$packagenumber</td>";
		echo "<td>$numberofounces</td>";
		echo "<td>$milkgrade</td>";
		echo "<td>$expressionrange</td>";
		echo "<td>$storagelocation</td>";
		echo "<td>$receivedate</td>";
		echo "</tr>";
	}
?>
	
	</tbody>
</table>

<?php
$result = invetoryBaseOnMilkStatus('W','donornumberr','packagenumber','numberofounces','milkgrade','expressionrange','storagelocation','receivedate');


if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
 ?>
<h2>Milk with "Waiting" Status</h2>
<table class = "inventoryReport" width="1000" border="1">
	<thead>
		<th>Donor number</th>
		<th>Package number</th>
		<th>Number of Ounces</th>
		<th>Milk grade</th>
		<th>Expression date range</th>
		<th>Location in freezer</th>
		<th>Date received</th>
	</thead>
	<tbody>
<?php
	while ($row = mysql_fetch_assoc($result))
	{
		$donornum = $row['donornumberr'];
		$packagenumber = $row['packagenumber'];
		$numberofounces = $row['numberofounces'];
		$milkgrade = $row['milkgrade'];
		$expressionrange = $row['expressionrange'];
		$storagelocation = $row['storagelocation'];
		$receivedate = $row['receivedate'];
		echo "<tr>";
		echo "<td>$donornum</td>";
		echo "<td>$packagenumber</td>";
		echo "<td>$numberofounces</td>";
		echo "<td>$milkgrade</td>";
		echo "<td>$expressionrange</td>";
		echo "<td>$storagelocation</td>";
		echo "<td>$receivedate</td>";
		echo "</tr>";
	}
?>
	
	</tbody>
</table>
<?php
mysql_free_result($result); 
mysql_close($con);
?>
</div>
<div class = "anchor"><a href="./receivingmenu.php">Receiver Menu</a></div>


</BODY>
</HTML>
