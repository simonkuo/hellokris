


<?php 






// echo "<br>";
echo "<h1>Follow up</h1>";

$donorpacketbymail = "";
$donorpacketbyemail = "";
$donorpacketbyfax = "";
//Handle checkbox
if (IsChecked('donorpacketby','mail'))
{
	$donorpacketbymail = 'on';
}
if (IsChecked('donorpacketby','email'))
{
	$donorpacketbyemail = 'on';
}
if (IsChecked('donorpacketby','fax'))
{
	$donorpacketbyfax = 'on';
}
$followup_data = array (
			'donorpacketbymail'   => $donorpacketbymail,
			'donorpacketbyemail'   => $donorpacketbyemail,
			'donorpacketbyfax'   => $donorpacketbyfax,
			'datesentpacket'   => $_POST['datesentpacket'],
			'staffinitdatesentpacket' => $_POST['staffinitdatesentpacket'],
			'datereceivedpacket'  => $_POST['datereceivedpacket'],
			'staffinitdatereceivedpacket'      => $_POST['staffinitdatereceivedpacket'],

			'pedifaxneeded'   => $_POST['pedifaxneeded'],
			'datesentpedi'   => $_POST['datesentpedi'],
			'staffinitdatesentpedi' => $_POST['staffinitdatesentpedi'],
			'datereceivedpedi'  => $_POST['datereceivedpedi'],
			'staffinitdatereceivedpedi'      => $_POST['staffinitdatereceivedpedi'],
			
			'obfaxneeded'   => $_POST['obfaxneeded'],
			'datesentob'   => $_POST['datesentob'],
			'staffinitdatesentob' => $_POST['staffinitdatesentob'],
			'datereceivedob'  => $_POST['datereceivedob'],
			'staffinitdatereceivedob'      => $_POST['staffinitdatereceivedob'],
			
			'other'   => $_POST['other'],
			'datesentother'   => $_POST['datesentother'],
			'staffinitdatesentother' => $_POST['staffinitdatesentother'],
			'datereceivedother'  => $_POST['datereceivedother'],
			'staffinitdatereceivedother'      => $_POST['staffinitdatereceivedother'],
			
			'datepacketreview'   => $_POST['datepacketreview'],
			'packetreviewstatus'   => $_POST['packetreviewstatus'],
			'staffinitpacketreview' => $_POST['staffinitpacketreview'],
		);
echo "<div class='followup'><label class='followup1'>Donor Packet:</label>"; 
if ($followup_data['donorpacketbymail'] == '' && $followup_data['donorpacketbyemail'] == '' && $followup_data['donorpacketbyfax'] == '')
{
	echo "<span>N/A</span>";
}
else
{
	if ($followup_data['donorpacketbymail'] != '')
	{
		echo " <span>mail</span>";
	}
	if ($followup_data['donorpacketbyemail'] != '')
	{
		echo " <span>email</span>";
	}
	if ($followup_data['donorpacketbyfax'] != '')
	{
		echo " <span>fax</span>";
	}
}
if ($followup_data['donorpacketbyfax'] != '' || $followup_data['donorpacketbymail'] != '' || $followup_data['donorpacketbyemail'] != '')
{
echo "<div class = 'colum'>";
echo "<div>";
if ($followup_data['datesentpacket'] != '')
{
echo "<label class='followup1'>Date sent:</label> <span>" . $followup_data['datesentpacket'] . "</span>";
}
if ($followup_data['staffinitdatesentpacket'] != '')
{
echo "<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentpacket'].  "</span>";
}
echo "</div>";
echo "<div>";
if ($followup_data['datereceivedpacket'] != '')
{
echo "<label class='followup1'>Date received:</label> <span class='datefollowup'>" . $followup_data['datereceivedpacket'] . "</span>";
}
if ($followup_data['staffinitdatereceivedpacket'] != '')
{
echo "<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedpacket'] . "</span>" ;
}
echo "</div>";
echo "</div>";
}
echo "</div>";

