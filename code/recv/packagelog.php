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
 <title>Package Information History</title>
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

<h1 class="pageTitle">Package Information History</h1>

<?php

$packagenumber = $_GET["packagenumber"];

$urights = $_SESSION['urights'];



/*  Connect to Data Base */

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

echo  "<P><FONT SIZE=4><B>Package&nbsp;&nbsp;&nbsp;" . $packagenumber .  "&nbsp;&nbsp;&nbsp;History</B></FONT></P>";
echo "</br>";

$sql   = "SELECT count(*) as Total FROM receivertablelog where packagenumber =  '$packagenumber' order by transactionnumber";
$result = mysqli_query($con, $sql); 
$row = mysqli_fetch_assoc($result);
$numrows = $row['Total'];

$pagenum = 1;
$usepaging = false;
$basepage = "packagelog.php?packagenumber=" . $packagenumber;

if( isset($_GET['pagenum']) )
{   
   $pagenum = $_GET['pagenum'];
   $usepaging = true;
}  
else if ( $numrows > RESULTS_PER_PAGE )
   $usepaging = true;
   
if( $usepaging )
{      
  $numpages = ceil($numrows/RESULTS_PER_PAGE);

  $dirlinks = "<a class=\"pageNavDirLinkCur\" href=\"". $basepage . "&pagenum=" . $pagenum ."\">" . $pagenum . "</a>";

  //-- prev page nav links -----
  for ($i=$pagenum-1,$j=1; $i>=1 && $j < 5; $i--,$j++)
  {
   	 $dirlinks = "<a class=\"pageNavDirLink\" href=\"" . $basepage . "&pagenum=" . $i . "\">" . $i . "</a>" . $dirlinks;
  }
  $dirlinks = "<a class=\"pageNavDirLink\" href=\"" . $basepage . "&pagenum=1\">First</a>" . $dirlinks;

  // -- next page nav links ----
  $lastpagenum=$pagenum;
  for ($i=$pagenum+1,$j=1; $i<=$numpages && $j < 5; $i++, $j++)
  {
  	 $dirlinks .= "<a class=\"pageNavDirLink\" href=\"" . $basepage . "&pagenum=" . $i . "\">" . $i . "</a>";
  	 $lastpagenum++;
  }
  if( $lastpagenum < $numpages )
     $dirlinks .= "<a class=\"pageNavDirLink\">...</a>";
  $dirlinks .= "<a class=\"pageNavDirLink\" href=\"". $basepage . "&pagenum=" . $numpages . "\">Last</a>";

  // -- pagination display
  $pageNavHTML = "<div class=\"pageNav\"><a class=\"pageNavPrev\"";
  if( $pagenum > 1 ) 
    $pageNavHTML .= " href=\"" . $basepage . "&pagenum=" . ($pagenum-1) . "\""; 
  $pageNavHTML .= ">Previous</a>" . $dirlinks . "<a class=\"pageNavNext\"";
  if( $pagenum < $numpages )
    $pageNavHTML .= " href=\"" . $basepage . "&pagenum=" . ($pagenum+1) . "\""; 
  $pageNavHTML .= ">Next</a>" . "</div>";
  echo $pageNavHTML;
}


$sql   = "SELECT * FROM receivertablelog where packagenumber =  '$packagenumber' order by transactionnumber";

if( $usepaging )
{
  if( isset($_GET['pagenum']))
      $sql .= " LIMIT " . (($pagenum-1) * RESULTS_PER_PAGE) . "," . RESULTS_PER_PAGE;
   else
      $sql .= " LIMIT 0," . RESULTS_PER_PAGE; 
}

$result = mysqli_query($con, $sql); 

if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysqli_error($con);
       exit;
    }



echo "<TABLE id='results'>\n";
echo "		<TR class='resultHeader'>\n";
echo "			<TD>Transaction Number</TD>\n";
echo "			<TD>Transaction Type</TD>\n";
echo "			<TD>Transaction Date</TD>\n";
echo "			<TD>Username</TD>\n";
echo "		</TR>\n";
$cellclass="resultRow";

while ($row = mysqli_fetch_assoc($result)) 
   {
       $transactionnumber=$row['transactionnumber'];
       $transactiontype=$row['transactiontype'];
       $transactiondate=$row['transactiondate'];
       $user=$row['user'];

       echo "<TR class='" . $cellclass ."'>\n";
       echo "<TD><a href=\"./recvrdsply.php?packagenumber=$packagenumber&logtable=1&transactionnumber=$transactionnumber\">$transactionnumber</a></TD>\n";
       echo "<TD>$transactiontype</TD>\n";
       echo "<TD>$transactiondate</TD>\n";
       echo "<TD>$user</TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
       $cellclass = (( $cellclass == "resultRow" ) ? "resultAltRow" : "resultRow");
   }



if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD>No Records Found</TD>\n";
       echo "<TD>&nbps;</TD>\n";
       echo "</TR>\n";
    }


echo "</TABLE>\n";
echo "\n";

if( $usepaging )
  echo $pageNavHTML;

mysqli_free_result($result); 
mysqli_close($con);

?> 

<div class="section">
<a href="./recvsearch.php">Receiver Search</a>
&nbsp;<a href="./receivingmenu.php">Receiver Menu</a>
</div>


</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

