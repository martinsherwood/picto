<?php
    header("Content-Type: application/rss+xml; charset=ISO-8859-1");
 
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', 'root');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'picto_entries');
 
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>Latest 25 Pictures</title>';
    $rssfeed .= '<link>http://localhost/picto/rss.php</link>';
    $rssfeed .= '<description>A feed for the latest 25 pictures that have been submitted</description>';
	$rssfeed .= '<atom:link href="http://localhost/picto/rss.php" rel="self" type="application/rss+xml" />';
	$rssfeed .= '<image>';
    $rssfeed .= '<url>http://gamequorum.com/martin/misc/rss.png</url>';
    $rssfeed .= '<title>Latest 25 Pictures</title>';
    $rssfeed .= '<link>http://localhost/picto/rss.php</link>';
  	$rssfeed .= '</image>';
    $rssfeed .= '<language>en</language>';
    $rssfeed .= '<copyright>Copyright (C) 2011</copyright>';
 
    $connection = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
        or die('Could not connect to database');
    mysql_select_db(DB_NAME)
        or die ('Could not select database');
 
    $query = "SELECT * FROM picto_entries ORDER BY id DESC LIMIT 25";
    $result = mysql_query($query) or die ("Could not execute query");
 
    while($row = mysql_fetch_array($result)) {
        extract($row);
 
        $rssfeed .= '<item>';
        $rssfeed .= '<title>' . $row['title'] . " - (click to view)" . '</title>';
        $rssfeed .= '<description>' . $row['votes_up'] . " people like this picture and, " . $row['votes_down'] . " don't." . '</description>';
        $rssfeed .= '<link>' . 'http://localhost/picto/user_uploads/'.$row['filename'].'' . '</link>';
		$rssfeed .= '<guid>' . 'http://localhost/picto/user_uploads/'.$row['filename'].'' . '</guid>';
        $rssfeed .= '</item>';
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>