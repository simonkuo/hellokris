<!DOCTYPE html>
<html>

<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>


<?php
/* -- configuration -- */
$dbserver = "localhost";
$dbusername = "root";
$dbpassword = "boom8";
$dbdatabasename = "milkdb";

/* -- open connection -- */
$con = new mysqli($dbserver, $dbusername, $dbpassword, $dbdatabasename);
if ($con->connect_errno) {
    die( "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error);
}

/* -- query database -- */
$res = $con->query("SELECT urights,mlktech,fname,lname,techtype FROM milkusr");
echo "<table>";
echo "<tr><td> urights</td><td>mlktech</td><td>fname</td><td>lname</td><td>techtype</td></tr>\n";
while ($row = $res->fetch_assoc()) {
    echo "<tr>\n";
    echo "<td>" . $row['urights'] . "</td>\n";
    echo "<td>" . $row['mlktech'] . "</td>\n";
    echo "<td>" . $row['fname'] . "</td>\n";
    echo "<td>" . $row['lname'] . "</td>\n";
    echo "<td>" . $row['techtype'] . "</td>\n";

    echo "</tr>\n"; 
}

/* -- free result set -- */
$res->free();
echo "</table>";


/* -- close connection -- */
$con->close();
?>
</body>
</html>
