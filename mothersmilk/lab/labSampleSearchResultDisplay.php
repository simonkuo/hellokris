<?php
session_start();
// store session data

?>
<html>
<head>


</head>
<body>
<h1>Search Result</h1>
<table class = "labSampleSearchResult" width="1000" border="1">
	<thead>
		<th>Sample ID</th>
		<th>Type</th>
		
	</thead>
	<tbody>
<?php
include "../donor/function.php";
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);
/*
mysql_select_db('milk_db', $con);

if (!mysql_select_db('milk_db', $con)) {
    echo 'Could not select database';
    exit;
}
*/
$mysqli = new mysqli("localhost",$_SESSION["uname"],$_SESSION["pwd"],'milk_db');

if (mysqli_connect_errno())
{
	printf("Connect failed : %s\n", mysqli_connect_error());
	exit();
}
$outstanding = $_POST["outstanding"];
$type  = "";
$sampleId = "";
if (isset($_POST["sampleId"])) {
	$sampleId = $_POST["sampleId"];
} 
if (isset($_POST["type"])) {
	$type = $_POST["type"];
}
//echo $outstanding;
//echo $type;
	if ($outstanding === 'yes')
	{
		
		$result = lab_sample_results($mysqli,$outstanding, $type);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$type = $row['type'];
			$sampleId = $row['sampleId'];
			echo "<tr>";
			echo "<td><a href=\"./labSampleResults.php?sampleId=$sampleId\">$sampleId</a></td>";
			echo "<td>$type</td>";
			
			echo "</tr>";
		  }
		 }
		
	}
	else if ($outstanding === 'no')
	{
		
		$result = lab_sample_result_by_Id($mysqli,$sampleId, $type);
		if($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) 
			{
			$type = $row['type'];
			$sampleId = $row['sampleId'];
			echo "<tr>";
			echo "<td><a href=\"./labSampleResults.php?sampleId=$sampleId\">$sampleId</a></td>";
			echo "<td>$type</td>";
			echo "</tr>";
			}
		}
	}
	else
	{
		$result = lab_sample_result_by_Id($mysqli,$sampleId, $type);
		if($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) 
			{
			$type = $row['type'];
			$sampleId = $row['sampleId'];
			echo "<tr>";
			echo "<td><a href=\"./labSampleResults.php?sampleId=$sampleId\">$sampleId</a></td>";
			echo "<td>$type</td>";
			echo "</tr>";
			}
		}
	}

mysqli_close($mysqli);
?>
	</tbody>
</table>

<div><a href="./labmenu.php">Lab Menu</a></div>

 
</body>
</html>
