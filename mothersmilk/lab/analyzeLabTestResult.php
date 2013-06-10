<?php
session_start();
// store session data

?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="lab.js"></script>
</head>
<div>
<table class = "BatchResult" width="1000" border="1">
	<thead>
		<th>Sample ID</th>
		<th>Type</th>
		<th>Employee</th>
		<th>Date of Sample</th>
		<th>Date of Complete</th>
		<th>CFU</th>
		<th>SPP</th>
		<th>staph</th>
		<th>MRSA</th>
	</thead>
	<tbody>
<?php
include "../donor/function.php";
//$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);
$mysqli = new mysqli("localhost",$_SESSION["uname"],$_SESSION["pwd"],'milk_db');

if (mysqli_connect_errno())
{
	printf("Connect failed : %s\n", mysqli_connect_error());
	exit();
}

$sampleId = "";
if (isset($_GET["sampleId"])) {
	$sampleId = $_GET["sampleId"];
	//echo $sampleId;
} 
$result = batch_sample_result($mysqli);

if($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) 
	{
	$sampleId = $row['sampleId'];
	$type = $row['type'];
	$employee = $row['employeeId'];
	$dateofsample = $row['dateofsample'];
	$dateofcomplete = $row['dateofcomplete'];
	$CFU = $row['CFU'];
	$SPP = $row['SPP'];
	$staph = $row['staph'];
	$MRSA = $row['MRSA'];
	
	echo "<tr>";
	echo "<td><a href=\"./analyzeLabTest.php?sampleId=$sampleId\">$sampleId</a></td>";
	echo "<td>$type</td>";
	echo "<td>$employee</td>";
	echo "<td>$dateofsample</td>";
	echo "<td>$dateofcomplete</td>";
	echo "<td>$CFU</td>";
	echo "<td>$SPP</td>";
	echo "<td>$staph</td>";
	echo "<td>$MRSA</td>";
	echo "</tr>";
	}
}






?>
</tbody>
</table>

<div><a href="./labmenu.php">Donor Menu</a></div>
</div>
</html>