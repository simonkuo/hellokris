<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="lab.js"></script>

</head>
<body>

<h1> Search Lab Sample Result</h1>

<form action="labSampleSearchResultDisplay.php" method="post">
<div>
	<label>Search by outstanding</label>
	<select name="outstanding" id="outstanding">
	<option value="N/A">Select</option>
	<option value="yes">yes</option>
	<option value="no">no</option>
	</select>
	<span id="optionalType"></span>
</div>
<div id="optionalParameter"></div>

<input type="submit" value="Search">

</form>


<div><a href="./labmenu.php">Donor Menu</a></div>

 
</body>
</html>
