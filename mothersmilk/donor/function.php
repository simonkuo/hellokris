<?php

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
function update_followup_data($donor_number,$update_data){
	$update = array();
	
	foreach ($update_data as $field=>$data)
	{
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	echo 'Data :' . $update[0];
	echo 'donor_number: ' . $donor_number;
	$update_followup_sql = mysql_query("UPDATE `screenertable` SET " . implode(', ', $update) . " WHERE `donornumber` = " . $donor_number);
	
	if (!$update_followup_sql) 
        {
         echo "DB Error, could not update the database for followup data\n";
         echo 'MySQL Error: ' . mysql_error();
         exit;
        }
}

?>
