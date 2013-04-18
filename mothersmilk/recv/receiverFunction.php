<?php
function invetoryBaseOnMilkStatus($status) {
	$data = array();
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1){
		// unset status
		unset($func_get_args[0]);
		// create string for require field
		$fields = '`' . implode('`, `', $func_get_args) . '`';

		$data = mysql_query("SELECT $fields FROM receivertable where packetstate = '$status' order by donornumberr");
		//$data = mysql_fetch_assoc(mysql_query("SELECT donornumberr,packagenumber,numberofounces,milkgrade,expressionrange,storagelocation,receivedate FROM receivertable where packetstate = $status order by donornumberr"));
	return $data;
		
	}
	
}
?>