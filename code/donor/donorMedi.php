<h3>Donor's Medical History</h3>
<?php


switch ($soriNtegiChoose)
{
case 'N/A':
  $sNtna = 'selected';
	break;
case 'Yes':
  $sNtyes = 'selected';
  break;
case 'No':
  $sNtno = 'selected';
  break;
default:
  echo "";
}
?>
<p ><label class="mediP1">Have you taken Soriatane(acitretin), and/or Tegison(etretinate) in the last 3 years?</label>
<select name="soriNtegiChoose" id="soriNtegiChoose">
<option value="N/A" <?php echo $sNtna ?>>Please Select</option>   
<option value="Yes" <?php echo $sNtyes ?>>Yes</option>
<option value="No" <?php echo $sNtno ?>>No</option>
</select>
</p>

<?php
switch ($soriNtegiChoose)
{
case 'N/A':
  $sNtna = 'selected';
	break;
case 'Yes':
  $sNtyes = 'selected';
  break;
case 'No':
  $sNtno = 'selected';
  break;
default:
  echo "";
}
?>
<p ><label class="mediP1">Have you taken Soriatane(acitretin), and/or Tegison(etretinate) in the last 3 years?</label>
<select name="soriNtegiChoose" id="soriNtegiChoose">
<option value="N/A" <?php echo $sNtna ?>>Please Select</option>   
<option value="Yes" <?php echo $sNtyes ?>>Yes</option>
<option value="No" <?php echo $sNtno ?>>No</option>
</select>
</p>


