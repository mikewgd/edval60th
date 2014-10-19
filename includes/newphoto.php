<?php
	$output_dir = '../img/uploads/full/';
	$strangeChars = array('_', ')', '(', '[', ']', '{', '}', '-', '.', '*', '@', '!', '\'', '"', ' ');

	require('co.php');
	include('functions.php');
	
	if (isset($_FILES['photos'])) {
		$ret = array();
		$error =$_FILES['photos']['error'];

		if (!is_array($_FILES['photos']['name'])) {
			$exten = ($_FILES['photos']['type'] == 'images/png') ? '.png' : '.jpg'; 
			$photo = protect($_FILES['photos']['name']);
			$formatted = strtolower(str_replace($strangeChars, '', $photo));
			$fileName = date('U').'-'.md5($formatted);
			
			move_uploaded_file($_FILES['photos']['tmp_name'],$output_dir.$fileName.$exten);

			$ret[]= $fileName.$exten;
			$res = $db->query("INSERT INTO `photos` (`photos`) VALUES('".$fileName.$exten."')");
			imageResizer($fileName.$exten, 400);
		} else {
			$fileCount = count($_FILES['photos']['name']);
	
			for ($i=0; $i < $fileCount; $i++) {
				$exten = ($_FILES['photos']['type'][$i] == 'images/png') ? '.png' : '.jpg'; 
				$photo = protect($_FILES['photos']['name'][$i]);
				$formatted = strtolower(str_replace($strangeChars, '', $photo));
				$fileName = date('U').'-'.md5($formatted);

				move_uploaded_file($_FILES['photos']['tmp_name'][$i],$output_dir.$fileName.$exten);
				
				$ret[]= $fileName;
				$res = $db->query("INSERT INTO `photos` (`photos`) VALUES('".$fileName.$exten."')");
				imageResizer($fileName.'.'.$exten, 400);
			}
		}
		
		echo json_encode($ret);
		$db->close();
	}
 ?>