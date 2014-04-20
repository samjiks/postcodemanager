<?php

Class connectDB{
	var $host, $username, $password, $DB;

	function connecttoDB($host,$username,$password, $DB){
  
	$link = mysql_connect($host, $username, $password);
		if (!$link) {
			die('Could not connect: ' . mysql_error());
		}

		$selected = mysql_select_db($DB,$link) 
				or die("Could not select the database");
		}
}

$link = mysql_connect('localhost:3306', 'root', 'admin');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$selected = mysql_select_db("voiceofactiondb",$link) 
  or die("Could not select the database");
  



?>