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
 <title>Package Search Results</title>
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
<!--
<?php include '../mystyle.php'; ?>
-->
<?php include '../include/pagination.php'; ?>
<P>

<?php

$urights = $_SESSION['urights'];


// receive date post

$frcvmm = $_POST["frcvmm"];
$frcvdd = $_POST["frcvdd"];
$frcvyr = $_POST["frcvyy"];

$trcvmm = $_POST["trcvmm"];
$trcvdd = $_POST["trcvdd"];
$trcvyr = $_POST["trcvyy"];

// expression date post

$fexpmm = $_POST["fexpmm"];
$fexpdd = $_POST["fexpdd"];
$fexpyr = $_POST["fexpyy"];

$texpmm = $_POST["texpmm"];
$texpdd = $_POST["texpdd"];
$texpyr = $_POST["texpyy"];


$packagenumber = $_POST["packagenumber"];

$donornumberr = $_POST["donornumber"];




// Construct Receive Date
$fdate = $frcvyr . "-" . $frcvmm . "-" . $frcvdd;
$tdate = $trcvyr . "-" . $trcvmm . "-" . $trcvdd;

/*  Connect to Data Base */

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
   
echo "<h1 class=\"pageTitle\">Package Search Results</h1>";
echo "<p><a href=\"./recvsearch.php\">Package Search</a></p>\n";


if (!$donornumberr) 
   {
      $donornumberr = 0; 
   }

if (!$packagenumber) 
   {
      $packagenumber = 0; 
   }

$usepaging=false;


if (($packagenumber == 0) and ($donornumberr == 0) and ($fdate == '--') and ($tdate == '--'))
   $where = "";
else
   $where = "packagenumber =  '$packagenumber' or donornumberr = '$donornumberr' or receivedate between '$fdate' and '$tdate'";   

$sql = "SELECT count(*) as 'Total' FROM receivertable" . ($where != "" ? (" where " . $where) : "") . " order by packagenumber";
$result = mysqli_query($con, $sql); 
$row = mysqli_fetch_assoc($result);
$numrows = $row['Total'];
$sql = "SELECT * FROM receivertable" . ($where != "" ? (" where " . $where) : "") . " order by packagenumber";

$pagenum=1;
$basepage="recvrslt.php";
if ( $numrows > RESULTS_PER_PAGE )
   $usepaging = true;

if( $usepaging )
{
  if( isset($_GET['pagenum']))
    $pagenum = $_GET['pagenum'];
  $sql .= " LIMIT " . (($pagenum-1) * RESULTS_PER_PAGE) . "," . RESULTS_PER_PAGE;

  $numpages = ceil($numrows/RESULTS_PER_PAGE);
  $pageNavHTML = BuildPaginationDisplay($basepage, $pagenum, $numpages );
  echo $pageNavHTML;
}

$result = mysqli_query($con,$sql); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}

//-----------
echo "<TABLE id='results'>\n";
echo "		<TR class='resultHeader'>\n";
echo "			<TD>Package Number</TD>\n";
echo "			<TD>Donor Number</TD>\n";
echo "			<TD>Package State</TD>\n";
echo "			<TD>Cooler Number</TD>\n";
echo "			<TD>Receive Date</TD>\n";
echo "			<TD>Location</TD>\n";
echo "		</TR>\n";
$cellclass="resultRow";

while ($row = mysqli_fetch_assoc($result)) 
   {
       $packagenumber = $row['packagenumber'];
       $donornumber = $row['donornumberr'];
       $packetstate = $row['packetstate'];
       $coolernumber=$row['coolernumber'];
       $rdate=$row['receivedate'];
       $storagelocation=$row['storagelocation'];

       echo "<TR class='" . $cellclass ."' >\n";
       echo "<TD><a href=\"./recvrdsply.php?packagenumber=$packagenumber\"> $packagenumber</a></TD>\n";
       echo "<TD>$donornumber</TD>\n";
       echo "<TD>$packetstate</TD>\n";
       echo "<TD>$coolernumber</TD>\n";
       echo "<TD>$rdate</TD>\n";
       echo "<TD>$storagelocation</TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
       $cellclass = (( $cellclass == "resultRow" ) ? "resultAltRow" : "resultRow");
   }



if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD colspan=\"6\">No Records Found</FONT></TD>\n";
       echo "</TR>\n";
    }


echo "</TABLE>\n";
echo "\n";
if( $usepaging )
  echo $pageNavHTML;
mysqli_free_result($result); 

mysqli_close($con);

echo "<p><a href=\"./recvsearch.php\">Package Search</a></p>\n";

?> 

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
