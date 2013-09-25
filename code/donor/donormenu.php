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
 <title>Screener Menu</title>
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

<h1 class="pageTitle">Screener Menu</h1>
<?php


$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

// Determine the number of donors  
   $result = mysqli_query($con,"SELECT count(donornumber) FROM screenertable"); 

   $row = mysqli_fetch_row($result);
   $dnum = $row[0];
   mysqli_free_result($result);
   mysqli_close($con);

echo "</br>";
echo "Number of Donors:&nbsp;&nbsp; ";
echo "<b>";
echo $dnum;
echo "</b>";   
echo "</br>";



?> 
<section class="centerblock">
<div class="actionbutton screenerColor"><a href="./donorsearch.php">Donor Search</a></div>
<div class="actionbutton screenerColor"><a href="./donoradd.php">Add Donor</a></div>
</section>

</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
