<!DOCTYPE html>
<html>

<head>

<?php

include './mothersmilk/include/main.js'; 

include './mothersmilk/include/main.php'; 

?>

<title>Dynamic PHP Website</title>


</head>

<body>


<h2>Receiver Search</h2>

<a href="?page=home">Home</a> |
<a href="?page=page2">Page2</a> |
<a href="?page=page3">Page3</a> |
<a href="?page=page4">Page4</a> |

<?php

$cpage = $_GET["page"];

echo "<br>" . $cpage . "</br>";



// if ($_GET["page"] == "page2")
if ($cpage == "page2")
  {
     include ("./page2.html");
  }
else
  {
     include ("./pathome.html");
  }

?>

</body>


</html>
