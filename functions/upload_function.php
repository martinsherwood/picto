<?php
//start session for error reporting
session_start();

//call connection file
require("../private/connection.php");

//check to see if the type of file uploaded is a valid image type
function is_valid_type($file)
{
	//array that holds all the valid image mime types
	$valid_types = array("image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/bmp", "image/gif", "image/tiff", "image/x-tiff", "image/x-icon");

	if (in_array($file['type'], $valid_types))
		return 1;
	return 0;
}

//debugging function that prints the contents of the array
function showContents($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

//declaration of where to upload the images to
$TARGET_PATH = "../user_uploads/";

//get inputs from upload form
$title = $_POST['title'];
$image = $_FILES['image'];

//sanitize the inputs for sql injections
$title = mysql_real_escape_string($title);
$image['name'] = mysql_real_escape_string($image['name']);

//strip the file extension and name for rename (basename is the filename before any changes)
$file_basename = substr($image['name'], 0, strripos($image['name'], '.'));
$file_ext = substr($image['name'], strripos($image['name'], '.'));

//generate a unique ID for the file
$unique_id=uniqid();

//rename with md5 hashtag and the generated unique ID ("$new_filename" is the new filename)
$new_filename = md5($file_basename) . $unique_id . $file_ext;

//clean the filename using regex
$new_filename = preg_replace('/[^\w\.]/', "", strtolower($new_filename));

//build the full string for the target path
$TARGET_PATH .= $new_filename;

//check the fields from the upload form have inputs
if ( $title == "" || $image['name'] == "" )
{
	$_SESSION['error'] = "All fields are required.";
	header("Location: ../upload.php");
	exit;
}

//mimetype check
if (!is_valid_type($image))
{
	$_SESSION['error'] = "You can only upload: jpeg, png, gif, bmp, tiff or ico images.";
	header("Location: ../upload.php");
	exit;
}

//if by some miracle the new filename already exists, error here
if (file_exists($TARGET_PATH))
{
	$_SESSION['error'] = "Sorry, a file with that name already exists in the database.";
	header("Location: ../upload.php");
	exit;
}

//attempt to move the file from its temporary directory to its new directory
if (move_uploaded_file($image['tmp_name'], $TARGET_PATH))
{
	//put filename into database with title
	$sql = "insert into picto_entries (title, filename) values ('$title', '" . $new_filename . "')";
	$result = mysql_query($sql) or die ("Could not insert data into database: " . mysql_error()) . "Please contact the site administrator.";
	header("Location: ../gallery.php");
	exit;
}
else
{
	//make folder writable
	$_SESSION['error'] = "Could not upload file. Please contact site administrator.";
	header("Location: ../upload.php");
	exit;
}
?>

