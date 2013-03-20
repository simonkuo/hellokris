<html>
<head>
<!--
<?php include '../mystyle.php'; ?>
-->

</head>
<body>

<p><b>Donor Application Date:</b></p>

<form action="donorslt.php" method="post">

<p>From: 
<br>
<input type="int" name="fdnrapmm" size="2" maxlength="2">&nbsp;
<input type="int" name="fdnrapdd" size="2" maxlength="2">&nbsp;
<input type="int" name="fdnrapyr" size="4" maxlength="4">
&nbsp;mm-dd-yyyy
</p>


<p>To:
<br> 
<input type="int" name="tdnrapmm" size="2" maxlength="2">&nbsp;
<input type="int" name="tdnrapdd" size="2" maxlength="2">&nbsp;
<input type="int" name="tdnrapyr" size="4" maxlength="4">
&nbsp;mm-dd-yyyy
</p>



</br>

<p><b>Last Name</b>&nbsp;&nbsp;<input type="text" name="lastname"></p>
 
<p><b>Donor #</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="int" name="donornumber"></p>
 
</br>
</br>
<input type="submit" value="Search">
</br>
</form>

<br>
<P><a href="./donormenu.php">Donor Menu</a></P>
</br>
</br>
</br>
 
</body>
</html>
