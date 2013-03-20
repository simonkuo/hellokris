<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="./css/main.css" />
 <title>Donor Entry Management Home</title>
<link rel="icon" 
      type="image/ico" 
      href="images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/HeaderHTML.inc"); ?>

</div>
<div id="menu"></div>
<!--<div id="message" class="marquee"></div> -->
<div id="content">

<div class="tileRow">
<div class="startTile screenerTile">Screener</div>
<div class="startTile receiverTile">Receiver</div>
<div class="startTile labTile">Lab</div>
<div class="startTile recipientTile">Recipient</div>
</div>
<div class="tileRow">
 <div class="startTile accountingTile">Accounting</div>
 <div class="startTile adminTile"><a class="full-area"  href="admin/AdminHome.php">Administration</a></div>
</div>

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/FooterHTML.inc"); ?>
</div>
</div>
</body>
</html>
