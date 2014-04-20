<?php
require("dbconnect.php"); //include config file

$item_per_page = $_POST["item_per_page"];
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}

//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysql_query("SELECT * FROM registration_table ORDER BY postcode DESC LIMIT $position, $item_per_page", $link);

//output results from database
	$array = array();
echo '<ul class="page_result">';

		while($row = mysql_fetch_array($results)){
		       $array[] = $row;
			//	echo "<address>";
			//	echo $row['title']." ".$row['firstname']." ".$row['lastname']."</br>".$row['address1']."</br>".$row['address2']."</br>".$row['towncity']."</br>".$row['stateprovince']."-".$row['postcode']."</br>".$row['country']."</br>";	 
		        
		} 
	//		echo "</address>";
		$data = json_encode($array);
		$json = json_decode($data, true);
		$count = 0;
		
		foreach($json as $key => $value){
		  $t = $count%2;
          echo ($t==2) ?  '<div id="results">' : '<div id="results" style="float: left;  width: 200px;  min-height: 200px; display: inline-block;">';
		  echo "<p class='alert'>";
		  echo $value['title']." ".$value['firstname']."</br>";
		  echo $value['address1']."</br>";
		  echo $value['address2']."</br>";
		  echo $value['towncity']." - ".$value['postcode']."</br>";
		  echo $value['stateprovince']."</br>";
		  echo $value['country']."</br>";
		  echo "</p>";
		  echo "</div>";
		  $count++;
		}
echo '</ul>';
?>