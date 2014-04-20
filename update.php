<? session_start();

//echo "Welcome, " . $_SESSION["username"];
?>

<?php 
include_once('dbconnect.php');



	if (isset($_POST['update'])) {
	
	   $size = count($_POST['title']);
	   $size = count($_POST['firstname']);
	   $size = count($_POST['address1']);
	   $size = count($_POST['address2']);
	   $size = count($_POST['towncity']);
	   $size = count($_POST['stateprovince']);
	   $size = count($_POST['country']);
	   $size = count($_POST['postcode']);
	   
	   
	   	   $i = 0;
	
	  while($i < $size){
	   
	   $title  = $_POST['title'][$i];
	   $firstname = $_POST['firstname'][$i];
       $address1 = $_POST['address1'][$i];
	   $address2 =	$_POST['address2'][$i];
	   $towncity = $_POST['towncity'][$i];
	   $stateprovince = $_POST['stateprovince'][$i];
	   $country =	$_POST['country'][$i];
	   $postcode =	$_POST['postcode'][$i];
	     $id = $_POST['id'][$i];
		 	
			$sql = "UPDATE registration_table SET title = '$title', firstname = '$firstname', address1 = '$address1', address2 = '$address2', towncity = '$towncity', stateprovince = '$stateprovince', country = '$country', postcode = '$postcode' WHERE user_id = '$id'";
            $result = mysql_query($sql, $link) or die ("Error in query: $sql".mysql_error()); 
		   // 
	   ++$i;
      }
	 echo "<p class='alert'>Congratulations!,Your record have been successfully updated</p>";
			   
	}else if(isset($_POST['delete'])) {
   
	     rundeletes();
	}
	
	
		function rundeletes(){
			Global $link;
	
			foreach($_POST['id'] as $id){
				$checked = 0;
				
			if($checked = 0){
				echo "Nothing Selected";
				exit;
			}
			
			if(isset($_POST["checkbox".$id])){
				$checked = 1;
			}
			
			if($checked ==1){
					$sql = "DELETE FROM registration_table WHERE User_id = '$id' ";
		
					$retval = mysql_query($sql, $link);
									
						if(! $retval ){
							die('Could not delete data: ' . mysql_error());
						}else{				
							echo "Congratulations! Record(s) selected have been successfully deleted \n";
						}	
					}
			}
			mysql_close($link);
			
		}
		
