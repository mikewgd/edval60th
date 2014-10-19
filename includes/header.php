<?php 
	session_start();

	require('co.php');
	include('functions.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ed & Val Both Celebrating 60 years!</title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
	<?php
		$page = pageName();
		$diffCSS = array('index', 'comments', 'photos', 'usage', 'slideshow');

		if (in_array($page, $diffCSS)) {?>
			<link rel="stylesheet" type="text/css" href="/css/pages/<?php echo pageName();?>.css">
	<?php } ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="<?php echo $page.'-page';?>">

	<header class="header">
		<?php 
			if ($page == 'slideshow') {?>
				<h1><a href="/">Ed & Val <span>Both Celebrating 60 years!</span></a></h1>
				<h2>Photo Slideshow</h2>
				<a href="/">&larr; Return to the site</a>
			<?php } else {?>
				<h1 id="logo">Ed & Val <span>Both Celebrating 60 years!</span></h1>

				<nav class="nav">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/usage">Usage</a></li>
						<li><a href="/photos">Photos</a></li>
						<li><a href="/comments">Say Something</a></li>
						<?php if($_SESSION['uid']) {echo '<li><a href="/logout">Logout</a></li>';} ?>
					</ul>
				</nav>
			<?php } ?>
	</header>

	<div class="content">