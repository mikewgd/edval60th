<?php 
	include('includes/header.php');
	
	$photos = $db->query("SELECT * FROM `photos` ORDER BY `id`");
	$current = (isset($_GET['photo'])) ? $_GET['photo'] : 0;
	$total = $photos->num_rows;
	$photosArray = array();
	$thumbWidth = 60;
	$margin = 5;
	$ulWidth = ($total*$thumbWidth+($margin*$total))-5;

	while ($row = $photos->fetch_assoc()) { 
		array_push($photosArray, $row['photos']);
	}

	$currentPhoto = $photosArray[$current];
?>

<div class="slideshow-stage">
	<a href="/slideshow/photo/<?php echo ($current == 0) ? $total-1 : $current-1;?>" class="arrow prv"><span>Prev</span></a>
	<img class="img" src="<?php echo rootURL('img/uploads/full').$currentPhoto; ?>" alt="image" />
	<a href="/slideshow/photo/<?php echo ($current == $total-1) ? 0 : $current+1;?>" class="arrow nxt"><span>Next</span></a>
</div>

<div class="slideshow-thumbs">
	<ul style="width:<?php echo $ulWidth; ?>px;">
		<?php 
			foreach($photosArray as $key => $value) {?>
				<li>
					<a href="/slideshow/photo/<?php echo $key;?>">
						<span>
							<picture>
								<img class="img" src="<?php echo rootURL('img/uploads/thumbs').$value; ?>" alt="image" />
							</picture>
						</span>
					</a>
				</li><?php
			}
		?>
	</ul>
</div>
<?php include('includes/footer.php'); ?>