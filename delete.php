<?php 

include_once('dbconnect.php');
if(isset($_POST['delete'])){
    
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
			echo "hi";
					$sql = "DELETE FROM registration_table WHERE user_id = '$id' ";
		
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

if(isset($_POST['search'])){

		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];


	
		$searchfields = array($first_name, $last_name);
    
		if(!array_filter($searchfields)) {
			echo '<p class="text-warning">Please enter a value into at least one of the fields regarding the request you are searching for.</p>';
		}else{

		$sql = "SELECT * FROM registration_table WHERE firstname like '%".$first_name."%' AND  lastname like '%".$last_name."%'  ";

		$result = mysql_query($sql, $link);
	
	
		if (!$result) {
			die('Error: ' . mysql_error());
		}
		echo "<form id='delete.php' method='post'>";
		echo "<table class='table table-hover table-striped'><tr><th>Firstname</th><th>Lastname</th><th>address1</th><th>address2</th><th>towncity</th><th>postcode</th><th>Update</th></tr>";
			
		while($row = mysql_fetch_array($result)){
			echo "<tr><td><input type='text' class='input-small' value='".$row['firstname']."'></td><td><input type='text' class='input-small' value='".$row['lastname']."'></input></td><td><input class='input-small' type='text' value='".$row['address1']."'></input></td><td><input class='input-mini' type='text' maxlength='3' value='".$row['address2']."'></input></td><td><input class='input-large' type='text' value='".$row['towncity']."'></input></td><td><input type='text' class='input-small' value='".$row['postcode']."'></td><td><input type='checkbox' id='".$row['user_id']."' name='checkbox".$row['user_id']."' ></td><td><input type='hidden' class='input-small' name='id[]' value='".$row['user_id']."'></td></tr>";	 
		} 
        echo "<input type='submit'  name='delete' class='btn btn-warning' style='float: right' value='Delete'>";
		echo "</form>";
		$anymatches=mysql_num_rows($result); 

		if ($anymatches == 0)  { 
			echo "Sorry, but we can not find an entry to match your query<br><br>"; 
		} 		
				
		mysql_close($link);
	}
	//$sql="UPDATE registration_table SET Age=36 WHERE firstname='$first_name' AND lastname='$last_name' AND emailaddress='$emailaddress'";

	// if (!mysql_query($sql, $link)) {
		// die('Error: ' . mysql_error());
	// }
	// echo '<script>alert("Succesfully updated")</script>';
	// mysql_close($link);
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
	
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<script>
		$(document).ready(function(){
		$("#update").click(function(){
	
			<!-- update(); -->
		});
	});
	
	</script>
	

  </head>

  <body>
    <div class="container" id="c_registration">
		<label for="firstname" class="col-md-2">
      <b>  SEARCH BY </b>
      </label>
  <form action="delete.php" method="post" >
    <div class="form-group">
      <label for="firstname" class="col-md-2">
       <b> First Name: </b>
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
      </div>
 
 
    </div>
	
 	<label for="or" class="col-md-2">
       <b> Or </b>
      </label>
    <div class="form-group">
      <label for="lastname" class="col-md-2">
       <b> Last Name: </b>
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Enter Last Name">
      </div>
 
 
    </div>
  
        <input type="submit"  name ="search" class="btn btn-info" value="Search">
  
  </form>
  </div>
   </div>
 
    </div> 
  
  </body>
</html>
