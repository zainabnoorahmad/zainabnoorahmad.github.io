<?php
include_once("config.php");
$db_select = mysqli_select_db($con, $dbname);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($con));
}

session_start();
$session_email=$_SESSION['email'];
$path = "uploads/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
 
if(isset($_POST['save']) || isset($_POST))
{
	$name = $_FILES['photo']['name'];
	$size = $_FILES['photo']['size'];
	if(strlen($name)) {
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats)) {
			if($size<(1024*1024)) {
				$image_name = time().".".$ext;
				$tmp = $_FILES['photo']['tmp_name'];
				if(move_uploaded_file($tmp, $path.$image_name)){
					mysqli_query($con,"UPDATE `clientregister` SET profile_photo='$image_name' WHERE email='$session_email'");
					echo "<img src='uploads/".$image_name."' class='preview'>";
  				}
				else
				echo "Image Upload failed";
			}
			else
			echo "Image file size max 1 MB";
		}
		else
		echo "Invalid file format..";
	}
	else
	echo "Please select image..!";
	exit;
}
?>