echo "<div class='followup'><label class='followup2'>Pediatrician fax needed:</label> <span>".$followup_data['pedifaxneeded']. "</span>";
if ($followup_data['pedifaxneeded'] != 'N/A')
{
echo "<div class = 'colum'>";
echo "<div>";
if ($followup_data['datesentpedi'] != '')
{
echo "<label class='followup2'>Date sent:</label> <span>" . $followup_data['datesentpedi'] . "</span>";
}
if ($followup_data['staffinitdatesentpedi'] != '')
{
echo "<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentpedi'].  "</span>";
}
echo "</div>";
echo "<div>";
if ($followup_data['datereceivedpedi'] != '')
{
echo "<label class='followup2'>Date received:</label> <span>" . $followup_data['datereceivedpedi'] . "</span>";
}
if ($followup_data['staffinitdatereceivedpedi'] != '')
{
"<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedpedi'] . "</span>" ;
}
echo "</div>";
echo "</div>";
}
echo "</div>";

echo "<div class='followup'><label class='followup3'>Obstetrician fax needed:</label> <span>".$followup_data['obfaxneeded']. "</span>";
if ($followup_data['obfaxneeded'] != 'N/A')
{
echo "<div class = 'colum'>";
echo "<div>";
if ($followup_data['datesentob'] != '')
{
echo "<label class='followup3'>Date sent:</label> <span>" . $followup_data['datesentob'] . "</span>";
}
if ($followup_data['staffinitdatesentob'] != '')
{
echo "<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentob'].  "</span>";
}
echo "</div>";
echo "<div>";
if ($followup_data['datereceivedob'] != '')
{
echo "<label class='followup3'>Date received:</label> <span>" . $followup_data['datereceivedob'] . "</span>";
}
if ($followup_data['staffinitdatereceivedob'] != '')
{
echo "<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedob'] . "</span>" ;
}
echo "</div>";
echo "</div>";
}
echo "</div>";




if ($followup_data['other'] != '')
{
echo "<div class='followup'><label class='followup4'>Other:</label> <span>".$followup_data['other']. "</span>";
echo "<div class = 'colum'>";
echo "<div>";
if ($followup_data['datesentother'] != '')
{
echo "<label class='followup4'>Date sent:</label> <span>" . $followup_data['datesentother'] . "</span>";
}
if ($followup_data['staffinitdatesentother'] != '')
{
echo "<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentother'].  "</span>";
}
echo "</div>";
echo "<div>";
if ($followup_data['datereceivedother'] != '')
{
echo "<label class='followup4'>Date received:</label> <span>" . $followup_data['datereceivedother'] . "</span>";
}
if ($followup_data['staffinitdatereceivedother'] != '')
{
echo "<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedother'] . "</span>" ;
}
echo "</div>";
echo "</div>";
echo "</div>";
}


if ($followup_data['datepacketreview'] != '' || $followup_data['packetreviewstatus'] != '' ||$followup_data['staffinitpacketreview'] != '' )
{
echo "<div class='followup'><label>Packet Review:</label>";
echo "<div class = 'colum'>";
echo "<div>";
if ($followup_data['datepacketreview'] != '')
{
echo "<label class='followup5'>Date:</label> <span>" . $followup_data['datepacketreview'] . "</span>";
}
echo "</div>";
echo "<div>";
if ($followup_data['packetreviewstatus'] != '')
{
echo "<label class='followup5'>Status:</label> <span>" . $followup_data['packetreviewstatus'] . "</span>";
}
echo "</div>";
echo "<div>";
if ($followup_data['staffinitpacketreview'] != '')
{
echo "<label class='followup5'>Staff Init:</label> <span>" . $followup_data['staffinitpacketreview'].  "</span>";
}
echo "</div>";
echo "</div>";
echo "</div>";

}


?>

