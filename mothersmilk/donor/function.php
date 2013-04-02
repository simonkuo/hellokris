<?php
/*
function followup_data($followup_data){
	
	
	$fields = '`' . implode('`, `', array_keys($followup_data)). '`';
	$data = '\'' . implode('\', \'', $followup_data) . '\'';
	
	$result_followup  = mysql_query("INSERT INTO `screenertable` ($fields) VALUES ($data)");
	
	if (!$result_followup) 
        {
         echo "DB Error, could not query the database for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

}
*/
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
function insert_followup_data_log($followup_data){
	
	
	$fields = '`' . implode('`, `', array_keys($followup_data)). '`';
	$data = '\'' . implode('\', \'', $followup_data) . '\'';
	
	$result_followup  = mysql_query("INSERT INTO `screenertablelog` ($fields) VALUES ($data)");
	
	if (!$result_followup) 
        {
         echo "DB Error, could not query the database for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }

}
?>
