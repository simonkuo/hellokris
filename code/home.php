<?php 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
  session_start();
  
  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Donor Entry Management Home</title>
<link rel="icon" 
      type="image/ico" 
      href="/mothersmilk/images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.php"); ?>
</div>
<div id="menu"></div>
<div id="messagebar">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/MessageBar.php"); ?>
</div>
<div id="systemmessage">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/SystemMessage.php"); ?>
</div>
<div id="content">
<?php
$urights = $_SESSION['urights'];

$tiles = "";
$tiles .= '<div class="tileRow">';
if( $urights & SCREENER_RIGHTS) 
   $tiles .= '<div class="startTile screenerTile" onClick="GoToPage(' . "'donor/')" . '">Screener</div>' . "\n";
if( $urights & RECEIVER_RIGHTS )
   $tiles .= '<div class="startTile receiverTile" onClick="GoToPage(' . "'recv/')" . '">Receiver</div>' . "\n";
if( $urights & LAB_RIGHTS ) 
   $tiles .= '<div class="startTile labTile" onClick="GoToPage(' . "'lab/')" . '">Lab</div>' . "\n";
if( $urights & DELIVERY_RIGHTS )
   $tiles .= '<div class="startTile recipientTile" onClick="GoToPage(' . "'recip/')" . '">Delivery</div>' . "\n";
$tiles .= '</div>' . "\n";
$tiles .= '<div class="tileRow">' . "\n";
if( $urights & RESEARCHER_RIGHTS )
  $tiles .= '<div class="startTile researcherTile" onClick="GoToPage(' . "'research/')" . '">Research</div>' . "\n";
if( $urights & ACCOUNTING_RIGHTS )
  $tiles .= '<div class="startTile accountingTile" onClick="GoToPage(' . "'accounting/')" . '">Accounting</div>' . "\n";
if( $urights & ADMIN_RIGHTS )
  $tiles .= '<div class="startTile adminTile" onClick="GoToPage(' . "'admin/')" . '">Administration</div>' . "\n";
if( $urights & REPORTS_RIGHTS )
  $tiles .= '<div class="startTile reportsTile" onClick="GoToPage(' . "'reports/')" . '">Reports</div>' . "\n";
$tiles .= '</div>' . "\n";

echo $tiles;
?>
<script type="text/javascript">
function GoToPage(url)
{
   window.location.href=url;
}
</script>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
