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
 <title>Daily Search</title>
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

<h1 class="pageTitle">Daily Search</h1>


</br>

<form action="dailyrslts.php" method="post" onSubmit="return DoValidation();">

</br>

 
<b>Donor Status:</b>&nbsp;&nbsp;

<select name="determinechoose">
<option value="N/A" >Please Select</option>   
<option value="F"  >Failed</option>
<option value="D" >Donor Accepted</option>
</select>
&nbsp;&nbsp;&nbsp;


 
</br>
</br>
<input type="submit" value="Search">
</br>
</form>

<br>

 <script language="javascript">
 function DoValidation()
 {
    if( document.forms[0].elements["determinechoose"].value == "N/A" ) // no selection
    {
       alert("Please select donor status.");
       document.forms[0].elements["determinechoose"].focus();
       return false;
    }
    else
      return true;
 }
 </script>
 
</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>

