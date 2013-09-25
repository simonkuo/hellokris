<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & RECEIVER_RIGHTS) )
  { // no receiver rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }

?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Package Search</title>
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

<div id="content">


<?php include '../mystyle.php'; ?>


<h1 class="pageTitle">Package Search</h1>

<br>

<?php
echo "<form action=\"recvrslt.php\" method=\"post\">\n";
echo "<label>Donor #</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"int\" name=\"donornumber\">\n";
echo "</br>\n";
echo "</br>\n";
echo "<label>Package #</label>&nbsp;&nbsp; <input type=\"text\" name=\"packagenumber\">\n";
echo "</br>\n";
echo "</br>\n";
echo "<label>Date Received</label>  <br>\n";
echo "<p><label>From:</label> &nbsp;<input type=\"int\" name=\"frcvmm\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"frcvdd\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"frcvyy\" size=4 maxlength=4>  \n";
echo "&nbsp;&nbsp;(mm/dd/yy)\n";
echo "</p>\n";
echo "<p><label>To:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"int\" name=\"trcvmm\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"trcvdd\" size=2 maxlength=2>  \n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"trcvyy\" size=4 maxlength=4>  \n";
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

?>
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

