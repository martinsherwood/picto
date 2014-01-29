<?php 
//session start for displaying errors
session_start(); 
?>

<?php 
//insert doctype
require("includes/doctype.php");
?>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Picto - Upload Area</title>
	<meta name="title" content="upload your images" />
	<meta name="keywords" content="image,picture,photo,upload,share,twit pic,facebook photo" />
	<meta name="description" content="picto upload area, upload your images from here" />
    
    <?php include("includes/opengraph.php"); ?>
    
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/upload_style.css" type="text/css" media="screen, projection" />
    
    <?php require("includes/jquery.php"); ?>
    <script type="text/javascript" src="js/upload_highlight.js" ></script>
    
	<script type="text/javascript">
    $(document).ready(
    	function highLight(){ $('form').highlight() } )
    </script>
    
	<?php require("css/ie/ielayoutfix.php"); ?>
	<?php require("css/ie/ie7headerfix.php"); ?>
    
    <!--[if IE]>
	<style type="text/css">#footer{margin-top: -94px;}</style>
	<![endif]-->
        
</head>

<body id="upload">

<?php require("includes/layout/header.php"); ?>

<div id="content">

<div id="formContainer">

<?php
if (isset($_SESSION['error']))
{
	echo "<span id=\"error\">" . $_SESSION['error'] . "</span>";
	unset($_SESSION['error']);
}
?>

<form id="imageUpload" enctype="multipart/form-data" method="post" action="./functions/upload_function.php">
<div class="formInfo">
	<span class="title">Upload an Image</span>
	<span class="desc">Choose your image and enter a title</span>
</div>
<ul>
<li id="titleBox" >
    <label class="description" for="title">Title</label>
    <input id="title" name="title" size="55" type="text" />
    <p class="guidelines" id="t_guide"><small>Enter a title or small comment for your image</small></p>
</li>
<li id="imageBox" >
    <label class="description" for="image">Image</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
    <input id="image" name="image" size="40" type="file" />
    <p class="guidelines" id="i_guide"><small>Select the image you want to upload</small></p> 
</li>   
<li id="buttonBox"> 
	<input id="button" name="button" type="submit" value="" />
</li>
</ul>
</form>
</div><!--/form container-->
   
</div><!--/content-->

<div style="height:120px"></div>

<?php require("includes/layout/footer.php"); ?>

</body>
</html>