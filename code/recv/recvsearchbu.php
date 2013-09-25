<html>
<head>
<!--
<?php include '../mystyle.php'; ?>
-->

</head>
<body>

<br>
<!--
<form action="./receivingmenu.php" style="display:inline">
       <input type="submit" id="mysubmit" value="Receiving Menu">
</form>
-->

<?php
echo "<form action=\"recvrslt.php\" method=\"post\">\n";
echo "Donor #&nbsp;&nbsp;&nbsp; <input type=\"int\" name=\"donornumber\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Packet #&nbsp;&nbsp; <input type=\"text\" name=\"packagenumber\">\n";
echo "</br>\n";
echo "</br>\n";
echo "Date Received  <br>\n";
echo "<p>From: &nbsp;<input type=\"int\" name=\"frcvmm\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"frcvdd\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"frcvyy\" size=4 maxlength=4>  \n";
echo "&nbsp;&nbsp;(mm/dd/yy)\n";
echo "</p>\n";
echo "<p>To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"int\" name=\"trcvmm\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"trcvdd\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"trcvyy\" size=4 maxlength=4>  \n";
echo "&nbsp;&nbsp;(mm/dd/yy)\n";
echo "</p>\n";
echo "</br>\n";
echo "Expression Range<br>\n";
echo "<p>From: &nbsp;<input type=\"int\" name=\"fexpmm\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"fexpdd\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"fexpyy\" size=4 maxlength=4>  \n";
echo "&nbsp;&nbsp;(mm/dd/yy)\n";
echo "</p>\n";
echo "<p>To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"int\" name=\"texpmm\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"texpdd\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"texpyy\" size=4 maxlength=4>  \n";
echo "&nbsp;&nbsp;(mm/dd/yy)\n";
echo "</p>\n";
echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Search\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";

echo "</br>\n";
echo "</br>\n";

echo "<p><a href=\"./receivingmenu.php\">Receiver Menu</a></p>\n";


?>
</body>
</html>
