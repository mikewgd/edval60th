<?php
	if(!$_SESSION['uid']){?>
	<script>window.location='/';</script>
	<?php }else{
		$db->query("UPDATE `users` SET `online` = '".date('U')."' WHERE `id` = '".$_SESSION['uid']."'");
		session_destroy();?>
		<script>window.location='/login';</script><?php
	}
?>