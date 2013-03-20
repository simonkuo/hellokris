<html>
<head>

<?php include '../mystyle.php'; ?>

</head>
<body>
<br>
<!--
<form action="./labmenu.php" style="display:inline">
       <input type="submit" id="mysubmit" value="Lab Menu">
</form>
-->
<br>
<br>

<?php


echo "\n";
echo "<form action=\"./bpoolproc.php\" method=\"post\">\n";
echo "<br>\n";
echo "<p><b>Blue Pool Number</b>&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"bpoolnumber\">\n";
echo " \n";
echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Search\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";

echo "</br>";
echo "<p><a href=\"./labproc.php\">Lab Processing Menu</a></p>\n";
echo "</br>";


?>

</body>
</html>
