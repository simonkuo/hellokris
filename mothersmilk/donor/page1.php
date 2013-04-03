<h3>Donor's Medical History</h3>
<div>
<p>
<label>1. Have you taken Soriatane(acitretin), and /or Tegison(etretinate) in the last 3 years?</label>
<select name="q1" id="q1">
<option value="N/A" <?php if ($row['q1'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q1'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q1'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>2. Have you taken Proscar(finateride) or Accutane(isotretinoin) in the last month?</label>
<select name="q2" id="q2">
<option value="N/A" <?php if ($row['q2'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q2'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q2'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>3. Did you take <label class='boldtext'>ANY</label> medications in the week <label class='underline'>priori to or during</label> pumping the milk to be donated?</label>
<select name="q3" id="q3">
<option value="N/A" <?php if ($row['q3'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q3'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q3'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>4. Do you have any dietary supplements?</label>
<select name="q4" id="q4">
<option value="N/A" <?php if ($row['q4'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q4'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q4'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>5. Do you smoke, use tobacco, chew nicotine gum, or wear a nicotine patch?</label>
<select name="q5" id="q5">
<option value="N/A" <?php if ($row['q5'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q5'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q5'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>6. In the past 5 years, have you ever used recreational drugs such as marijuana, cocaine, LSD, ecstasy, or amphetamine?</label>
<select name="q6" id="q6">
<option value="N/A" <?php if ($row['q6'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q6'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q6'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>7. Do you consume alcohol?</label>
<select name="q7" id="q7">
<option value="N/A" <?php if ($row['q7'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q7'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q7'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>8. Do you drink caffeinated drink?</label>
<select name="q8" id="q8">
<option value="N/A" <?php if ($row['q8'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q8'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q8'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>9. During this pregancy, delivery and post-partum preiod did you have nay complications, such as infections, excessive bleeding, or high blood pressure?</label>
<select name="q9" id="q9">
<option value="N/A" <?php if ($row['q9'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q9'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q9'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>10. Have you expressed and stored milk before contacting the milk bank or with a previous baby?</label>
<select name="q10" id="q10">
<option value="N/A" <?php if ($row['q10'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q10'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q10'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>11. What type of pump do you use?</label>
<input type ="text" name="q11" id="q11" value= "<?php echo $row['q11'] ?>" size=10 maxlength=15 placeholder = "Pump type">

</p>
<p>
<label>12. Have you had any breast infection with this baby?</label>
<select name="q12" id="q12">
<option value="N/A" <?php if ($row['q12'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q12'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q12'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>13. Are you one any special diet?</label>
<select name="q13" id="q13">
<option value="N/A" <?php if ($row['q13'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q13'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q13'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>14. To how many children have you given birth?</label>
<input type ="text" name="q14" id="q14" value= "<?php echo $row['q14'] ?>" size=2 maxlength=5 >
</p>
<p>
<label>15. In the last 12 months have you had surgery or been under a doctor's care for a major illness?</label>
<select name="q15" id="q15">
<option value="N/A" <?php if ($row['q15'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q15'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q15'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>16. Have you ever been told not to donate blood or milk?</label>
<select name="q16" id="q16">
<option value="N/A" <?php if ($row['q16'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q16'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q16'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>17. Have you had jaundice(excluding immidiately after your own birth), liver disease, or hepatitis?</label>
<select name="q17" id="q17">
<option value="N/A" <?php if ($row['q17'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q17'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q17'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>18. In the last 12 months, have you been exposed to Hepatitis A and/or received a gamma blobulin shot?</label>
<select name="q18" id="q18">
<option value="N/A" <?php if ($row['q18'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q18'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q18'] == 'no') echo "selected";?> >no</option>
</select>
</p>
<p>
<label>19. In the last 12 months, have you had close contact with a person with jaundice or viral hepatitis or have you been given Hepatitis B Immune Globulin(HBIG)?</label>
<select name="q19" id="q19">
<option value="N/A" <?php if ($row['q19'] == 'N/A') echo "selected";?> >Select</option>
<option value="yes" <?php if ($row['q19'] == 'yes') echo "selected";?> >yes</option>
<option value="no" <?php if ($row['q19'] == 'no') echo "selected";?> >no</option>
</select>
</p>
</div>