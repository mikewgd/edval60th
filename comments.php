<?php include('includes/header.php'); ?>
<div class="lc">
	<h2 class="center">Say Something</h2>

	<div class="comments">
		<div class="form-expand">
			<?php 
				if(!$_SESSION['uid']){
					echo '<p class="center">In order to add a comment you need to <a href="/login">login</a>.</p>';
				} else {
					echo '<a href="#" class="btn form-action">Add Comment</a>';
					$res = $db->query("SELECT * FROM `users` WHERE `id` = '".$_SESSION['uid']."'");
					$row = $res->fetch_assoc(); ?>

					<div class="expand">
						<form action="<?php echo rootURL('includes');?>newcomment.php" method="post" class="ajaxForm" name="comments">
							<div class="errors"></div>

							<div class="field">
								<label for="name">Name</label>
								<input type="text" readonly id="name" name="name" value="<?php echo $row['name']; ?>" />
							</div>

							<div class="field last descrip">
								<label for="comment">Comment (limit: 300 characters)</label>
								<textarea data-mess="Please enter a comment." name="comment" id="comment" maxlength="300" req></textarea>
							</div>

							<div class="center">
								<button class="btn" name="addComment" id="addComment" type="submit" value="addComment">Submit</button>
							</div>
						</form>
					</div><?php 
				}
			?>
		</div>
		
		<?php
			$result = $db->query("SELECT COUNT(*) FROM `comments`");
			$r = $result->fetch_row();
			$numrows = $r[0];
			$itemsperpage = 4;
			$totalpages = ceil($numrows / $itemsperpage);
			$range = 3;

			if ($numrows < 1) {
				echo '<p class="center">No comments have been added.</p>';
				if ($_SESSION['uid']) {
					echo '<p class="center">Be the first to add one! Click the Add a Comment button</p>';
				}
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
			$comments = $db->query("SELECT * FROM `comments` ORDER BY `id` DESC LIMIT $offset, $itemsperpage");
			$logged = $db->query("SELECT * FROM `users` WHERE `id` = '".$_SESSION['uid']."'");
			$user = $logged->fetch_row()[0];

			// echo $loggedUser;

			while ($row = $comments->fetch_assoc()) { ?>
			  <div class="comment" id="comment-<?php echo $row['id'];?>">
					<blockquote><p><?php echo $row['message']; ?></p></blockquote>
					<cite><?php echo $row['name']; ?></cite>
					<?php 
						$userComment = $db->query("SELECT * FROM `users` WHERE `name` = '".$row['name']."'");
						$userComment = $userComment->fetch_row()[0];
						
						if ($userComment == $user) {?>
					<div class="comment-actions">
						<a href="#" class="editComment btn">Edit</a>
						<a href="#" class="deleteComment btn">Delete</a>
					</div>
					<?php } ?>
				</div><?php 
			}
		?>

		<?php if ($numrows > $itemsperpage) {?>
			<div class="pagination">
				<?php
					if ($page > 1) {
					   $prevpage = $page - 1;
					   echo '<a href="/comments/page/'.$prevpage.'" class="prev"><</a>';
					}

					echo '<ul>';
						for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
						   if (($x > 0) && ($x <= $totalpages)) {
						      if ($x == $page) {
						         echo '<li class="active"><a href="#">'.$x.'</a></li>';
						      } else {
						         echo '<li><a href="/comments/page/'.$x.'">'.$x.'</a></li>';
						      }
						   }
						}
					echo '</ul>';
					                 
					if ($page != $totalpages) {
					   $nextpage = $page + 1;
					   echo '<a href="/comments/page/'.$nextpage.'" class="next"><</a>';
					}
				?>
			</div>
		<?php } ?>

	</div>
</div>
<?php include('includes/footer.php'); ?>