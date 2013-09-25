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
 <title>Daily Package Search Results</title>
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
<h1 class="pageTitle">Daily Package Search Results</h1>

<?php

$urights = $_SESSION['urights'];

$donornumberr = $_GET["dnum"];


$determinechoose = $_GET["determinechoose"];



$fexpmm = $_POST["fexpmm"];
$fexpdd = $_POST["fexpdd"];
$fexpyr = $_POST["fexpyy"];

$texpmm = $_POST["texpmm"];
$texpdd = $_POST["texpdd"];
$texpyr = $_POST["texpyy"];


// Construct Date
$fdate = $fexpyr . "-" . $fexpmm . "-" . $fexpdd;
$tdate = $texpyr . "-" . $texpmm . "-" . $texpdd;



/*  Connect to Data Base */

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

// Updated donor status in receivertable and receivertablelog based on change of status 

$sql = "update receivertable set donorstatus = '$determinechoose' WHERE donornumberr = '$donornumberr'";

  
$result = mysqli_query($con,$sql); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}

echo "</br>";

$sql = "update receivertablelog set donorstatus = '$determinechoose' WHERE donornumberr = '$donornumberr'";

  
$result = mysqli_query($con,$sql); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}


switch ($determinechoose)
{
case 'D':
  //$packetsearch = "packetstate = 'W'";
  $packetsearch = "packetstate = 'O' or packetstate = 'W'";
  break;
case 'F':
  $packetsearch = "packetstate = 'R' or packetstate = 'W'";
  break;
default:
  echo "";
}

$sql   = "SELECT * FROM receivertable where donornumberr = '$donornumberr' and ($packetsearch) order by packagenumber";


$result = mysqli_query($con,$sql); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}


echo "  <TABLE id='results'>\n";
echo "		<TR class='resultHeader'>\n";
echo "			<TD>Package Number</TD>\n";
echo "			<TD>Package State</TD>\n";
echo "			<TD>Cooler Number</TD>\n";
echo "			<TD>Expression Range</TD>\n";
echo "			<TD>Location</TD>\n";
echo "		</TR>\n";
$processnumber = 0;

$cellclass="resultRow";
while ($row = mysqli_fetch_assoc($result)) 
   {
       $packagenumber = $row['packagenumber'];
       $packetstate = $row['packetstate'];
       $coolernumber=$row['coolernumber'];
       $expressionrange=$row['expressionrange'];
       $storagelocation=$row['storagelocation'];

       $processnumber = $processnumber + 1;


       echo "<TR class='" . $cellclass ."' >\n";
       echo "<TD><a href=\"./recvedit.php?packagenumber=$packagenumber\"> $packagenumber</a></TD>\n";
       echo "<TD>$packetstate</TD>\n";
       echo "<TD>$coolernumber</TD>\n";
       echo "<TD>$expressionrange</TD>\n";
       echo "<TD>$storagelocation</TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
       $cellclass = (( $cellclass == "resultRow" ) ? "resultAltRow" : "resultRow");
   }


//  processnumber detemines how many packages need to be processed 

$sql = "update screenertable set processnumber = $processnumber WHERE donornumber = '$donornumberr'";

$result = mysqli_query($con,$sql); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}


if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD><BR>No Records Found</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "</TR>\n";
    }


echo "</TABLE>\n";
echo "\n";

mysqli_free_result($result); 

mysqli_close($con);


echo "</br>";

echo "<p><a href=\"./receivingmenu.php\">Receiver Menu</a>&nbsp;&nbsp;\n";
echo "<a href=\"./dailysearch.php\">Daily Search</a></p>\n";

?> 

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

