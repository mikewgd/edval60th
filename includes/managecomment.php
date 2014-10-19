<?php
	require('co.php');
	include('functions.php');
	session_start();

	$commentId = $_POST['_id'];

	if (isset($_GET['update'])) {
		$comment = protect($_POST['comment']);
		$comment = $db->escape_string($comment);
		$db->query("UPDATE `comments` SET `message` = '".$comment."' WHERE `id` = '".$commentId."'");
	} else if (isset($_GET['delete'])) {
		$db->query("DELETE FROM `comments` WHERE `id` = '".$commentId."'");
	}
?>