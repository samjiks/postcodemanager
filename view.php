<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Revolutionary life - Living Stones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<script src="js/jquery-2.1.0.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
  <script>
  $(document).ready(function(){
  	   $("#pages").select(function() {
	    var pages = $( "#pages option:selected" ).val();
	         alert(pages);
	    });
		   });
	 $(document).ready(function() {
	    var pages = $( "#pages option:selected" ).val();
	        
		$("#results").load("fetch_pages.php", {'page':0,'item_per_page':10}, function() {$("#1-page").addClass('active');});  

		$(".paginate_click").click(function (e) {
			
			$("#results").prepend('<div class="loading-indication"><img src="img/ajax-loader.gif" /> Loading...</div>');
			
			var clicked_id = $(this).attr("id").split("-"); 
			var page_num = parseInt(clicked_id[0]); 
			
			$('.paginate_click').removeClass('active'); 
			
			$("#results").load("fetch_pages.php", {'page': (page_num-1), 'item_per_page':10}, function(){

			});

			$(this).addClass('active');
			
			return false; //prevent going to herf link
		}); 
});
  </script>
<body>
<?php 
include_once('dbconnect.php');
		
		$result = mysql_query("SELECT * FROM registration_table", $link);
		$result_count = mysql_query("SELECT count(*) from registration_table", $link);
		
		$get_total_rows  = mysql_fetch_array($result_count);
	    $items_per_page = 10;
		$pages = ceil($get_total_rows[0]/$items_per_page);
		
		$pageresult = '';
		
		

		$pageresult.='<div class="pagination pagination-centered">';
		if($pages > 1){
			$pageresult.='<ul class="paginate">';
			for($i=0; $i < $pages;){
			++$i;
				 $pageresult.='<li><a href="#" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
			}
			$pageresult.='</ul>';
		}
		
		 $pageresult.='</div>';
		 echo $pageresult; 
	
		if (!$result) {
			die('Error: ' . mysql_error());
		}
/* 		$array = array();
		while($row = mysql_fetch_array($result)){
		       $array[] = $row;
			//	echo "<address>";
			//	echo $row['title']." ".$row['firstname']." ".$row['lastname']."</br>".$row['address1']."</br>".$row['address2']."</br>".$row['towncity']."</br>".$row['stateprovince']."-".$row['postcode']."</br>".$row['country']."</br>";	 
		   //		echo "</address>";   
		} 
	
		$data = json_encode($array);
		$json = json_decode($data, true);
		$count = 0;
		
		foreach($json as $key => $value){
		  $t = $count%2;
          echo ($t==2) ?  '<div id="results">' : '<div id="results"  style="float: left;  margin: "1em"; padding=10px; width: 200px;  min-height: 200px; display: inline-block;">';
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
		} */

		
		//mysql_close($link);
?>
	 		<select id="pages">
			<option value="10">10</option>
			<option value="5">5</option>
			<option value="20">20</option>
			<option value="25">25</option>
			</select>
<span class="out"></span>
     <div id="results"></div>
</body>
</html>

