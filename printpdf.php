<?php
if(isset($_GET['download'])){
     download();
}
function download(){
	$file = 'address.doc';

	if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Address Book - VOICE OF ACTION</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">

    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

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
  <script type="text/javascript" >
     $(document).ready(function(){
	 $("download").click(function(){
	    // http://localhost/voiceofaction/address.doc
	 )};
	)};
  </script>
<body>
<link></link>
<?php 
include_once('dbconnect.php');
		
		$result = mysql_query("SELECT * FROM registration_table ORDER BY POSTCODE", $link);
		
		
		if (!$result) {
			die('Error: ' . mysql_error());
		}
		$array = array();
		while($row = mysql_fetch_array($result)){
		       $array[] = $row;
			//	echo "<address>";
			//	echo $row['title']." ".$row['firstname']." ".$row['lastname']."</br>".$row['address1']."</br>".$row['address2']."</br>".$row['towncity']."</br>".$row['stateprovince']."-".$row['postcode']."</br>".$row['country']."</br>";	 
		        
		} 
	//		echo "</address>";
		$data = json_encode($array);
		$json = json_decode($data, true);
		$count = 0;
		 $txtfilename = "Address";
		
		 $fp = fopen($txtfilename.".doc", 'w+'); 
		 $result = "";
	    $result.="<table border='1'>";
		foreach($json as $key => $value){
	
	      if($count%4 == 0 || $count == 0){
		     $result.= "<tr>";
		  }
		  $result.="<td>";
		  $result.=$value['title']." ".$value['firstname']."</br>";
		  $result.=$value['address1']."</br>";
		  $result.=$value['address2']."</br>";
		  $result.=$value['towncity']." - ".$value['postcode']."</br>";
		  $result.=$value['stateprovince']."</br>";
		  $result.=$value['country']."</br>";
		  echo "</td>";
		  
		 if($count%3 == 1){
			echo "</tr>";
		 }
		   $count++;
		}
		 fwrite($fp, $result);
		
		 fclose($fp);
	//	echo $_GET['page'];
		 echo "<p class='alert'> Completed printing, Address.doc <a name='download' href='printpdf.php?download=true' value='Download file'>Download File</a> </p>"; 
		 echo "<form method='GET' action='printpdf.php'>";
	     echo "";
		 echo "</form>";
		mysql_close($link);
?>
</body>
</html>

