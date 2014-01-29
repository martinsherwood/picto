<?php

// Input information for the database here

// Host name
//$host = "192.168.12.20";

// Database username
//$username = "msherwood";

// Database password
//$password = "password";

// Name of database
//$database = "msherwood";


//
//// Host name
$host = "localhost";
//
//// Database username
$username = "root";
//
//// Database password
$password = "root";
//
//// Name of database
$database = "picto_entries";
//


$conn = mysql_connect($host, $username, $password) or die ("Could not connect");
$db = mysql_select_db($database, $conn) or die ("Could not select DB");

?>
