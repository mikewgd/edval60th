<?php include('includes/header.php'); ?>
<div class="lc">
	<h2 class="center">Photo Gallery</h2>

	<div class="form-expand">
		<?php 
			if(!$_SESSION['uid']){
				echo '<p class="center">In order to add a photo you need to <a href="/login">login</a>.</p>';
				echo '<p class="center"><a href="/slideshow" class="btn">SLIDESHOW</a></p>';
			} else {
				echo '<a href="#" class="btn form-action">Add Photo</a>';?>
				<div class="expand">
					<div class="photo-overlay one-ov"></div>
					<p class="photo-overlay-text one-ov">Please wait. Your photos are being uploaded.</p>
					<div id="mulitplefileuploader">Upload</div>

					<div class="info">
						<p>Please only upload 5 images at a time.</p> 
						<p>Only .png and .jpg files are accepted.</p>
						<p>The maximum file size per image is 5 MB.</p>
					</div>

					<div class="center">
						<a href="#" class="start-upload">Upload Files</a>
					</div>

					<p class="photo-overlay-text two-ov">Please wait. Your photos are being uploaded.</p>
					<div class="photo-overlay two-ov"></div>
				</div>
				<a href="slideshow" class="btn fr">slideshow</a><?php 
			}
		?>

		
	</div>

	<?php
		$result = $db->query("SELECT COUNT(*) FROM `photos`");
		$r = $result->fetch_row();
		$numrows = $r[0];
		$itemsperpage = 24;
		$totalpages = ceil($numrows / $itemsperpage);
		$range = 3;
		$count = $db->query("SELECT * FROM `photos` ORDER BY `id`")->num_rows;

		if ($numrows < 1) {
			echo '<p class="center">No photos have been added.</p>';
			if ($_SESSION['uid']) {
				echo '<p class="center">Be the first to add one! Click the Add a Photo button</p>';
			}
		} else {
			echo '<ul class="photos">';
		}

		if (isset($_GET['page']) && is_numeric($_GET['page'])) {
		   $page = (int) $_GET['page'];
		} else {
		   $page = 1;
		}

		if ($page > $totalpages) {
		   $page = $totalpages;
		} 

		if ($page < 1) {
		   $page = 1;
		}

		$offset = ($page - 1) * $itemsperpage;
		$photos = $db->query("SELECT * FROM `photos` ORDER BY `id` DESC LIMIT $offset, $itemsperpage");
		$count = $count-$offset;

		while ($row = $photos->fetch_assoc()) { 
			$count--; 
		?>
		  <li id="photo-<?php echo $row['id'];?>">
		  		<a href="/slideshow/photo/<?php echo $count;?>">
					<img src="<?php echo rootURL('img/uploads/thumbs').$row['photos']; ?>" />
				</a>
			</li><?php 
		}

		if ($numrows > 0) {
			echo '</ul>';
		}
	?>

	<?php if ($numrows > $itemsperpage) {?>
		<div class="pagination">
			<?php
				if ($page > 1) {
				   $prevpage = $page - 1;
				   echo '<a href="/photos/page/'.$prevpage.'" class="prev"><</a>';
				}

				echo '<ul>';
					for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
					   if (($x > 0) && ($x <= $totalpages)) {
					      if ($x == $page) {
					         echo '<li class="active"><a href="#">'.$x.'</a></li>';
					      } else {
					         echo '<li><a href="/photos/page/'.$x.'">'.$x.'</a></li>';
					      }
					   }
					}
				echo '</ul>';
				                 
				if ($page != $totalpages) {
				   $nextpage = $page + 1;
				   echo '<a href="/photos/page/'.$nextpage.'" class="next"><</a>';
				}
			?>
		</div>
	<?php } 
		$db->close();
	?>
</div>
<?php include('includes/footer.php'); ?>