
<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <title>ADDRESS BOOK - VOICE OF ACTION</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">
    <script src="js/jquery-2.1.0.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">


	<script>
	$(document).ready(function(){
		$("body").append(function(){
			$("#createid").empty();
			append_create();
		});
	});
	
		
	$(document).ready(function(){
		$("#create").click(function(){
		$("#createid").empty();
		append_create();
		});
	});
	
		
		
	$(document).ready(function(){
		$("#view").click(function(){
		$("#createid").empty();
		view();
		});
	});
	
	$(document).ready(function(){
		$("#groupbypostcode").click(function(){
		$("#createid").empty();
		groupbypostcode();
		});
	});
	
	$(document).ready(function(){
		$("#printpdf").click(function(){
		$("#createid").empty();
		printpdf();
		});
	});
	
	
	$(document).ready(function(){
		$("#delete").click(function(){
		$("#createid").empty();
		deletes();
		});
	});
	
	$(document).ready(function(){
		$("#update").click(function(){
		$("#createid").empty();
		update();
		});
	});
	

	

	
	

	
	function append_create(){
	 var firstname_label =  "<iframe src='http://localhost/voiceofaction/create.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(firstname_label);
     }
	 
	 function view(){
	 var view_label =  "<iframe src='http://localhost/voiceofaction/view.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }

	 function groupbypostcode(){
	 var view_label =  "<iframe src='http://localhost/voiceofaction/groupbypostcode.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 
	 function printpdf(){
	 var view_label =  "<iframe src='http://localhost/voiceofaction/printpdf.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 
	 function deletes(){
	 var view_label =  "<iframe src='http://localhost/voiceofaction/delete.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 
	 function update(){
	 var view_label =  "<iframe src='http://localhost/voiceofaction/update.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }



	


</script>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse" role="navigation">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       
          </button>
          <a class="navbar-brand" href="#">ADDRESS BOOK - VOICE OF ACTION</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
		
          </form>
        </div>
   
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 sidebar">
		<div class="well">
		 <ul class="nav nav-list">
			<li class="nav-header">Manage Address</li> 
            <li class="active"><a class="active" id="create">Register Address</a></li>
            <li><a id="view">View Addresses</a></li>
			<li><a id="printpdf">Download Address Document</a></li>
			<li><a id="update">Update/Delete a address</a></li>
		</ul>
    <!--        <li><a id="manageteam">Send SMS</a></li> -->
     
		  </div>
		  
		  
        </div>
		
        <div class="col" id="createid">

        </div>
          

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
