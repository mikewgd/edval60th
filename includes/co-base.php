<?php 
	$db = new mysqli("", "", "", "");
	
	if($db->connect_errno > 0){
	    die('Unable to connect to database <br> '.$db->connect_error);
	}
?>