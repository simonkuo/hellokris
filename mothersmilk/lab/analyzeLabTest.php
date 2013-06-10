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
<table class = "labSampleSearchResult" width="1000" border="1">
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
$result = lab_sample_result_information($mysqli, $sampleId);
	
	$row = $result->fetch_assoc();
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
	echo "<td><a href=\"./labSampleResults.php?sampleId=$sampleId\">$sampleId</a></td>";
	echo "<td>$type</td>";
	echo "<td>$employee</td>";
	echo "<td>$dateofsample</td>";
	echo "<td>$dateofcomplete</td>";
	echo "<td>$CFU</td>";
	echo "<td>$SPP</td>";
	echo "<td>$staph</td>";
	echo "<td>$MRSA</td>";
	echo "</tr>";

$result = getOtherIdFromBatchId($mysqli,$sampleId);

if($result->num_rows > 0) {
	while ($other = $result->fetch_assoc()) 
	{
	//echo $other['other'];
	
	$rowResult = lab_sample_result_information($mysqli, $other['other']);
	
	$row = $rowResult->fetch_assoc();
	$sampleId = $row['sampleId'];
	$type = $row['type'];
	$employee = $row['employeeId'];
	$dateofsample = $row['dateofsample'];
	$dateofsample  = convertFromDatabaseDateFormat($dateofsample);
	$dateofcomplete = $row['dateofcomplete'];
	$dateofcomplete = convertFromDatabaseDateFormat($dateofcomplete);
	$CFU = $row['CFU'];
	$SPP = $row['SPP'];
	$staph = $row['staph'];
	$MRSA = $row['MRSA'];
	
	echo "<tr>";
	echo "<td><a href=\"./labSampleResults.php?sampleId=$sampleId\">$sampleId</a></td>";
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
<div>
	<label>Action:</label>
	<select name="action" id="action">
	<option value="N/A">N/A</option>
	<option value="cleared">Cleared</option>
	<option value="notaccepted">Not Acceptable</option>
	<option value="retestrequired">Retest Required</option>
	</select>
	<span id="optionalType"></span>
<div>
<div><a href="./labmenu.php">Donor Menu</a></div>
</div>
</html>