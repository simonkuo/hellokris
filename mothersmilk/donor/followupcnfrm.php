


<?php 

include 'function.php'; 




// echo "<br>";
echo "<h1>Follow up</h1>";

$followup_data = array (
			'donorpacketbymail'   => $_POST['donorpacketbymail'],
			'donorpacketbyemail'   => $_POST['donorpacketbyemail'],
			'donorpacketbyfax'   => $_POST['donorpacketbyfax'],
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
		);
echo "<div><label>Donor Packet:</label>"; 
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

if ($followup_data['donorpacketbyfax'] != '' || $followup_data['donorpacketbymail'] != '' || $followup_data['donorpacketbyemail'] != '')
{
echo "<label>Date sent:</label> <span>" . $followup_data['datesentpacket'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentpacket'].  "</span>

<label>Date received:</label> <span>" . $followup_data['datereceivedpacket'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedpacket'] . "</span>" ;
}
echo "</div>";

echo "<div><label>Pedi fax needed:</label> <span>".$followup_data['pedifaxneeded']. "</span>";
if ($followup_data['pedifaxneeded'] != 'N/A')
{
echo "<label>Date sent:</label> <span>" . $followup_data['datesentpedi'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentpedi'].  "</span>

<label>Date received:</label> <span>" . $followup_data['datereceivedpedi'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedpedi'] . "</span>" ;
}
echo "</div>";

echo "<div><label>Ob fax needed:</label> <span>".$followup_data['obfaxneeded']. "</span>";
if ($followup_data['obfaxneeded'] != 'N/A')
{
echo "<label>Date sent:</label> <span>" . $followup_data['datesentob'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentob'].  "</span>

<label>Date received:</label> <span>" . $followup_data['datereceivedob'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedob'] . "</span>" ;
}
echo "</div>";



echo "<div><label>Other:</label> <span>".$followup_data['other']. "</span>";
if ($followup_data['other'] != '')
{
echo "<label>Date sent:</label> <span>" . $followup_data['datesentother'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentother'].  "</span>

<label>Date received:</label> <span>" . $followup_data['datereceivedother'] . "</span>

<label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedother'] . "</span>" ;
}
echo "</div>";



?>

