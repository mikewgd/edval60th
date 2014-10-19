<?php
	session_start();

	include('includes/header.php');

	$message = '';

	if($_POST['forgot']){
		$username = protect($_POST['username']);
		$password = protect($_POST['password']);
		$email = protect($_POST['email']);

		$username = $db->escape_string($username);
		$password = $db->escape_string($password);
		$email = $db->escape_string($email);
			
		if(!$email){
			$message = 'You need to fill in your email addresss.';
		}else{			
            if(!check_email($email)){
                $message = 'The e-mail entered is not valid, must be name@server.tld!';
            }else{
            	$res = $db->query("SELECT * FROM `users` WHERE `email` = '".$email."'");
            	$num = $res->num_rows;
            	
            	//check if the number of row matched is equal to 0
            	if($num == 0){
            		//if it is display error message
					$message = 'The e-mail address you supplied does not exist in our database!';
				}else{
					$row = $res->fetch_assoc();

					$subject = 'EdVal60th: Forgotten Password';
					
					$emailMessage .= '<p>Hello,</p>';
					$emailMessage .= '<p>Here is your password: '.$row['password'].'</p>';
					$emailMessage .= '<p>Try not to loose it again ;)</p>';

					$headers = "From: noreply@edval60th.com\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					mail($email, $subject, $emailMessage, $headers);
					
					//display success message
					$message = 'An email has been sent to your email containing your password.';
				}
			}
		}

		$db->close();
	}
?>

<div class="lc">
	<h2 class="center">Forgot your Password?</h2>

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
				<label for="name">Email</label>
				<input type="text" id="email" name="email" />
			</div>

			<div class="center">
				<button class="btn" name="forgot" id="forgot" type="submit" value="forgot">Send</button>
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

<?php include('includes/footer.php'); ?>