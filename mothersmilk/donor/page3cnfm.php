<?php
include 'function.php';

$page3_data = array (
		'q37'   => $_POST['q37'],	
		'q38'   => $_POST['q38'],
		'q39'   => $_POST['q39'],
		'q40'   => $_POST['q40'],
		'q41'   => $_POST['q41'],
		'q42'   => $_POST['q42'],
		'q43'   => $_POST['q43'],
		'q44'   => $_POST['q44'],
		'q45'   => $_POST['q45'],
		'q46'   => $_POST['q46'],
		'q47'   => $_POST['q47'],
		'q48'   => $_POST['q48'],
		'q49'   => $_POST['q49'],
		'bq1'   => $_POST['bq1'],
		'bq2'   => $_POST['bq2'],
		'bq3'   => $_POST['bq3'],
		'bq4'   => $_POST['bq4'],
		'bq5'   => $_POST['bq5'],
		'bq6'   => $_POST['bq6'],
	);
?>
<p>
<label>37. In the last 12 months have you had injections for exposure to rabies or received any experimental vaccine?</label>
<span><?php echo $page3_data['q37']?> </span>
</p>
<p>
<label>38. Do you have a history of yeast infestions (oral, vaginal or systemic or unexplained white sores or lesions in the mouth?</label>
<span><?php echo $page3_data['q38']?> </span>
</p>
<p>
<label>39. Do you have or have you had unexplained weight loss, persistent diarrhea, fever, or night sweats?</label>
<span><?php echo $page3_data['q39']?> </span>
</p>
<p>
<label>40. Do you have or have you had unexplained enlarged lymph nodes?</label>
<span><?php echo $page3_data['q40']?> </span>
</p>
<p>
<label>41. In the last 12 months have you received blood, blood products or an organ or tissue transplant</label>
<span><?php echo $page3_data['q41']?> </span>
</p>
<p>
<label>42. Have you ever received human pituitary growth hormone, bovine insulin, or dura mater(brain covering) graft?</label>
<span><?php echo $page3_data['q42']?> </span>
</p>
<p>
<label>43. Do you have a family history of Creutzfelt Jakob Disease?</label>
<span><?php echo $page3_data['q43']?> </span>
</p>
<p>
<label>44. Do you have a personal history of cancer?</label>
<span><?php echo $page3_data['q44']?> </span>
</p>
<p>
<label>45. Did you live in the United Kingdom (including England, Ireland, Scotland, Wales, The Isle of Man, the Channel Islands, Gibraltar, or the Falkand Islands) for more than 3 months between 1980 and 1996?</label>
<span><?php echo $page3_data['q39']?> </span>
</p>
<p>
<label>46. Travel History</label> <br>

<textarea rows="5" cols="30" name="q46" id="q46" value = <?php echo $page3_data['q46']?> >

</textarea>
</p>
<p>
<label>47. Did you ever had intimate contact with someone who is at risk for HIV, HTLV or Hepatitis (including anyone with hemophilia)?</label>
<select name="q47" id="q47">
<option value="N/A" <?php if ($row['q47'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q47'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q47'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>48. Did your baby have an in-utero transfusion or transplant?</label>
<select name="q48" id="q48">
<option value="N/A" <?php if ($row['q48'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q48'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q48'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>49. Have you or your sexual partner(s) been incarcerated for more than 72 hours in the last 12 months?</label>
<select name="q49" id="q49">
<option value="N/A" <?php if ($row['q49'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q49'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q49'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<h2>Baby's Medical History</h2>
<p>
<label>1. Was your baby jaundiced?</label>
<select name="bq1" id="bq1">
<option value="N/A" <?php if ($row['bq1'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['bq1'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['bq1'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>2. Have your baby ever had a yeast infection (i.e thrush or diaper rash)?</label>
<select name="bq2" id="bq2">
<option value="N/A" <?php if ($row['bq2'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['bq2'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['bq2'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>3. Have your baby been exposed to any communicable diseases, such as chicken pox or mumps?</label>
<select name="bq3" id="bq3">
<option value="N/A" <?php if ($row['bq3'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['bq3'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['bq3'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>4. Does your baby have frequent infections such as colds, ear infections, diaper rash, or skin infections?</label>
<select name="bq4" id="bq4">
<option value="N/A" <?php if ($row['bq4'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['bq4'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['bq4'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>5. Is your baby gaining weight and growing well?</label>
<select name="bq5" id="bq5">
<option value="N/A" <?php if ($row['bq5'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['bq5'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['bq5'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>6. Is your baby totally breastfed?</label>
<select name="bq6" id="bq6">
<option value="N/A" <?php if ($row['bq6'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['bq6'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['bq6'] == 'no') echo "selected";?> >no</option>
</select>
</p>