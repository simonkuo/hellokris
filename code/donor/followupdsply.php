<h2 class="sectionTitle"> Follow up </h2>
<?php
    echo "<div class=\"sectioncolumn twoColumnSection\">";
	echo "<label>Donor Packet:</label>"; 
//get data from database and display accordingly
if ($donorpacketbymail != '')
{
	echo " <span>mail</span>";
}
if ($donorpacketbyemail != '')
{
	echo " <span>email</span>";
}
if ($donorpacketbyfax != '')
{
	echo " <span>fax</span>";
}

//if ($donorpacketbyfax != '' || $donorpacketbymail != '' || $donorpacketbyemail != '')
//{
//if ($datesentpacket != '')
//{
echo "<br><label>Date sent:</label> <span>" . $datesentpacket . "</span>";
//}
//if ($staffinitdatesentpacket != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatesentpacket .  "</span>";
//}
//if ($datereceivedpacket != '')
//{
echo "<br><label>Date received:</label> <span>" . $datereceivedpacket . "</span>";
//}
//if ($staffinitdatereceivedpacket != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatereceivedpacket . "</span>" ;
//}
//}
echo "</div>";

echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Pediatrician fax needed:</label> <span>".$pedifaxneeded. "</span>";
//if ($pedifaxneeded != 'N/A')
//{
//if ($datesentpedi != '')
//{
echo "<br><label>Date sent:</label> <span>" . $datesentpedi . "</span>";
//}
//if ($staffinitdatesentpedi != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatesentpedi .  "</span>";
//}
//if ($datereceivedpedi != '')
//{
echo "<br><label>Date received:</label> <span>" . $datereceivedpedi . "</span>";
//}
//if ($staffinitdatereceivedpedi != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatereceivedpedi . "</span>" ;
//}
//}
echo "</div>";
echo "<br class=\"clear\">";
echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Obstetrician fax needed:</label> <span>". $obfaxneeded . "</span>";
//if ($obfaxneeded != 'N/A')
//{
//if ($datesentob != '')
//{
echo "<br><label>Date sent:</label> <span>" . $datesentob . "</span>";
//}
//if ($staffinitdatesentob != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatesentob .  "</span>";
//}
//if ($datereceivedob != '')
//{
echo "<br><label>Date received:</label> <span>" . $datereceivedob . "</span>";
//}
//if ($staffinitdatereceivedob != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatereceivedob . "</span>" ;
//}
//}
echo "</div>";




//if ($other != '')
//{
echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Other:</label> <span>". $other . "</span>";
//if ($datesentother != '')
//{
echo "<br><label>Date sent:</label> <span>" . $datesentother . "</span>";
//}
//if ($staffinitdatesentother != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatesentother .  "</span>";
//}
//if ($datereceivedother != '')
//{
echo "<br><label>Date received:</label> <span>" . $datereceivedother . "</span>";
//}
//if ($staffinitdatereceivedother != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitdatereceivedother . "</span>" ;
//}
echo "</div>";
//}


//if ($datepacketreview != '' || $packetreviewstatus != '' || $staffinitpacketreview != '' )
//{
echo "<div class=\"section\">";
echo "<label>Packet Review:</label>";
//if ($datepacketreview != '')
//{
echo "<br><label>Date:</label> <span>" . $datepacketreview . "</span>";
//}
//if ($packetreviewstatus != '')
//{
echo "<br><label>Status:</label> <span>" . $packetreviewstatus . "</span>";
//}
//if ($staffinitpacketreview != '')
//{
echo "<br><label>Staff Init:</label> <span>" . $staffinitpacketreview .  "</span>";
//}
echo "</div>";
//}
?>