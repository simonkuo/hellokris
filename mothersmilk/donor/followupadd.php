
<h1> Follow up </h1>
<div>
<label>Donor Packet:</label> 
<input type="checkbox" name="donorpacketbymail" <?php if ($row['donorpacketbymail'] != '') echo "checked"; ?> >Mail
<input type="checkbox" name="donorpacketbyemail" <?php if ($row['donorpacketbyemail'] != '') echo "checked"; ?> >Email
<input type="checkbox" name="donorpacketbyfax" <?php if ($row['donorpacketbyfax'] != '') echo "checked"; ?>>Fax

<label>Date sent:</label>
<input type = "text" name="datesentpacket" id="datesentpacket" placeholder="mm-dd-yyyy" value = <?=$row['datesentpacket']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatesentpacket" id="staffinitdatesentpacket" value = <?=$row['staffinitdatesentpacket']?> >
<label>Date received:</label>
<input type = "text" name="datereceivedpacket" id="datereceivedpacket" placeholder="mm-dd-yyyy" value = <?=$row['datereceivedpacket']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatereceivedpacket" id="staffinitdatereceivedpacket"  value = <?=$row['staffinitdatereceivedpacket']?> >
</div>

<div> 
<label>Pediatrician fax needed:</label>
<select name="pedifaxneeded" id="pedifaxneeded">
<option value="N/A">Select</option>
<option value="yes">yes</option>
<option value="no">no</option>
</select>
<label>Date sent:</label>
<input type = "text" name="datesentpedi" id="datesentpedi" placeholder="mm-dd-yyyy">
<label>Staff Init:</label>
<input type = "text" name="staffinitdatesentpedi" id="staffinitdatesentpedi">
<label>Date received:</label>
<input type = "text" name="datereceivedpedi" id="datereceivepedi" placeholder="mm-dd-yyyy">
<label>Staff Init:</label>
<input type = "text" name="staffinitdatereceivedpedi" id="staffinitdatereceivedpedi">
</div>

<div>
<label>Obstetrician fax needed:</label>
<select name="obfaxneeded" id="obfaxneeded">
<option value="N/A">Select</option>
<option value="yes">yes</option>
<option value="no">no</option>
</select>
<label>Date sent:</label>
<input type = "text" name="datesentob" id="datesentob" placeholder="mm-dd-yyyy">
<label>Staff Init:</label>
<input type = "text" name="staffinitdatesentob" id="staffinitdatesentob">
<label>Date received:</label>
<input type = "text" name="datereceivedob" id="datereceivedob" placeholder="mm-dd-yyyy">
<label>Staff Init:</label>
<input type = "text" name="staffinitdatereceivedob" id="staffinitdatereceivedob">
</div>


<div>
<label>Other:</label>
<input type = "text" name="other" id="other">
<label>Date sent:</label>
<input type = "text" name="datesentother" id="datesentother" placeholder="mm-dd-yyyy">
<label>Staff Init:</label>
<input type = "text" name="staffinitdatesentother" id="staffinitdatesentother">
<label>Date received:</label>
<input type = "text" name="datereceivedother" id="datereceivedother" placeholder="mm-dd-yyyy">
<label>Staff Init:</label>
<input type = "text" name="staffinitdatereceivedother" id="staffinitdatereceivedother">

</div>
<div>
<label>Packet Review:</label>
<label>Date</label>
<input type = "text" name="datepacketreview" id="datepacketreview" placeholder="mm-dd-yyyy">
<label>Status:</label>
<select name="packetreviewstatus" id="packetreviewstatus">
<option value="N/A">Select</option>
<option value="passed">passed</option>
<option value="fail">fail</option>
</select>

<label>Staff Init:</label>
<input type = "text" name="staffinitpacketreview" id="staffinitpacketreview">
</div>
