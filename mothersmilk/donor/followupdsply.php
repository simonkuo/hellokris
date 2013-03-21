<h1> Follow up </h1>
<?php
	echo "<div><label>Donor Packet:</label>"; 
if ($row['donorpacketbymail'] != '')
{
	echo " <span>mail</span>";
}
if ($row['donorpacketbyemail'] != '')
{
	echo " <span>email</span>";
}
if ($row['donorpacketbyfax'] != '')
{
	echo " <span>fax</span>";
}

if ($row['donorpacketbyfax'] != '' || $row['donorpacketbymail'] != '' || $row['donorpacketbyemail'] != '')
{
if ($row['datesentpacket'] != '')
{
echo "<label>Date sent:</label> <span>" . $row['datesentpacket'] . "</span>";
}
if ($row['staffinitdatesentpacket'] != '')
{
echo "<label>Staff Init:</label> <span>" . $row['staffinitdatesentpacket'].  "</span>";
}
if ($row['datereceivedpacket'] != '')
{
echo "<label>Date received:</label> <span>" . $row['datereceivedpacket'] . "</span>";
}
if ($row['staffinitdatereceivedpacket'] != '')
{
echo "<label>Staff Init:</label> <span>" . $row['staffinitdatereceivedpacket'] . "</span>" ;
}
}
echo "</div>";

echo "<div><label>Pediatrician fax needed:</label> <span>".$row['pedifaxneeded']. "</span>";
if ($row['pedifaxneeded'] != 'N/A')
{
if ($row['datesentpedi'] != '')
{
echo "<label>Date sent:</label> <span>" . $row['datesentpedi'] . "</span>";
}
if ($row['staffinitdatesentpedi'] != '')
{
echo "<label>Staff Init:</label> <span>" . $row['staffinitdatesentpedi'].  "</span>";
}
if ($row['datereceivedpedi'] != '')
{
echo "<label>Date received:</label> <span>" . $row['datereceivedpedi'] . "</span>";
}
if ($row['staffinitdatereceivedpedi'] != '')
{
"<label>Staff Init:</label> <span>" . $row['staffinitdatereceivedpedi'] . "</span>" ;
}
}
echo "</div>";

echo "<div><label>Obstetrician fax needed:</label> <span>".$row['obfaxneeded']. "</span>";
if ($row['obfaxneeded'] != 'N/A')
{
if ($row['datesentob'] != '')
{
echo "<label>Date sent:</label> <span>" . $row['datesentob'] . "</span>";
}
if ($row['staffinitdatesentob'] != '')
{
echo "<label>Staff Init:</label> <span>" . $row['staffinitdatesentob'].  "</span>";
}
if ($row['datereceivedob'] != '')
{
echo "<label>Date received:</label> <span>" . $row['datereceivedob'] . "</span>";
}
if ($row['staffinitdatereceivedob'] != '')
{
echo "<label>Staff Init:</label> <span>" . $row['staffinitdatereceivedob'] . "</span>" ;
}
}
echo "</div>";




if ($row['other'] != '')
{
echo "<div><label>Other:</label> <span>".$row['other']. "</span>";
if ($row['datesentother'] != '')
{
echo "<label>Date sent:</label> <span>" . $row['datesentother'] . "</span>";
}
if ($row['staffinitdatesentother'] != '')
{
echo "<label>Staff Init:</label> <span>" . $row['staffinitdatesentother'].  "</span>";
}
if ($row['datereceivedother'] != '')
{
echo "<label>Date received:</label> <span>" . $row['datereceivedother'] . "</span>";
}
if ($row['datereceivedother'] != '')
{
echo "<label>Staff Init:</label> <span>" . $row['staffinitdatereceivedother'] . "</span>" ;
}
}
echo "</div>";
?>