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
//$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);
$mysqli = new mysqli("localhost",$_SESSION["uname"],$_SESSION["pwd"],'milk_db');

if (mysqli_connect_errno())
{
	printf("Connect failed : %s\n", mysqli_connect_error());
	exit();
}
//mysql_select_db('milk_db', $con);
/*
if (!mysql_select_db('milk_db', $con)) {
    echo 'Could not select database';
    exit;
}
*/
$sampleId = "";
if (isset($_GET["sampleId"])) {
	$sampleId = $_GET["sampleId"];
	//echo $sampleId;
} 
$result = lab_sample_result_information($mysqli,$sampleId);

//echo $num;
$row = $result->fetch_assoc();
//$row = mysql_fetch_assoc($result);
$type = $row['type'];
$employee = $row['employeeId'];
$dateofsample = $row['dateofsample'];
$dateofcomplete = $row['dateofcomplete'];
$CFU = $row['CFU'];
$SPP = $row['SPP'];
$staph = $row['staph'];
$MRSA = $row['MRSA'];



?>
	<form action = "labSampleAddConfirm.php?sampleId=<?php echo $sampleId ?>" method="post">
		<div>
		<label>Sample Number:</label>
		<span><?php echo $sampleId?></span>
		</div>
		<div>
		<label>Type:</label>
		<span><?php echo $type?></span>
		</div>
		<div>
		<label>EmployeeId:</label>
		<span><?php echo $employee?></span>
		</div>
		<div>
		<label>Date of sample:</label>
		<span><?php echo $dateofsample?></span>
		</div>
		<div>
		<label>Date of complete:</label>
		<span><?php echo $dateofcomplete?></span>
		</div>
		<div>
			<label>Enter the CFU per ML value:</label>
			<?php
			if ($type === 'package' || $type === 'bluepool')
			{
				
				echo '<select id="CFUvalue" name = "CFUvalue">';
				echo '<option value="N/A" ';
				if ($CFU == "N/A") echo "selected";
				echo '>Select</option>';
				echo '<option value="smallerOrEqualTenThousand" ';
				if ($CFU == 'smallerOrEqualTenThousand') echo "selected";
				echo '> < or = 10,000</option>';
				echo '<option value="fromTenThousandToFiftyThousand" ';
				if ($CFU == 'fromTenThousandToFiftyThousand') echo "selected";
				echo '>10,000 to 50,000</option>';
				echo '<option value="fromFiftyThousandToHundredThousand" ';
				if ($CFU == 'fromFiftyThousandToHundredThousand') echo "selected";
				echo '>50,000 to 100,000</option>';
				echo '<option value="largerThanHundredThousand" ';
				if ($CFU == 'fromFiftyThousandToHundredThousand') echo "selected";
				echo '> > 100,000</option>';
				echo '</select>';
			}
			else
			{
				
				echo '<select id="CFUvalue" name = "CFUvalue">';
				echo '<option value="N/A" ';
				if ($CFU == "N/A") echo "selected";
				echo '>Select</option>';
				echo '<option value="smallerThanOne" ';
				if ($CFU == 'smallerThanOne') echo "selected";
				echo '> < 1</option>';
				echo '<option value="fromOneToFour" ';
				if ($CFU == 'fromOneToFour') echo "selected";
				echo'>1 to < 5</option>';
				echo '<option value="fromFiveToTen" ';
				if ($CFU == 'fromFiveToTen') echo "selected";
				echo'>5 to 10</option>';
				echo '<option value="largerThanTen" ';
				if ($CFU == 'largerThanTen') echo "selected";
				echo'> > 10</option>';
				echo '</select>';
			}
			?>
			
		</div>
		<div>
			<label>Baccilles SPP</label>
			<select name="baccillesSPP" id="baccillesSPP">
			<option value="N/A" <?php if ($SPP == 'N/A') echo "selected";?> >Select</option>
			<option value="absent" <?php if ($SPP == 'absent') echo "selected";?> >absent</option>
			<option value="present" <?php if ($SPP == 'present') echo "selected";?> >present</option>
			<option value="pending" <?php if ($SPP == 'pending') echo "selected";?> >pending</option>
			</select>
		</div>
		<div>
			<label>Staphylococcus aureus</label>
			<select name="staphylococcus" id="staphylococcus">
			<option value="N/A" <?php if ($staph == 'N/A') echo "selected";?> >Select</option>
			<option value="absent" <?php if ($staph == 'absent') echo "selected";?>>absent</option>
			<option value="present" <?php if ($staph == 'present') echo "selected";?> >present</option>
			<option value="pending" <?php if ($staph == 'pending') echo "selected";?>>pending</option>
			</select>
			
		</div>
		<div id ="methicillin-resistant" ">
			<label>Methicillin-resistant Staphylococcus Aureus</label>
			<select id="MRSA" name = "MRSA">
			<option value="N/A" <?php if ($MRSA == "N/A") echo "selected";?> >Select</option>'
			<option value="absent" <?php if ($MRSA == "absent") echo "selected";?> >absent</option>'
			<option value="present" <?php if ($MRSA == "present") echo "selected";?> >present</option>'
			<option value="pending" <?php if ($MRSA == "pending") echo "selected";?> >pending</option>'
			</select>
		</div>
		<input type="submit" value="Submit">	
	
	</form>
<?php
mysqli_close($mysqli);
?>
</div>
</html>