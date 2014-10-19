<?php 

	include('includes/header.php');

	if (isset($_GET['login'])) {
		include('includes/login.php');
	} else if (isset($_GET['logout'])) {
		include('includes/logout.php');
	} else {
?>

<div class="lc intro">
	<h2 class="center">Welcome to Ed & Val's 60th Birthday website!</h2>
	<p>It's our gift to the birthday boy and girl. It's meant to be a place for shared memories via the photos and messages posted by family and friends. </p>
	<p>Ed & Val - We hope this site will be fun for you to browse through and that you'll use it going forward to share photos and memories!</p>
	<p>Love, Jess, Michael, Eric, and all your friends & family</p>
	<div style="height:20px;"></div>

	<?php 
		if(!$_SESSION['uid']){?>
			<p>Don't have an account? <a href="/register">Register :)</a></p>
			<p>Already have an account? <a href="/login">Login</a></p>
		<?php } else {?>
			<div class="center">
				<h3>Get Started!</h3>
				<a href="/photos" class="btn">Add photos</a>
				<a href="/comments" class="btn">Say Something!</a>
			</div>
		<?php }

	?>
</div>

<?php 
	}

	include('includes/footer.php');
?>