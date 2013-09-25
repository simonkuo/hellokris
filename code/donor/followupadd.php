
<h2 class="sectionTitle"> Follow up </h2>
<div class="sectioncolumn twoColumnSection">
<label class="formDisplay">Donor Packet:</label> 
<input type="checkbox" name="donorpacketby[]" id="donorpacketby[]" value = "mail" <?php if ($row['donorpacketbymail'] != '') echo "checked"; ?> >Mail
<input type="checkbox" name="donorpacketby[]" id="donorpacketby[]" value = "email"<?php if ($row['donorpacketbyemail'] != '') echo "checked"; ?> >Email
<input type="checkbox" name="donorpacketby[]" id="donorpacketby[]" value = "fax" <?php if ($row['donorpacketbyfax'] != '') echo "checked"; ?>>Fax
<br>
<label class="formDisplay">Date sent:</label>
<input type = "text" name="datesentpacket" id="datesentpacket" placeholder="mm-dd-yyyy" value = <?php echo $row['datesentpacket']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatesentpacket" id="staffinitdatesentpacket" value = <?php echo $row['staffinitdatesentpacket']?> >
<br><label class="formDisplay">Date received:</label>
<input type = "text" name="datereceivedpacket" id="datereceivedpacket" placeholder="mm-dd-yyyy" value = <?php echo $row['datereceivedpacket']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatereceivedpacket" id="staffinitdatereceivedpacket"  value = <?php echo $row['staffinitdatereceivedpacket']?> >
</div>

<div class="sectioncolumn twoColumnSection"> 
<label>Pediatrician fax needed:</label>
<select name="pedifaxneeded" id="pedifaxneeded">
<option value="N/A" <?php if ($row['pedifaxneeded'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['pedifaxneeded'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['pedifaxneeded'] == 'no') echo "selected";?>>no</option>
</select>
<br><label class="formDisplay">Date sent:</label>
<input type = "text" name="datesentpedi" id="datesentpedi" placeholder="mm-dd-yyyy" value = <?php echo $row['datesentpedi']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatesentpedi" id="staffinitdatesentpedi" value = <?php echo $row['staffinitdatesentpedi']?> >
<br><label class="formDisplay">Date received:</label>
<input type = "text" name="datereceivedpedi" id="datereceivedpedi" placeholder="mm-dd-yyyy" value = <?php echo $row['datereceivedpedi']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatereceivedpedi" id="staffinitdatereceivedpedi" value = <?php echo $row['staffinitdatereceivedpedi']?> >
</div>
<br class="clear">
<div class="sectioncolumn twoColumnSection">
<label>Obstetrician fax needed:</label>
<select name="obfaxneeded" id="obfaxneeded">
<option value="N/A" <?php if ($row['obfaxneeded'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['obfaxneeded'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['obfaxneeded'] == 'no') echo "selected";?> >no</option>
</select>
<br><label class="formDisplay">Date sent:</label>
<input type = "text" name="datesentob" id="datesentob" placeholder="mm-dd-yyyy" value = <?php echo $row['datesentob']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatesentob" id="staffinitdatesentob" value = <?php echo $row['staffinitdatesentob']?> >
<br><label class="formDisplay">Date received:</label>
<input type = "text" name="datereceivedob" id="datereceivedob" placeholder="mm-dd-yyyy" value = <?php echo $row['datereceivedob']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatereceivedob" id="staffinitdatereceivedob" value = <?php echo $row['staffinitdatereceivedob']?> >
</div>


<div class="sectioncolumn twoColumnSection">
<label class="formDisplay">Other:</label>
<input type = "text" name="other" id="other" value = <?php echo $row['other']?> >
<br><label class="formDisplay">Date sent:</label>
<input type = "text" name="datesentother" id="datesentother" placeholder="mm-dd-yyyy" value = <?php echo $row['datesentother']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatesentother" id="staffinitdatesentother" value = <?php echo $row['staffinitdatesentother']?> >
<br><label class="formDisplay">Date received:</label>
<input type = "text" name="datereceivedother" id="datereceivedother" placeholder="mm-dd-yyyy" value = <?php echo $row['datereceivedother']?> >
<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitdatereceivedother" id="staffinitdatereceivedother" value = <?php echo $row['staffinitdatereceivedother']?> >

</div>
<div class="section">
<label>Packet Review:</label>
<br><label class="formDisplay">Date</label>
<input type = "text" name="datepacketreview" id="datepacketreview" placeholder="mm-dd-yyyy" value = <?php echo $row['datepacketreview']?> >
<br><label class="formDisplay">Status:</label>
<select name="packetreviewstatus" id="packetreviewstatus" >
<option value="N/A" <?php if ($row['packetreviewstatus'] == 'N/A') echo "selected";?> >Select</option>
<option value="passed" <?php if ($row['packetreviewstatus'] == 'passed') echo "selected";?> >passed</option>
<option value="fail" <?php if ($row['packetreviewstatus'] == 'fail') echo "selected";?> >fail</option>
</select>

<br><label class="formDisplay">Staff Init:</label>
<input type = "text" name="staffinitpacketreview" id="staffinitpacketreview" value = <?php echo $row['staffinitpacketreview']?> >
</div>
