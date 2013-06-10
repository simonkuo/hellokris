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
<table class = "pendinaction" width="1000" border="1">
	<thead>
		<th>Batch ID</th>
		<th>Action</th>
		<th>Date</th>
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


$result = getPendingAction($mysqli);
if($result->num_rows > 0)
{
	while ($row = $result->fetch_assoc()) 
	{
		$batchId = $row['batchId'];
		$action = $row['action'];
		$date = $row['date'];
		$date = convertFromDatabaseDateFormat($date);
		echo "<tr>";
		echo "<td>$batchId</td>";
		echo "<td>$action</td>";
		echo "<td>$date</td>";
		echo "</tr>";
	}
}




?>
</tbody>
</table>

<div><a href="./labmenu.php">Donor Menu</a></div>
</div>
</html>