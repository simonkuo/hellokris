
<h2> Follow up </h2>
<div>
<label>Donor Packet:</label> 
<input type="checkbox" name="donorpacketby[]" value = "mail" <?php if ($row['donorpacketbymail'] != '') echo "checked"; ?> >Mail
<input type="checkbox" name="donorpacketby[]" value = "email"<?php if ($row['donorpacketbyemail'] != '') echo "checked"; ?> >Email
<input type="checkbox" name="donorpacketby[]" value = "fax" <?php if ($row['donorpacketbyfax'] != '') echo "checked"; ?>>Fax

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
<option value="N/A" <?php if ($row['pedifaxneeded'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['pedifaxneeded'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['pedifaxneeded'] == 'no') echo "selected";?>>no</option>
</select>
<label>Date sent:</label>
<input type = "text" name="datesentpedi" id="datesentpedi" placeholder="mm-dd-yyyy" value = <?=$row['datesentpedi']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatesentpedi" id="staffinitdatesentpedi" value = <?=$row['staffinitdatesentpedi']?> >
<label>Date received:</label>
<input type = "text" name="datereceivedpedi" id="datereceivedpedi" placeholder="mm-dd-yyyy" value = <?=$row['datereceivedpedi']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatereceivedpedi" id="staffinitdatereceivedpedi" value = <?=$row['staffinitdatereceivedpedi']?> >
</div>

<div>
<label>Obstetrician fax needed:</label>
<select name="obfaxneeded" id="obfaxneeded">
<option value="N/A" <?php if ($row['obfaxneeded'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['obfaxneeded'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['obfaxneeded'] == 'no') echo "selected";?> >no</option>
</select>
<label>Date sent:</label>
<input type = "text" name="datesentob" id="datesentob" placeholder="mm-dd-yyyy" value = <?=$row['datesentob']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatesentob" id="staffinitdatesentob" value = <?=$row['staffinitdatesentob']?> >
<label>Date received:</label>
<input type = "text" name="datereceivedob" id="datereceivedob" placeholder="mm-dd-yyyy" value = <?=$row['datereceivedob']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatereceivedob" id="staffinitdatereceivedob" value = <?=$row['staffinitdatereceivedob']?> >
</div>


<div>
<label>Other:</label>
<input type = "text" name="other" id="other" value = <?=$row['other']?> >
<label>Date sent:</label>
<input type = "text" name="datesentother" id="datesentother" placeholder="mm-dd-yyyy" value = <?=$row['datesentother']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatesentother" id="staffinitdatesentother" value = <?=$row['staffinitdatesentother']?> >
<label>Date received:</label>
<input type = "text" name="datereceivedother" id="datereceivedother" placeholder="mm-dd-yyyy" value = <?=$row['datereceivedother']?> >
<label>Staff Init:</label>
<input type = "text" name="staffinitdatereceivedother" id="staffinitdatereceivedother" value = <?=$row['staffinitdatereceivedother']?> >

</div>
<div>
<label>Packet Review:</label>
<label>Date:</label>
<input type = "text" name="datepacketreview" id="datepacketreview" placeholder="mm-dd-yyyy" value = <?=$row['datepacketreview']?> >
<label>Status:</label>
<select name="packetreviewstatus" id="packetreviewstatus" >
<option value="N/A" <?php if ($row['packetreviewstatus'] == 'N/A') echo "selected";?> >Select</option>
<option value="passed" <?php if ($row['packetreviewstatus'] == 'passed') echo "selected";?> >passed</option>
<option value="fail" <?php if ($row['packetreviewstatus'] == 'fail') echo "selected";?> >fail</option>
</select>

<label>Staff Init:</label>
<input type = "text" name="staffinitpacketreview" id="staffinitpacketreview" value = <?=$row['staffinitpacketreview']?> >
</div>
