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
<?php
include "../donor/function.php";
$mysqli = new mysqli("localhost",$_SESSION["uname"],$_SESSION["pwd"],'milk_db');

if (mysqli_connect_errno())
{
	printf("Connect failed : %s\n", mysqli_connect_error());
	exit();
}
$sampleId = $_GET["sampleId"];

$labSampleData = array (
			'CFU'   => $_POST['CFUvalue'],
			'staph' => $_POST['staphylococcus'],
			'MRSA'  => $_POST['MRSA'],
			'SPP'      => $_POST['baccillesSPP'],
			'outstanding' => 'yes',
			);
if ($labSampleData['CFU'] != 'N/A' && $labSampleData['CFU'] != 'pending' && $labSampleData['staph'] != 'N/A' && $labSampleData['staph'] != 'pending' && $labSampleData['SPP'] != 'N/A' && $labSampleData['SPP'] != 'pending')
{
	if ($labSampleData['staph']  == 'present')
	{
		if (($labSampleData['MRSA']  != 'N/A' && $labSampleData['MRSA']  != 'pending'))
		{
			$labSampleData['outstanding'] = 'no';
			
		}
	}
	else
	{
		$labSampleData['outstanding'] = 'no';
	}
}
insert_lab_sample_result($mysqli, $sampleId, $labSampleData);
mysqli_close($mysqli);
header('Location: labSampleSearch.php');
exit();
?>
</div>
</html>