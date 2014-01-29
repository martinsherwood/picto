<?php 
//insert doctype
require("includes/doctype.php");
?>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Picto - Affiliates</title>
	<meta name="title" content="picto's affiliates and partners" />
	<meta name="keywords" content="image,picture,photo,affiliates,partners,business,limecode,gamequorum" />
	<meta name="description" content="current list of affiliates and partnered websites" />
    
    <?php include("includes/opengraph.php"); ?>
    
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/affiliates_style.css" type="text/css" media="screen, projection" />
    
	<?php require("css/ie/ielayoutfix.php"); ?>
	<?php require("css/ie/ie7headerfix.php"); ?>
    
    <!--[if IE]>
	<style type="text/css">#footer{margin-top: -94px;}</style>
	<![endif]-->
    
</head>

<body id="affiliates">

<?php require("includes/layout/header.php"); ?>

<div id="content">
<div class="pageHeading">Affiliates</div>

<div id="affiliatesMain">

<div class="affiliateBlock"><div class="imgCont"><img src="content/affiliates/limecode.png" alt="Limecode" title="Limecode Software Solutions" /></div>
<p><a href="http://www.limecode.com">Limecode</a> are a new software company start-up, who offers premium software solutions for a variety of different needs. Currently their products are only available for the Windows operating system but they plan to expand into the other popular operating systems, including that of mobile application development in the future.</p>
</div>
<div class="seperator"></div>
<div class="affiliateBlock"><div class="imgCont"><img src="content/affiliates/gamequorum.png" alt="GameQuorum" title="GameQuorum Online Community" /></div>
<p>Established back in 2008, <a href="http://gamequorum.com">GameQuorum</a> are an online community primarily centred on and around gaming and other online activities, but by no means make those a limit to what they offer to their users. They have members from all over the globe but are primarily based in the UK and anyone is welcome to join.</p>
</div>


</div><!--/main-->

</div><!--/content-->

<div style="height:120px"></div>

<?php require("includes/layout/footer.php"); ?>

</body>
</html>