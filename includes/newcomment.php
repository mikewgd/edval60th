<?php
	require('co.php');
	include('functions.php');

	$name = protect($_POST['name']);
	$comment = protect($_POST['comment']);
	$comment = $db->escape_string($comment);

	$res = $db->query("INSERT INTO `comments` (`name`, `message`) VALUES('".$name."','".$comment."')");
?>