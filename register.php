<?php
	session_start();

	include('includes/header.php');

	$message = '';
	$url = rootURL('');

	if(isset($_POST['register'])){
		
		$username = protect($_POST['username']);
		$name = protect($_POST['name']);
		$password = protect($_POST['password']);
		$passconf = protect($_POST['confirm-password']);
		$email = protect($_POST['email']);

		$username = $db->escape_string($username);
		$name = $db->escape_string($name);
		$password = $db->escape_string($password);
		$passconf = $db->escape_string($passconf);
		$email = $db->escape_string($email);
		
		if(!$username){
			$message = 'You must fill in all of the fields!';
		}else{
			$res = $db->query("SELECT * FROM `users` WHERE `username` = '".$username."'");
			$num = $res->num_rows;

			if($num == 1){
				$message = 'The username you have chosen is already taken!';
			}else{
				if(strlen($password) < 5 || strlen($password) > 32){
					$message = 'Password must be at least 5 to 32 characters long!';
				}else{
					if($password != $passconf){
						$message = 'The password needs to match the confirmation password!';
					}else{						
			            if(!check_email($email)){
			                $message = 'The e-mail entered is not valid, must be name@server.tld!';
			            }else{
			            	//select all rows from our users table where the emails match
			            	$res1 = $db->query("SELECT * FROM `users` WHERE `email` = '".$email."'");
			            	$num1 = $res1->num_rows;
			            	
			            	if($num1 == 1){
								$message = 'The e-mail address you supplied is already taken';
							}else{
								$res2 = $db->query("INSERT INTO `users` (`username`, `password`, `email`, `rtime`, `name`) VALUES('".$username."','".$password."','".$email."','".date('U')."','".$name."')");
								$message = 'You have successfully registered!<br /><a href="/login">Click here to login</a>';
							}
						}
					}
				}
			}			
		}

		$db->close();
	}
?>

<div class="lc">
	<h2 class="center">Register</h2>

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
				<label for="username">Username</label>
				<input type="text" id="username" name="username" maxlength="32" />
				<p>Must be less than 32 characters.</p>
			</div>

			<div class="field">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" />
			</div>

			<div class="field last">
				<label for="name">Email</label>
				<input type="text" id="email" name="email" />
			</div>

			<div class="field">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" />
				<p>Must be 5 to 32 characters long.</p>
			</div>

			<div class="field last">
				<label for="confirm-password">Confirm Password</label>
				<input type="password" id="confirm-password" name="confirm-password" />
				<p>Must be 5 to 32 characters long.</p>
			</div>

			<div class="login-help">
				<p>Already have an account? <a href="/login">Login</a></p>
				<p>Forgot your password? <a href="/forgot">Click here!</a></p>
			</div>

			<div class="actions center">
				<button class="btn" name="register" id="register" value="register" type="submit">Register</button>
			</div>
		</form>

	<?php
		} else {
	?>	
		<div class="center">
			<p>You already have an account.</p>
			<p>Start adding <a href="/photos">photos</a> and/or <a href="/comments">say something</a>!</p>
		</div>
	<?php
		}
	?>
</div>
<?php include('includes/footer.php'); ?>