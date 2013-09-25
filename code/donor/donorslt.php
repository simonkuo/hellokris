<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & SCREENER_RIGHTS) )
  { // no admin rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }

?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Donor Search Results</title>
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

<h1 class="pageTitle">Donor Search Results</h1>
<?php
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/pagination.php");
echo "<p>";
if( $urights & SCREENER_FULL )
  {
   echo "<a href=\"./donoradd.php\">Add Donor</a>\n";
  }
echo "&nbsp;<a href=\"./donorsearch.php\">Donor Search</a></p>\n";

$donornum = $_POST["donornumber"];
$lastname = $_POST["lastname"];

$fdnrapmm = $_POST["fdnrapmm"];
$fdnrapdd = $_POST["fdnrapdd"];
$fdnrapyr = $_POST["fdnrapyr"];

$tdnrapmm = $_POST["tdnrapmm"];
$tdnrapdd = $_POST["tdnrapdd"];
$tdnrapyr = $_POST["tdnrapyr"];


// Construct Date
$fdate = $fdnrapyr . "-" . $fdnrapmm . "-" . $fdnrapdd;
$tdate = $tdnrapyr . "-" . $tdnrapmm . "-" . $tdnrapdd;

$urights = $_SESSION['urights'];



/*  Connect to Data Base */

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

   if (!$donornum) {
       $donornum = 77777; 
       }


   if (!$lastname) {
       $lastname = 'noname'; 
       }

$usepaging = false;
$where = "";
$pagenum = 1;
// --
// can get to page from
// (1) search criteria page
// (2) pagination link
// (3) display page for donor
//--
if( isset($_POST['donornumber'])  ) // posted information( from search criteria page )
{
  // use criteria
  if (($lastname == 'noname') and ($donornum == 77777) and ($fdate == '--'))
    $where = "";
  else
    $where = "lastname = '$lastname' or donornumber = '$donornum' or dnrapdate between '$fdate' and '$tdate'";
  // save where clause   
  $_SESSION['saveddonorsearch'] = $where;
}
else if( isset($_GET['pagenum'] ))
{  // returned to results from pagination link
   $usepaging = true;
   $pagenum = $_GET['pagenum'];
   if( isset($_SESSION['saveddonorsearch']) )
      $where = $_SESSION['saveddonorsearch'];
}
else
{
   if( isset($_SESSION['saveddonorsearch']) )
      $where = $_SESSION['saveddonorsearch'];
   if( isset($_SESSION["donorpagenum"]) )
      $pagenum = $_SESSION["donorpagenum"];   
}

$sql = "SELECT count(*) as 'Total' FROM screenertable" . ($where != "" ? (" where " . $where) : "") . " order by donornumber";
$result = mysqli_query($con, $sql); 
$row = mysqli_fetch_assoc($result);
$numrows = $row['Total'];
$sql = "SELECT * FROM screenertable" . ($where != "" ? (" where " . $where) : "") . " order by donornumber";


$basepage = "donorslt.php";
if ( $numrows > RESULTS_PER_PAGE )
   $usepaging = true;

if( $usepaging )
{
  $_SESSION["donorpagenum"] = $pagenum;
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



echo "<TABLE id='results'>\n";
echo "		<TR class='resultHeader'>\n";
echo "			<TD>Application Date</TD>\n";
echo "			<TD>First Name</TD>\n";
echo "			<TD>Last Name</TD>\n";
echo "			<TD>Donor Number</TD>\n";
echo "		</TR>\n";
$cellclass="resultRow";
while ($row = mysqli_fetch_assoc($result)) 
   {
       $dnrapdate=$row['dnrapdate'];
       $fname=$row['firstname'];
       $lname=$row['lastname'];
       $donornum=$row['donornumber'];


       echo "<TR class='" . $cellclass ."' >\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./donordsply.php?dnum=$donornum\"> $dnrapdate</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$fname</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$lname</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$donornum</FONT></TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
       $cellclass = (( $cellclass == "resultRow" ) ? "resultAltRow" : "resultRow");
   }



if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD colspan=\"2\">No Records Found</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "</TR>\n";
    }


echo "</TABLE>\n";
echo "\n";
if( $usepaging )
  echo $pageNavHTML;
  
   mysqli_free_result($result); 
   mysqli_close($con);



echo "<p>\n";
if( $urights & SCREENER_FULL )
  {
   echo "<a href=\"./donoradd.php\">Add Donor</a>\n";
  }


?> 


&nbsp;<a href="./donorsearch.php">Donor Search</a>
&nbsp;<a href="./donormenu.php">Screener Menu</a></P>


</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

