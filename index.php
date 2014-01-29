<?php 
//insert doctype
require("includes/doctype.php");
?>

<?php 
//get database connection
require("private/connection.php");
?>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Picto - Online Shared Gallery</title>
    <meta name="title" content="picto online gallery website" />
    <meta name="keywords" content="image,picture,photo,social,shared,online,public,gallery,facebook,twitter,youtube,mobile" />
    <meta name="description" content="public, online shared image gallery" />

	<?php include("includes/opengraph.php"); ?>

    <link rel="alternate" href="rss.php" title="Latest Images RSS Feed" type="application/rss+xml" />
 
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/index_content.css" type="text/css" media="screen, projection" />
    
    <?php require("includes/jquery.php"); ?>
    <?php require("includes/jquery_ui.php"); ?>
    
    <script type="text/javascript" src="js/index_topslider.js"></script>
    <script type="text/javascript" src="js/index_bestpicks_scroller.js"></script>  
    <script type="text/javascript" src="js/index_thumbs.js"></script>
    
	<!--[if !IE]><!-->
        <script type="text/javascript" src="js/index_contscrollbars.js"></script>
 	<!--<![endif]-->
	
	<!--[if gt IE 7]>
        <script type="text/javascript" src="js/index_contscrollbars_ie.js"></script>
	<![endif]-->
	
	<script type="text/javascript">
	(function($) {
		$(function() {
			$("#bestScroller").scroll({
				autoMode: 'loop'
			});
		});
	})(jQuery);
	</script>

	<script type="text/javascript">
    $(document).ready(function() {
        $(".thumb").thumbs();
    });
    </script>
    
	<?php require("css/ie/ielayoutfix.php"); ?>
    <?php require("css/ie/ie7headerfix.php"); ?>
    
	<!--[if IE 7]>
    <link rel="stylesheet" href="css/ie/ie7_ind.css" type="text/css" media="screen, projection" />
	<![endif]--> 

</head>

<body id="home">

<?php require("includes/layout/header.php"); ?>

<div id="content">

<div id="frontSlider">
<div class="window">    
  <div class="imageReel">
    <a href="#"><img src="images/slides/slide_1.png" alt="" /></a>
    <a href="#"><img src="images/slides/slide_2.png" alt="" /></a>
    <a href="#"><img src="images/slides/slide_3.png" alt="" /></a>
    <a href="#"><img src="images/slides/slide_4.png" alt="" /></a>
  </div>
  <div class="paging">
    <a href="#" rel="1">1</a>
    <a href="#" rel="2">2</a>
    <a href="#" rel="3">3</a>
    <a href="#" rel="4">4</a>
  </div> 
</div>  
</div>

<div id="uploadCount">
<?php $directory = "./user_uploads/";
if (glob("$directory*.*") != false)
{
 $filecount = count(glob("$directory*.*"));
 echo "<div class=\"digits\">" . $filecount . "</div>" . "<div class=\"uploadDesc\">" . " images have been submitted" . "<br />" . "to the Picto gallery" . "</div>";
}
else
{
 echo 0;
} ?>
</div>

<div id="contentBars">
<h1>Join in the fun, see what's happening and what's hot right now!</h1>

<div id="best">
<div class="barContainer">
<span class="barHeading">Best Picks</span>
<span class="barDesc">Editors picks of the nicest and best images that have been seen on Picto, these are the cream of the crop.</span>
</div>
<ul id="bestScroller">
<li><img src="content/bestpicks/bestpick01.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick02.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick03.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick04.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick05.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick06.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick07.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick08.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick09.jpg" alt="" /></li>
<li><img src="content/bestpicks/bestpick10.jpg" alt="" /></li>
</ul>
</div>

<!--***-->

<div id="recent">
<div class="barContainer">
<span class="barHeading">Recent</span>
<span class="barDesc">View the most recently submitted images in the gallery.</span>
</div>
<div class="dynamicCont">
<ul>
<?php
$q = "SELECT * FROM picto_entries GROUP BY id DESC LIMIT 10";
$r = mysql_query($q) or die ("Could not access DB: " . mysql_error());;

if(mysql_num_rows($r)>0):
	while($row = mysql_fetch_assoc($r)):	
?>
<?php echo "<li class=\"thumb\">" . "<img src=\"user_uploads/" . $row['filename'] . "\" title=\"" . $row['title'] . "\" alt=\"" . $row['title'] . "\" />" . "</li>"; ?>

<?php
	endwhile;
endif;
?>
</ul>
</div>
<div class="scrollSlider"></div>
</div>

<!--***-->

<div id="popular">
<div class="barContainer">
<span class="barHeading">Popular</span>
<span class="barDesc">Browse &amp; discover the most popular and liked images currently doing the rounds.</span>
</div>
<div class="dynamicCont">
<ul>
<?php
$q = "SELECT * FROM picto_entries GROUP BY votes_up DESC LIMIT 10";
$r = mysql_query($q) or die ("Could not access DB: " . mysql_error());;

if(mysql_num_rows($r)>0):
	while($row = mysql_fetch_assoc($r)):	
?>
<?php echo "<li class=\"thumb\">" . "<img src=\"user_uploads/" . $row['filename'] . "\" title=\"" . $row['title'] . "\" alt=\"" . $row['title'] . "\" />" . "</li>"; ?>

<?php
	endwhile;
endif;
?>
</ul>
</div>
<div class="scrollSlider"></div>
</div>

</div><!--/bars-->

</div><!--/content-->

<?php require("includes/layout/footer.php"); ?>

</body>
</html>