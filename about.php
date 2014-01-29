<?php 
//insert doctype
require("includes/doctype.php");
?>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Picto - About Us</title>
	<meta name="title" content="about picto" />
	<meta name="keywords" content="image,picture,photo,about,company,business,policy,terms,conditions" />
	<meta name="description" content="picto upload area, upload your from pictures here" />
    
    <?php include("includes/opengraph.php"); ?>
    
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/about_style.css" type="text/css" media="screen, projection" />
    
	<?php require("css/ie/ielayoutfix.php"); ?>
	<?php require("css/ie/ie7headerfix.php"); ?>
    
    <!--[if IE]>
	<style type="text/css">#footer{margin-top: -94px;}</style>
	<![endif]-->
        
</head>

<body id="about">

<?php require("includes/layout/header.php"); ?>

<div id="content">
<div class="pageHeading">About Picto</div>

<div id="infoMain">
<div class="infoContainer">
<h1>What is Picto?</h1>
<p>Picto is a shared image gallery, a sort of online social experiment that anyone can contribute to. Upload your pictures and have them instantly displayed for all to see in the gallery.</p>
</div>
<div class="infoContainer">
<h1>How do I upload to Picto?</h1>
<p>Upload any pictures you like from the upload page and give it a title, name or small comment, both are needed and you'll be taken to the viewing area right after. Currently we only support the uploading of one image at a time, from your own computer but we are aiming to change this soon.</p>
</div>
<div class="infoContainer">
<h1>Is that all?</h1>
<p>No way! Here at Picto we are keen on social engagement and interaction, so we implemented a system so that you use to rate the pictures in the gallery with a simple thumbs up or down in a "I like this, I don't like this" kinda way. If you want to get a closer look at the image, simple click it to make it pop out into a larger version.</p>
</div>
</div><!--/infoMain-->

</div><!--/content-->

<div style="height:120px"></div>

<?php require("includes/layout/footer.php"); ?>

</body>
</html>