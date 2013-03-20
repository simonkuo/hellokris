<html>
<head>

<?php include '../mystyle.php'; ?>

</head>
<body>
<br>

<form action="./recipmenu.php" style="display:inline">
       <input type="submit" id="mysubmit" value="Recipient Menu">
</form>

<br>
<br>

<?php

// Populate month - day - year

$appmm = (idate("m"));
$appdd = (idate("d"));
$appyy = (idate("Y"));



echo "\n";
echo "<p><b>Blue Pool Date:</b></p>\n";
echo "<form action=\"reciprslt.php\" method=\"post\">\n";
echo "<p>From: \n";
echo "<br>\n";
echo "<input type=\"int\" name=\"fbplmm\" size=\"2\" maxlength=\"2\" >&nbsp;\n";
echo "<input type=\"int\" name=\"fbpldd\" size=\"2\" maxlength=\"2\">&nbsp;\n";
echo "<input type=\"int\" name=\"fbplyr\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;mm-dd-yyyy\n";
echo "</p>\n";
echo "<br>\n";
echo "<p>To:\n";
echo "<br> \n";
echo "<input type=\"int\" name=\"tbplmm\" size=\"2\" maxlength=\"2\" value=\"$appmm\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbpldd\" size=\"2\" maxlength=\"2\" value=\"$appdd\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbplyr\" size=\"4\" maxlength=\"4\" value=\"$appyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";
echo "</p>\n";
echo "</br>\n";
echo "<p><b>Donor Number</b>&nbsp;&nbsp;<input type=\"text\" name=\"donornumber\"></p>\n";
echo " \n";
echo "<p><b>Bottle Number</b>&nbsp;&nbsp;<input type=\"text\" name=\"bottlenumber\"></p>\n";
echo " \n";
echo "<p><b>Blue Pool Number</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"int\" name=\"bluepoolnumber\"></p>\n";
echo " \n";
echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Search\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";
?>

</body>
</html>
