<html>
<head>

</head>
<?php
if (isset($_GET["type"]))
{
	$typeOfSample = $_GET[""];
}
if (isset($_GET["id"]))
{
	$sampleId = $_GET[""];
}
if (isset($_GET["createBy"]))
{
	$createBy = $_GET["createBy"];
}
$typeOfSample = "postbatch";
$sampleId = 1;
$createBy = "Thanh";
?>
<div>
	<form method="post">
		<div>
			<label>Type:</label>
			<span>
			<?php echo $typeOfSample;?>
			</span>
		</div>
		<div>
		<?php
			if ($typeOfSample == 'donor')
			{
				echo "<div>";
				echo "<label>Donor #:</label>";
				echo "<input type='int' name='donorId'>";
				echo "</div>";
				echo "<div>";
				echo "<label>Sequence Number:</label>";
				echo "<input type='int' name='sequenceNumber'>";
				echo "</div>";
				echo "<div>";
				echo "<label>Date Created Sample: </label>";
				echo '<input type="int" name="monthCreatedSample" placeholder="mm" maxlength="2" size="2">';
				echo '<input type="int" name="dayCreatedSample" placeholder="dd" maxlength="2" size="2">';
				echo '<input type="int" name="yearCreatedSammple" placeholder="yyyy" maxlength="4" size="4">';
				echo "</div>";
			}
			else if ($typeOfSample == 'prebatch')
			{
				echo "<label>Batch #:</label>";
				echo "<input type='int' name='batchId'>";
				echo "Type: Raw";
			}
			else
			{
				echo "<label>Batch #:</label>";
				echo "<input type='int' name='batchId'>";
				echo "<label>Bottle #: </label>";
				echo "<input type='int' name='bottleId'>";
			}
			
		?>
		</div>
	
		<div>
			<label>Create by</label>
			<span>
			<?php echo $createBy;?>
			</span>
		</div>
		<div>
			<input type="submit" value="Submit"> 0
		</div>
	</form>
</div>
</html>