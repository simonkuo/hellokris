<html>
<head>

<!--
<?php include '../mystyle.php'; ?>
-->

</head>
<body>
<!--
<br>

<form action="./labmenu.php" style="display:inline">
       <input type="submit" id="mysubmit" value="Lab Menu">
</form>

<br>

-->


<?php

// Populate month - day - year

$appmm = (idate("m"));
$appdd = (idate("d"));
$appyy = (idate("Y"));



echo "<form action=\"./labrslt.php\" method=\"post\">\n";
// echo "<br>\n";
echo "<p><b>First Name</b>&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"firstname\">\n";
echo " \n";
echo "&nbsp;&nbsp;&nbsp;<b>Last Name</b>&nbsp;&nbsp;<input type=\"text\" name=\"lastname\">\n";
echo "<br>\n";
echo "<br>\n";
/*
echo "<p><b>First Name</b>&nbsp;&nbsp;<input type=\"text\" name=\"firstname\"></p>\n";
echo " \n";
echo "<p><b>Last Name</b>&nbsp;&nbsp;<input type=\"text\" name=\"lastname\"></p>\n";
echo " \n";
*/
echo " \n";
echo "<b>Donor Number</b>&nbsp;&nbsp;<input type=\"text\" name=\"donornumber\"></p>\n";
echo " \n";
echo "<p><b>Blue Pool Number</b></p>\n";
echo "<p>From:&nbsp;&nbsp;\n" . "<input type=\"text\" name=\"bluepoolnumber\">&nbsp;&nbsp;&nbsp;\n";
echo "To:&nbsp;&nbsp;\n" . "<input type=\"text\" name=\"bluepoolnumber\">&nbsp;&nbsp;&nbsp;<p>\n";
//echo "<br>\n";
echo " \n";
echo "<p><b>Blue Pool Date:</b></p>\n";
echo "<p>From:&nbsp;&nbsp;\n";
// echo "<br>\n";
echo "<input type=\"int\" name=\"fbplmm\" size=\"2\" maxlength=\"2\" >&nbsp;\n";
echo "<input type=\"int\" name=\"fbpldd\" size=\"2\" maxlength=\"2\">&nbsp;\n";
echo "<input type=\"int\" name=\"fbplyy\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";
// echo "</p>\n";
// echo "<br>\n";
echo "&nbsp;&nbsp;To:&nbsp;&nbsp;\n";
// echo "<br> \n";
echo "<input type=\"int\" name=\"tbplmm\" size=\"2\" maxlength=\"2\" value=\"$appmm\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbpldd\" size=\"2\" maxlength=\"2\" value=\"$appdd\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbplyy\" size=\"4\" maxlength=\"4\" value=\"$appyy\">\n";
echo "&nbsp;(mm-dd-yyyy)</p>\n";
// echo "</p>\n";
// echo "</br>\n";
echo "<p><b>Batch Number</b></p>\n";
echo "<p>From:&nbsp;&nbsp;\n" . "<input type=\"text\" name=\"batchnumber\">&nbsp;&nbsp;&nbsp;\n";
echo "To:&nbsp;&nbsp;\n" . "<input type=\"text\" name=\"batchnumber\">&nbsp;&nbsp;&nbsp;</p>\n";
echo " \n";
echo "<p><b>Batch Date:</b></p>\n";
echo "<p>From:&nbsp;&nbsp;\n";
// echo "<br>\n";
echo "<input type=\"int\" name=\"fbplmm\" size=\"2\" maxlength=\"2\" >&nbsp;\n";
echo "<input type=\"int\" name=\"fbpldd\" size=\"2\" maxlength=\"2\">&nbsp;\n";
echo "<input type=\"int\" name=\"fbplyy\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";
// echo "</p>\n";
// echo "<br>\n";
echo "&nbsp;&nbsp;To:&nbsp;&nbsp;\n";
// echo "<br> \n";
echo "<input type=\"int\" name=\"tbplmm\" size=\"2\" maxlength=\"2\" value=\"$appmm\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbpldd\" size=\"2\" maxlength=\"2\" value=\"$appdd\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbplyy\" size=\"4\" maxlength=\"4\" value=\"$appyy\">\n";
echo "&nbsp;(mm-dd-yyyy)</p>\n";
// echo "</p>\n";
// echo "</br>\n";
// echo "</br>\n";
echo "<p><b>Bottle Number</b></p>\n";
echo "<p>From:&nbsp;&nbsp;\n" . "<input type=\"text\" name=\"bottlenumber\">&nbsp;&nbsp;&nbsp;\n";
echo "To:&nbsp;&nbsp;\n" . "<input type=\"text\" name=\"bottlenumber\">&nbsp;&nbsp;&nbsp;</p>\n";
echo " \n";
echo "<p><b>Bottle Date:</b></p>\n";
echo "<p>From:&nbsp;&nbsp;\n";
echo "<input type=\"int\" name=\"fbplmm\" size=\"2\" maxlength=\"2\" >&nbsp;\n";
echo "<input type=\"int\" name=\"fbpldd\" size=\"2\" maxlength=\"2\">&nbsp;\n";
echo "<input type=\"int\" name=\"fbplyy\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";
// echo "</p>\n";
// echo "<br>\n";
echo "&nbsp;&nbsp;To:&nbsp;&nbsp;\n";
// echo "<br> \n";
echo "<input type=\"int\" name=\"tbplmm\" size=\"2\" maxlength=\"2\" value=\"$appmm\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbpldd\" size=\"2\" maxlength=\"2\" value=\"$appdd\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbplyy\" size=\"4\" maxlength=\"4\" value=\"$appyy\">\n";
echo "&nbsp;(mm-dd-yyyy)</p>\n";
// echo "</p>\n";
echo "<p><b>Date Received</b></p>\n";
echo "<p>From:&nbsp;&nbsp;\n";
echo "<input type=\"int\" name=\"fbplmm\" size=\"2\" maxlength=\"2\" >&nbsp;\n";
echo "<input type=\"int\" name=\"fbpldd\" size=\"2\" maxlength=\"2\">&nbsp;\n";
echo "<input type=\"int\" name=\"fbplyy\" size=\"4\" maxlength=\"4\">\n";
echo "&nbsp;(mm-dd-yyyy)\n";
// echo "</p>\n";
// echo "<br>\n";
echo "&nbsp;&nbsp;To:&nbsp;&nbsp;\n";
// echo "<br> \n";
echo "<input type=\"int\" name=\"tbplmm\" size=\"2\" maxlength=\"2\" value=\"$appmm\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbpldd\" size=\"2\" maxlength=\"2\" value=\"$appdd\">&nbsp;\n";
echo "<input type=\"int\" name=\"tbplyy\" size=\"4\" maxlength=\"4\" value=\"$appyy\">\n";
echo "&nbsp;(mm-dd-yyyy)</p>\n";
// echo "</p>\n";
// echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
// echo "<input type=\"submit\" value=\"Search\" onclick= >\n";
echo "<input type=\"submit\" value=\"Search\" ";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";


echo "</br>";
echo "<p><a href=\"./labmenu.php\">Lab Menu</a></p>\n";
echo "</br>";


?>

</body>
</html>
