<?php
if(isset($_POST['SEND'])){
$test = isset($_POST['bar']);
echo $test;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>Ann the Pharmacist - Search Engine</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript">
  
  
  $("#foo").submit(function(event){

	var $form = $(this);
	
    // let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
	var serializedData = $form.serialize();
	alert(searializedData);
	$inputs.prop("disabled", true);
	
	 $.ajax({
        url: "/searchengine.php",
        type: "post",
        data: serializedData
    });
	  .done(function (response, textStatus, jqXHR){
        // log a message to the console
		alert(response);
        console.log("Hooray, it worked!");
    });
// callback handler that will be called on failure
        .fail(function (jqXHR, textStatus, errorThrown){
        // log the error to the console
        console.error(
            "The following error occured: "+
            textStatus, errorThrown
        );
    });

    // callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // reenable the inputs
        $inputs.prop("disabled", false);
    });

    // prevent default posting of form
    event.preventDefault();
});
   /* (function() {
    var cx = '004576107937898604235:aihzlcjsdam';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();   */
  

</script>
  </head>
  <body>
<!-- 
  <div>
  <gcse:search></gcse:search>
 </div>
 <div>
  <gcse:searchresults>
</div> -->

 <form id="foo" action="" method="POST" >

    <label for="bar">Search</label>
    <input id="bar" name="bar" type="text" value="" />

    <input type="submit" name="SEND" value="Send" />

</form>

  
  
</body>
</html>