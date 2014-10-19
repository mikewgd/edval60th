<?php include('includes/header.php'); ?>
<div class="lc">
	<h2>Instructions on How to Use this Site</h2>
	<p>In order to <a href="#addPhotos">add photos</a>, <a href="#addComments">add</a>/<a href="#editComments">edit</a>/<a href="#deleteComments">delete</a> comments you must be <a href="#registering">REGISTERED</a>.</p>

	<div style="height:3em"></div>

	<h3 id="registering">Registering</h3>
	<ol>
		<li><span>1</span> Go to the <a href="/register" target="_blank">registration page</a></li>
		<li><span>2</span> Fill out all of the fields.</li>
		<li><span class="indent">&bull;</span> Your username must be less than 32 characters.</li>
		<li><span class="indent">&bull;</span> You must give a valid email address, i.e. john.smith@gmail.com</li>
		<li><span class="indent">&bull;</span> Password must be 5 to 32 characters long.</li>
		<li><span>3</span> Click the button "REGISTER"</li>
	</ol>

	<div style="height:3em"></div>

	<h3 id="addPhotos">Adding Photos</h3>
	<ol>
		<li><span>1</span> Go to the <a href="/photos" target="_blank">photos page</a>.</li>
		<li><span>2</span> You must be logged in to add photos.</li>
		<li><span class="indent">&bull;</span> You will see this message if you are not logged in: "In order to add a photo you need to login."</li>
		<li><span class="indent">&bull;</span> If you are logged in skip this step.</li>
		<li><span>3</span> Click the button "ADD A PHOTO"</li>
		<li><span>4</span> Click the text "Upload"</li>
		<li><span>5</span> From there you can select multiple files</li>
		<li><span class="indent">&bull;</span> Please only upload 5 images at a time</li>
		<li><span class="indent">&bull;</span> Only upload photos that are JPG or PNG files.</li>
		<li><span class="indent">&bull;</span> Each image must be under 5 MB. If it is over try compressing it here: <a href="http://jpeg-optimizer.com/" target="_blank">JPG Compression</a> or <a href="http://ezgif.com/optipng" target="_blank">PNG Compression</a></li>
		<li><span>6</span> When you click "Done" or "Open" after you selected your files, you will see a list of your files under the text "Upload"</li>
		<li><span>7</span> If you wish to not have a certain photo added, locate the "X" next to the file and click it.</li>
		<li><span>8</span> After you have selected all the photos you want to add click "Upload Files"</li>
	</ol>

	<div style="height:3em"></div>

	<h3 id="addComments">Adding Comments</h3>
	<ol>
		<li><span>1</span> Go to the <a href="/comments" target="_blank">comments page</a>.</li>
		<li><span>2</span> You must be logged in to add comments.</li>
		<li><span class="indent">&bull;</span> You will see this message if you are not logged in: "In order to add a comment you need to login." <a href="/login">Click here to login</a></li>
		<li><span class="indent">&bull;</span> If you are logged in skip this step.</li>
		<li><span>3</span> Click the button "ADD A COMMENT"</li>
		<li><span>4</span> Type in your comment in the comment field.</li>
		<li><span class="indent">&bull;</span> Maximum amount of characters are 300.</li>
		<li><span>5</span> When you are done click "SUBMIT"</li>
	</ol>

	<div style="height:3em"></div>

	<h3 id="editComments">Editing Comments</h3>
	<ol>
		<li><span>1</span> Go to the <a href="/comments" target="_blank">comments page</a>.</li>
		<li><span>2</span> You must be logged in to edit your comment.</li>
		<li><span class="indent">&bull;</span> <a href="/login">Click here to login</a></li>
		<li><span class="indent">&bull;</span> If you are logged in skip this step.</li>
		<li><span>3</span> Locate the comment you have posted</li>
		<li><span>4</span> Click the "EDIT" button.</li>
		<li><span>5</span> Start typing into the text field.</li>
		<li><span class="indent">&bull;</span> If you have decided you do not want to edit you comment click "CANCEL".</li>
		<li><span>6</span> After you are done editting your comment click "UPDATE".</li>
	</ol>

	<div style="height:3em"></div>

	<h3 id="deleteComments">Deleting Comments</h3>
	<ol>
		<li><span>1</span> Go to the <a href="/comments" target="_blank">comments page</a>.</li>
		<li><span>2</span> You must be logged in to delete your comment.</li>
		<li><span class="indent">&bull;</span> <a href="/login">Click here to login</a></li>
		<li><span class="indent">&bull;</span> If you are logged in skip this step.</li>
		<li><span>3</span> Locate the comment you have posted</li>
		<li><span>4</span> Click the "DELETE" button.</li>
		<li><span>5</span> A popup will appear asking "Are you sure you want to remove this comment?"</li>
		<li><span class="indent">&bull;</span> Click "Cancel" if you have decided you do not want to remove it.</li>
		<li><span class="indent">&bull;</span> <strong>NOTE:</strong> This is final!
		<li><span>6</span> After you are sure you want to remove it click the "Ok" button in the popup.</li>
	</ol>
	
</div>
<?php include('includes/footer.php'); ?>