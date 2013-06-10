<?php
// Use to handle check box
function IsChecked($chkname,$value)
{
	if(!empty($_POST[$chkname]))
	{
		foreach($_POST[$chkname] as $chkval)
		{
			if($chkval == $value)
			{
				return true;
			}
		}
	}
	return false;
}
//Insert followup data into database
function followup_data($followup_data){
	
	//Create string for fields in database
	$fields = '`' . implode('`, `', array_keys($followup_data)). '`';
	//Create string for value in database
	$data = '\'' . implode('\', \'', $followup_data) . '\'';
	
	$result_followup  = mysql_query("INSERT INTO `screenertable` ($fields) VALUES ($data)");
	
	if (!$result_followup) 
        {
         echo "DB Error, could not query the database for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

}
//Update followup data in screenertable
function update_followup_data($donor_number,$update_data){
	$update = array();
	
	foreach ($update_data as $field=>$data)
	{
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	

	$update_followup = mysql_query("UPDATE `screenertable` SET " . implode(', ', $update) . " WHERE `donornumber` = " . $donor_number);
	//echo "UPDATE `screenertable` SET " . implode(', ', $update) . " WHERE `donornumber` = " . $donor_number ;
	if (!$update_followup) 
        {
         echo "DB Error, could not update the database for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }
}
//Update page1 in screenertable
function update_page1($donor_number,$update_data){
	$update = array();
	
	foreach ($update_data as $field=>$data)
	{
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	

	$update_page1 = mysql_query("UPDATE `screenertable` SET " . implode(', ', $update) . " WHERE `donornumber` = " . $donor_number);
	//echo "UPDATE `screenertable` SET " . implode(', ', $update) . " WHERE `donornumber` = " . $donor_number ;
	if (!$update_page1) 
        {
         echo "DB Error, could not update the database for page3 data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }
}
//Update page3 in screenertable
function update_page3($donor_number,$update_data){
	$update = array();
	
	foreach ($update_data as $field=>$data)
	{
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	

	$update_page3 = mysql_query("UPDATE `screenertable` SET " . implode(', ', $update) . " WHERE `donornumber` = " . $donor_number);
	//echo "UPDATE `screenertable` SET " . implode(', ', $update) . " WHERE `donornumber` = " . $donor_number ;
	if (!$update_page3) 
        {
         echo "DB Error, could not update the database for page3 data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }
}
//Update follow up in screenertablelog
function update_followup_data_log($donor_number,$transaction_number,$update_data){
	$update = array();
	
	foreach ($update_data as $field=>$data)
	{
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	
	$update_followup = mysql_query("UPDATE `screenertablelog` SET " . implode(', ', $update) . " WHERE `transactionnumber` = " . $transaction_number . " AND `donornumber` = " . $donor_number);
	
	if (!$update_followup) 
        {
         echo "DB Error, could not update the database log for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
		 echo "UPDATE `screenertablelog` SET " . implode(', ', $update) . " WHERE `transactionnumber` = " . $transaction_number . "AND `donornumber` = " . $donor_number;
         exit;
        }
}
//Update page3 in screenertablelog
function update_page3_log($donor_number,$transaction_number,$update_data){
	$update = array();
	
	foreach ($update_data as $field=>$data)
	{
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	
	$update_page3_log = mysql_query("UPDATE `screenertablelog` SET " . implode(', ', $update) . " WHERE `transactionnumber` = " . $transaction_number . " AND `donornumber` = " . $donor_number);
	
	if (!$update_page3_log) 
        {
         echo "DB Error, could not update the database log for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
		 echo "UPDATE `screenertablelog` SET " . implode(', ', $update) . " WHERE `transactionnumber` = " . $transaction_number . "AND `donornumber` = " . $donor_number;
         exit;
        }
}
//Insert followup data into screenertable log
function insert_followup_data_log($followup_data){
	
	//Create string for fields in database
	$fields = '`' . implode('`, `', array_keys($followup_data)). '`';
	//Create string for value in database
	$data = '\'' . implode('\', \'', $followup_data) . '\'';
	
	$result_followup  = mysql_query("INSERT INTO `screenertablelog` ($fields) VALUES ($data)");
	
	if (!$result_followup) 
        {
         echo "DB Error, could not query the database for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

}
//Retrieve lab sample by outstanding and type
function lab_sample_results($con,$outstanding, $type){
	if ($type === 'all')
	{
		$query = "SELECT type , sampleId FROM `labsampleresult` WHERE `outstanding` = '$outstanding'";
		$result = $con->query($query) or die ($con->error.__LINE__);
		return $result;

	}
	else
	{
		$query = "SELECT type , sampleId FROM `labsampleresult` WHERE `outstanding` = '$outstanding' AND `type` = '$type' ";
		$result = $con->query($query) or die ($con->error.__LINE__);
		return $result;
	}
}
// Retrieve type and sampleID 
function lab_sample_result_by_Id($con,$sampleId, $type){

	if ($sampleId != '' && $type != '')
	{
		$query = "SELECT type , sampleId FROM `labsampleresult` WHERE `sampleId` = '$sampleId' AND `type` = '$type'" ;
		
		
		$result = $con->query($query) or die ($con->error.__LINE__);
		return $result;
	}
	else 
	{
		$query = "SELECT type , sampleId FROM `labsampleresult`" ;
		//$result = mysql_query($query);
		$result = $con->query($query) or die ($con->error.__LINE__);
		
		return $result;
	}
	
}

// Retrieve all information by sample ID
function lab_sample_result_information($con, $sampleId){

	$query = "SELECT * FROM `labsampleresult` WHERE `sampleId` = '$sampleId'" ;
	//echo $query;
	$result = $con->query($query) or die ($con->error.__LINE__);
	/*
	$result = mysql_query($query);
	
	if (!$result) {
	$message  = 'Invalid query: ' . mysql_error() . "\n";
	$message .= 'Whole query: ' . $query;
	die($message);
	}
	*/
	return $result;

	
}

function batch_sample_result($con)
{
	$query = "SELECT * FROM `labsampleresult` WHERE `type` = 'batch'" ;
	
	$result = $con->query($query) or die ($con->error.__LINE__);
	
	return $result;
}
function insert_lab_sample_result($con, $sampleId, $labSampleData)
{
	$update = array();
	
	foreach($labSampleData as $field=>$data)
	{
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	$query = "UPDATE `labsampleresult` SET " . implode(', ', $update) . " WHERE `sampleId` = '$sampleId' ";
	echo $query;
	$result = $con->query($query) or die ($con->error.__LINE__);
}

// get bluepool and package from the batch ID
function getOtherIdFromBatchId($con,$batchId)
{
	$query = "SELECT `other` FROM `labsamplerelationship` WHERE `batchId` = '$batchId'";
	//echo $query;
	$result = $con->query($query) or die ($con->error.__LINE__);
	return $result;
}

function getPendingAction($con)
{
	$query = "SELECT * FROM `pendingaction` ORDER BY action,date ASC";
	//echo $query;
	$result = $con->query($query) or die ($con->error.__LINE__);
	return $result;
}
function convertToDatabaseDateFormat($date)
{

}
function convertFromDatabaseDateFormat($date)
{
	$dateFormat = explode("-",$date);
	
	$date = $dateFormat[1] . '-' . $dateFormat[2] . '-' . $dateFormat[0];
	//echo $date;
	return $date;
}	
?>
