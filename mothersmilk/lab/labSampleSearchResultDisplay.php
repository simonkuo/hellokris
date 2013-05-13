<?php
session_start();
// store session data

?>
<html>
<head>


</head>
<body>
<?php
include "../donor/function.php";
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);
mysql_select_db('milk_db', $con);

if (!mysql_select_db('milk_db', $con)) {
    echo 'Could not select database';
    exit;
}
if (isset($_POST["batchNumber"]) && $_POST["batchNumber"] != "" && isset($_POST["bottleNumber"]) && $_POST["bottleNumber"] != "") {
	$result = batch_result($_POST["batchNumber"],$_POST["bottleNumber"]);
	echo $result;
} elseif (isset($_POST["packageNumber"]) && $_POST["packageNumber"] != ""  && isset($_POST["sequenceNumber"]) && $_POST["sequenceNumber"] != "" ) {
	echo $_POST["packageNumber"];
	echo $_POST["sequenceNumber"];
} else {
  echo "onthing";
}
mysql_close($con);
?>

<div><a href="./labmenu.php">Donor Menu</a></div>

 
</body>
</html>