/* 		function runupdates($title, $firstname, $address1, $address2, $towncity, $stateprovince, $country, $postcode, $link) {
	
			foreach ($_POST['id'] as $id) { 
				$checked = 0;
				if(isset($_POST["checkbox".$id])){
					$checked = 1;
				}
				if($checked == 1){
				    $sql = "UPDATE registration_table SET firstname = '$firstname', address1 = '$address1', address2 = '$address2', towncity = '$towncity', stateprovince = '$stateprovince', country = '$country', postcode = '$postcode' WHERE user_id = '$id'";
				}else{
				    $sql = "UPDATE registration_table SET firstname = '$firstname', address1 = '$address1', address2 = '$address2', towncity = '$towncity', stateprovince = '$stateprovince', country = '$country', postcode = '$postcode'";
				}
				
				$retval = mysql_query( $sql, $link );
				
				if(! $retval ){
					die('Could not update data: ' . mysql_error());
				}else{
				   echo "Congratulations! ".$id." ,Your record have been successfully updated";
				}
			}
			mysql_close($link);
		} */

		if(isset($_POST['search'])){

		$first_name = $_POST['firstname'];
		
	
		$searchfields = array($first_name);
    
		if(!array_filter($searchfields)) {
			echo '<p class="text-warning">Please enter a value into at least one of the fields regarding the request you are searching for.</p>';
		}else{

		$sql = "SELECT * FROM registration_table where firstname like '%".$first_name."%'";

		$result = mysql_query($sql, $link);
	
	
		if (!$result) {
			die('Error: ' . mysql_error());
		}
		echo "<form action='update.php' method='post'>";
		echo "<table class='table table-hover table-striped'><tr><th>Title</th><th>Fullname</th><th>Address1</th><th>Address2</th><th>City/Town</th><th>State</th><th>Country</th><th>Postcode</th><th>Update/Delete</th></tr>";
			
		while($row = mysql_fetch_array($result)){
			echo "<tr><td><input type='text' class='input-small' name='title[]' value='".$row['title']."'><td><input type='text' class='input-small' name='firstname[]' value='".$row['firstname']."'></td><td><input type='text' name='address1[]' class='input-small' value='".$row['address1']."'></input></td><td><input type='text' name='address2[]' class='input-small' value='".$row['address2']."'></input></td><td><input class='input-small' name='towncity[]' type='text' value='".$row['towncity']."'></input></td><td><input class='input-small' type='text' name='stateprovince[]' value='".$row['stateprovince']."'></input></td><td><input class='input-mini' name ='country[]' type='text' value='".$row['country']."'></input></td><td><input type='text' name='postcode[]' class='input-small' value='".$row['postcode']."'></td><td><input type='checkbox' id='".$row['user_id']."' name='checkbox".$row['user_id']."' ></td><td><input type='hidden' class='input-small' name='id[]' value='".$row['user_id']."'></td></tr>";	 

			//echo "<tr><td><input type='text' class='input-small' name='title' value='".$row['title']."'><td><input type='text' class='input-small' name='firstname' value='".$row['firstname']."'></td><td><input type='text' name='address1' class='input-small' value='".$row['address1']."'></input></td><td><input type='text' name='address2' class='input-small' value='".$row['address2']."'></input></td><td><input class='input-small' name='towncity' type='text' value='".$row['towncity']."'></input></td><td><input class='input-small' type='text' name='stateprovince' value='".$row['stateprovince']."'></input></td><td><input class='input-mini' name ='country' type='text' value='".$row['country']."'></input></td><td><input type='text' name='postcode' class='input-small' value='".$row['postcode']."'></td><td><input type='checkbox' id='".$row['user_id']."' name='checkbox".$row['user_id']."' ></td><td><input type='hidden' class='input-small' name='id[]' value='".$row['user_id']."'></td></tr>";	 
		} 
		echo "<div class='container' id='styles' style='float: right'>";
		echo "<input type='submit'  style='float: right; padding: 10px;' name='delete' id='delete' class='btn btn-danger' disabled style='float: right' value='Delete'>";
		echo "<input type='submit'  name='update' class='btn btn-warning' style='float: right; padding: 10px;' value='Update'>";
		
		echo "<input type='checkbox' name='enable' id='enable' value='Enable Delete' style='float: right; padding: 10px;' >";
		echo "Enable Delete Button";
		echo "</div>";
        echo "</form>";  
		
		$anymatches=mysql_num_rows($result); 

		if ($anymatches == 0)  { 
			echo "<p class='alert'>Sorry, but we can not find an entry to match your query<p>"; 
		} 		
				
		mysql_close($link);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Revolutionary life - Living Stones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">

    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery-2.1.0.min.js"></script>
   
	<script>
	$(document).ready(function(){
		$('#enable').click(function() {
		if (!$(this).is(':checked')) {
	    $( "#delete" ).prop( "disabled", true );
		}else{
			$("#delete").prop( "disabled", false );
	    }
   	});
	});
	
	</script>
	

  </head>

  <body>
    <div class="container" id="c_registration">

  <form action="update.php" method="post" >
   
	
      <label for="firstname" class="col-md-1">
       <b> Search </b>
      </label>
      <div class="col-md-11">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Search Full Name">
      </div>
	   <input type="submit"  name ="search" class="btn btn-info" value="Search">
        
   

     </form>
  </div>
  </body>
</html>
