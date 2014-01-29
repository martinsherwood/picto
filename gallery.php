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
	<title>Picto - The Gallery</title>
    <meta name="title" content="the picto gallery" />
    <meta name="keywords" content="image,picture,photo,gallery,funny,architecture,people,life,photography,landscapes,animals,colours,painting,art,fashion,travel,retro,vintage,rss" />
    <meta name="description" content="picto shared gallery, view all the submitted images here" />

	<?php include("includes/opengraph.php"); ?>	

	<link rel="alternate" href="rss.php" title="Latest Images RSS Feed" type="application/rss+xml" />
        
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/gallery_style.css" type="text/css" media="screen, projection" />

	<?php require("includes/jquery.php"); ?>
    
	<script type="text/javascript" src="js/gallery_resize.js"></script>
	<script type="text/javascript" src="js/gallery_voting.js"></script>
	<script type="text/javascript" src="js/gallery_slimbox.js"></script>
	<!--<script type="text/javascript" src="js/gallery_paginate.js"></script>-->
    
    <script type="text/javascript">
    $(document).ready(function() {
        $(".thumb").thumbs();
    });
    </script>

	<!--<script type="text/javascript">
    $(document).ready(function(){
        $("#entries").paginate();                       
    });
    </script>-->
    
	<script type="text/javascript">
    fetchImages = new Array();
    fetchImages[0] = new Image();
    fetchImages[0].src = "images/misc/spinner.gif";
    </script>

	<?php require("css/ie/ielayoutfix.php"); ?>
    <?php require("css/ie/ie7headerfix.php"); ?>
    
</head>

<body id="gallery">

<?php require("includes/layout/header.php"); ?>

<div id="content">

<div id="entries">
<?php
/**display results database**/
$q = "SELECT * FROM picto_entries ORDER BY id DESC";
$r = mysql_query($q) or die ("Could not access DB: " . mysql_error());;

if(mysql_num_rows($r)>0):
	while($row = mysql_fetch_assoc($r)):
		$net_vote = $row['votes_up'] - $row['votes_down']; //the net result of voting up and voting down
?>
<div class="entry">
  <span class="entryBox">
	<span class="thumb"><?php echo "<a rel=\"lightbox-cats\" title=\"" . $row['title'] . "\" href=\"user_uploads/" . $row['filename'] . "\"><img src=\"user_uploads/" . $row['filename'] . "\" alt=\"" . $row['title'] . "\" /></a>"; ?></span><br />
  </span>
  <span class="votes_count" id="votes_count<?php echo $row['id']; ?>"><?php echo $net_vote." Likes"; ?></span> <!--displays the votes-->
    <span class="vote_buttons" id="vote_buttons<?php echo $row['id']; ?>">
	  <a href='javascript:;' class="vote_up" name="<?php echo $row['id']; ?>"></a>
	  <a href='javascript:;' class="vote_down" name="<?php echo $row['id']; ?>"></a>
   </span>
</div>
<?php
	endwhile;
endif;
?>

</div><!--/entries-->

</div><!--/content-->

<?php require("includes/layout/footer.php"); ?>

</body>
</html>