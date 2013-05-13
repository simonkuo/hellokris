<html>
<head>


</head>
<body>

<h1> Search Lab Sample Result</h1>

<form action="labSampleSearchResultDisplay.php" method="post">
<div>
	<div>
		<label>Batch Number:</label>
		<input type="text" name="batchNumber" placeholder="">
	</div>
	<div>
		<label>Bottle Number:</label>
		<input type="text" name="bottleNumber">
	</div>

</div>
<div>
	<h2>OR</h2>
</div>
<div>
	<div>
		<label>Date sample</label>
		<input type="text" name="month" size="2" maxlength="2" placeholder="mm">
		<input type="text" name="day" size="2" maxlength="2" placeholder="dd">
		<input type="text" name="year" size="4" maxlength="4" placeholder="yyyy">
	</div>
	<div>
		<label>Package number</label>
		<input type="text" name="packageNumber">
	</div>
	<div>
		<label>Sequence number</label>
		<input type="text" name="sequenceNumber">
	</div>

</div>
<input type="submit" value="Search">

</form>


<div><a href="./labmenu.php">Donor Menu</a></div>

 
</body>
</html>
