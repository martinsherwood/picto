<?php 
//insert doctype
require("includes/doctype.php");
?>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Picto - Contact Us</title>
	<meta name="title" content="contact picto" />
	<meta name="keywords" content="image,picture,photo,contact,email,facebook,twitter,youtube,mobile" />
	<meta name="description" content="contact us via email, facebook, twitter and more" />
    
    <?php include("includes/opengraph.php"); ?>
    
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/contacts_style.css" type="text/css" media="screen, projection" />
    
	<?php require("css/ie/ielayoutfix.php"); ?>
	<?php require("css/ie/ie7headerfix.php"); ?>
    
    <!--[if IE]>
	<style type="text/css">#footer{margin-top: -94px;}</style>
	<![endif]-->
    
</head>

<body id="contact">

<?php require("includes/layout/header.php"); ?>

<div id="content">
<div class="pageHeading">Contact Us</div>
<div id="contactMain">
<div class="contactEntry"><img src="images/misc/contact_email.png" alt="Email Us" title="Email" /><p><a href="mailto:hello@picto.com">hello@picto.com</a></p></div>
<div class="contactEntry"><img src="images/misc/contact_twitter.png" alt="Tweet Us" title="Twitter" /><p><a href="https://twitter.com/#!/pictogallery" target="_blank">Tweet Us</a></p></div>
<div class="contactEntry"><img src="images/misc/contact_facebook.png" alt="Faccebook Us" title="Facebook" /><p><a href="https://www.facebook.com/pages/Picto/114664948613547" target="_blank">Facebook Us</a></p></div>
</div>
</div><!--/content-->

<div style="height:120px"></div>

<?php require("includes/layout/footer.php"); ?>

</body>
</html>