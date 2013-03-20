<?php
session_start();
// store session data

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 3.3  (Linux)">
	<META NAME="AUTHOR" CONTENT="Pat Dumalanta">
	<META NAME="CREATED" CONTENT="20121123;15512700">
	<META NAME="CHANGEDBY" CONTENT="Pat Dumalanta">
	<META NAME="CHANGED" CONTENT="20121123;16005500">
<style>
body
{
background-color:yellow;
}
h1
{
color:orange;
text-align:center;
}
p
{
font-family:"Times New Roman";
font-size:20px;
}
</style>

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php
/*
echo $_POST["uname"];
Print_r ($_SESSION);
*/
// Determines if post is correct.  Will be comment out later! 
//  **********************************************************

// *************************************************************

// Set initial username and password within session and therefore does not get lost
// when going from one page to the next 


if (!$_SESSION['fconnect'])
   {
	$_SESSION['uname'] = $_POST["uname"]; 
	$_SESSION['pwd'] = $_POST["pwd"];
        $_SESSION['fconnect']=1;
   } 

/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

//$mysqli = new mysqli('localhost',$_SESSION["uname"],$_SESSION["pwd"], 'milkdb');

//$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');

// echo $con;
/*
if ($mysqli->connect_error) 
   {
       session_destroy();

  echo "</br>"; 

  echo "<p><a href=\"./dblogon.html\">Return to Database Login</a></p>\n";



       die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
   }

*/

if (!$con)
  {
  echo "</br>";
  echo "</br>";
  echo "</br>";

  session_destroy();

  echo "Unable to connect to database"; 

  echo "</br>"; 
 
  echo "invalid username or password"; 

  echo "</br>"; 

  echo "<p><a href=\"./dblogon.html\">Return to Database Login</a></p>\n";


//  die('Could not connect: ' . mysql_error());
  }

else
  {
/*
Print_r ($_SESSION);
echo "</br>"; 
echo "</br>";
*/
 
   echo "Welcome:&nbsp;" .  "<b>" . $_SESSION['uname'] . "</b>" . "&nbsp;&nbsp;"; 

   echo "<a href=\"./dbclose.php\">Logoff</a>\n";




//   echo "</br>";
   echo "</br>";
   
//   echo "<h1>Welcome to United Way Database!</h1>\n";

   echo  "<P><FONT SIZE=10><B>Welcome to the Mothers Milk Database</B></FONT></P>";

   echo "</br>";
   
   echo "<P><a href=\"./donor/donormenu.php\">Screener Menu</a></P>\n";
   echo "<P><a href=\"./recv/receivingmenu.php\">Receiving Menu</a></P>\n";
   echo "<P><a href=\"./lab/labmenu.php\">Lab Menu</a></P>\n";
   echo "<P><a href=\"./recip/recipmenu.php\">Receipient Menu</a></P>\n";


// Includes extra menu item to add users //
//******************************************************************

mysql_select_db("milk_db")or die("cannot select DB");

$myusername = $_SESSION['uname'];
$mypassword = $_SESSION['pwd'];
/*
echo "<br>";
echo $myusername;
echo "<br>";
echo $mypassword;
echo "<br>";
*/
$sql="SELECT userrights FROM usertable where username = '$myusername' ";
/*
echo "<br>";
echo $sql;
echo "<br>";
echo "<br>";

*/

/* Select queries return a resultset */


$result = mysql_query($sql);

$urights = mysql_result($result,0);


$_SESSION['urights'] = $urights; 
/*
echo $urights;

echo "</br>"; 
echo "</br>"; 

Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 

//echo "<br>";
//echo "Part 2";
*/

if($urights==1)
  {
     echo "<P><a href=\"./admin/AdminHome.php\">Administration Menu</a></P>\n";
     echo "<p>(used to add lab technicians)</p>\n";
     echo "</br>";
  }

}


?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
