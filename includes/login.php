<?php
	$message = '';

	if($_POST['login']){
		$username = protect($_POST['username']);
		$password = protect($_POST['password']);

		$username = $db->escape_string($username);
		$password = $db->escape_string($password);
		
		if(!$username || !$password){
			$message = 'You need to enter a username and password.';	
		}else{			
			$res = $db->query("SELECT * FROM `users` WHERE `username` = '".$username."'");
			$num = $res->num_rows;
			
			if($num == 0){
				$message = 'The username you supplied does not exist.';
			}else{
				$res = $db->query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'");
				$num = $res->num_rows;
				
				if($num == 0){
					$message = 'That is the wrong password for this username.';
				}else{
					$row = $res->fetch_assoc();

					//set the login session storing there id - we use this to see if they are logged in or not
					$_SESSION['uid'] = $row['id'];
					
					//update the online field to 50 seconds into the future
					$time = date('U')+50;
					$db->query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
					
					?><script>window.location='/';</script><?php
				}
			}
		}

		$db->close();
	}
?>

<div class="lc">
	<h2 class="center">Login</h2>

	<?php
		if (!$_SESSION['uid']) {
	?>

		<form action="<?php $_PHP_SELF ?>" method="post">
			<?php 
				if (!empty($message)) {
					echo '<p class="message">'.$message.'</p>';
				}
			?>

			<div class="field">
				<label for="name">Username</label>
				<input type="text" id="username" name="username" />
			</div>

			<div class="field">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" />
			</div>
			
			<div class="login-help">
				<p>Need an account? <a href="/register">Register</a></p>
				<p>Forgot your password? <a href="/forgot">Click here!</a></p>
			</div>

			<div class="center">
				<button class="btn" name="login" id="login" type="submit" value="login">Login</button>
			</div>
		</form>

	<?php
		} else {
	?>	
		<div class="center">
			<p>You are already logged in.</p>
			<p>Start adding <a href="/photos">photos</a> and/or <a href="/comments">say something</a>!</p>
		</div>
	<?php
		}
	?>
</div>