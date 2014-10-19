<?php
	/**
	* @function protect
	* Returns a string with all whitespace and unnecessary characters removed.
	*
	* @param {String} $string - string to be stripped of slashes and tags.
	*/
	function protect($string){
		$string = trim(strip_tags(stripslashes($string)));
		return $string;
	}

	/**
	* @function rootURL
	* Returns the absolute url path.
	*
	* @param {String} $direct (optional) - if you want to provide a directory appended to the absolute url path.
	*/
	function rootURL($direct) {
	    $sn = ($_SERVER['SERVER_NAME'] == 'localhost') ? $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'] : $_SERVER['SERVER_NAME'];
	    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$sn :  'https://'.$sn;
	    return ($direct) ? $url.'/'.$direct.'/' : $url.'/';
	}

	/** 
	* function pageName
	* Returns the "page" or file name of the page you are currently on with extension removed.
	*/
	function pageName () {
		$extens = array('.html', '.htm', '.php', '.aspx', '.xhtml', '.asp');
		return str_replace($extens, '', basename($_SERVER['PHP_SELF']));
	}

	/**
	* @function check_email
	* Returns a boolean if it is a valid email adress.
	*
	* @param {String} $email - email address to be validated.
	*/
	function check_email ($email) {
		return preg_match('/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i', $email);
	}

	/**
	* @function imageResizer
	* Resizes the image given with the specified width.
	*
	* @param {String} $fileName - absolute path to the image to be resized.
	* @param {Number} $width - the desired width of the image.
	*/
	function imageResizer($filename, $width) {
		$imgFolder = '../img/uploads/';
		$imgdir = $imgFolder.'full/';
		$destdir = $imgFolder.'thumbs/';

		if(preg_match('/[.](jpg)$/', $filename)) {
	        $im = imagecreatefromjpeg($imgdir.$filename);
	    } else {
	        $im = imagecreatefrompng($imgdir.$filename);
	    }

	    $ox = imagesx($im);
	    $oy = imagesy($im);
	     
	    $nx = $width;
	    $ny = floor($oy * ($nx / $ox));
	     
	    $nm = imagecreatetruecolor($nx, $ny);
	     
	    imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
	     
		if(!file_exists($destdir)) {
			if(!mkdir($destdir)) {
				die("There was a problem. Please try again!");
			} 
		}
	 
	    imagejpeg($nm, $destdir . $filename);
	}
?>