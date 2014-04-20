<?php 

include_once('dbconnect.php');
	$errors         = array();  	
	$data 			= array(); 		

		
	if(isset($_POST['submit'])){

	  $address1 = $_POST['address1'];
		if(empty($_POST['title'])){
		   $errors['title'] = 'Title is required.';
		}
		
		if($_POST['title'] == 'Select'){
		   $errors['title'] = 'You must select a title';
		}
		if(empty($_POST['firstname'])){
		   $errors['firstname'] = 'firstname is required.';
		}

		if(empty($_POST['address1'])) { 
			$errors['address1'] = 'address1 is required.';
		}
		if(empty($_POST['address2'])) { 
			$errors['address2'] = 'address2 is required.';
		}
		
		if(empty($_POST['towncity'])) { 
			$errors['towncity'] = 'Town/City is required.';
		}
		
		if(empty($_POST['stateprovince'])) { 
			$errors['stateprovince'] = 'State/Province is required.';
		}
		
		if(empty($_POST['postcode'])) { 
			$errors['postcode'] = 'Postcode is required.';
		}
		
		if(empty($_POST['country'])) { 
			$errors['country'] = 'Country is required.';
		}
		if($_POST['country'] == 'Select Country') { 
			$errors['country'] = 'Country is required.';
		}

		
		if ( ! empty($errors)) {

		
	
	
			$data['success'] = false;
			$data['errors']  = $errors;
			foreach($data['errors'] as $error){
			   echo "<p class='alert'>".$error."</p>";
			}
		}else {
		
		$timestamp = date('Y-m-d H:i:s', time());  

		$sql="INSERT INTO registration_table (title, firstname, address1, address2, towncity, stateprovince, postcode, country, timestamp)
				VALUES
			( '".mysql_real_escape_string($_POST['title'])."','".mysql_real_escape_string($_POST['firstname'])."', '".mysql_real_escape_string($address1)."', '".mysql_real_escape_string($_POST['address2'])."' , '".mysql_real_escape_string($_POST['towncity'])."', '".mysql_real_escape_string($_POST['stateprovince'])."' , '".mysql_real_escape_string($_POST['postcode'])."', '".mysql_real_escape_string($_POST['country'])."' , '$timestamp' )";

			if (!mysql_query($sql, $link)) {
				die("ERROR" . mysql_error());
				exit;
			}
			mysql_close($link);
		
			$data['success'] = true;
			$data['message'] = 'Success! You have successfully registered this address';
				   echo "<p class='alert'>".$data['message']."</p>";
				   $_POST['firstname'] = "";
				   $_POST['address1'] = "";
				   $_POST['address2'] = "";
				   $_POST['towncity'] = "";
				   $_POST['stateprovince'] = "";
				   $_POST['postcode'] = "";
				   $_POST['country'] = "";
				   
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

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">



  </head>

  <body>
    <div class="container" id="c_registration"  style="float: left; padding: 20px;">
  <form id="addressform" action="create.php" method="post">
  <table>
  <tr>
  <td>
   
      <label for="firstname" class="small">
      <b> Title: </b>
      </label>
 
		<select class="form-control" name="title"><option>Select</option><option>Evg.</option><option>Bro.</option><option>Sis.</option><option>Mr.</option><option>Mrs.</option><option>Miss.</option><option>Dr.</option><option>Prof.</option><option>Rev.</option><option>Pr.</option><option>Fr.</option></select>

 </td>
 </tr>
 <tr>
 <td>
      <label for="firstname" class="col-md-2">
      <b> Full Name: </b>
      </label>

        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" >
   
 </td>
 </tr>
	<tr>
	<td>
	<div class="form-group">
      <label for="address1" class="col-md-2">
       <b> Address1: </b>
      </label>
      <div class="col-md-4">
        <textarea class="form-control" id="address1" name="address1" value="<?php echo isset($_POST['address1']) ? $_POST['address1'] : '' ?>"></textarea>
      </div>
    </div>
	</td>
	<td>
	<div class="form-group">
      <label for="address2" class="col-md-2">
       <b> Address2: </b>
      </label>
      <div class="col-md-4">
        <textarea class="form-control" id="address2" name="address2" value="<?php echo isset($_POST['address2']) ? $_POST['address2'] : '' ?>" ></textarea>
      </div>
    </div>
	</td>
	</tr>
	<tr>
	<td>
	<div class="form-group">
      <label for=towncity" class="col-md-2">
     <b>   Town/City: </b>
      </label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="towncity" name="towncity" value="<?php echo isset($_POST['towncity']) ? $_POST['towncity'] : '' ?>">
      </div>
    </div>
	</td>
	<td>
    <div class="form-group">
      <label for=towncity" class="col-md-2">
      <b>  State/Province: </b>
      </label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="stateprovince" name="stateprovince" value="<?php echo isset($_POST['stateprovince']) ? $_POST['stateprovince'] : '' ?>" >
      </div>
    </div>
	</td>
	</tr>
	
	<tr>
	<td>
	  <div class="form-group">
      <label for=postcode" class="col-md-2">
      <b>  POST/PINCODE: </b>
      </label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo isset($_POST['postcode']) ? $_POST['postcode'] : '' ?>" >
      </div>
    </div>
   </td>
   <td>
    <div class="form-group">
      <label for=country" class="col-md-2">
       <b> Country: </b>
      </label>
      <div class="col-md-4">
   <select name="country"> 
<option value="" selected="selected">Select Country</option> 
<option value="United States">United States</option> 
<option value="United Kingdom">United Kingdom</option> 
<option value="Afghanistan">Afghanistan</option> 
<option value="Albania">Albania</option> 
<option value="Algeria">Algeria</option> 
<option value="American Samoa">American Samoa</option> 
<option value="Andorra">Andorra</option> 
<option value="Angola">Angola</option> 
<option value="Anguilla">Anguilla</option> 
<option value="Antarctica">Antarctica</option> 
<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
<option value="Argentina">Argentina</option> 
<option value="Armenia">Armenia</option> 
<option value="Aruba">Aruba</option> 
<option value="Australia">Australia</option> 
<option value="Austria">Austria</option> 
<option value="Azerbaijan">Azerbaijan</option> 
<option value="Bahamas">Bahamas</option> 
<option value="Bahrain">Bahrain</option> 
<option value="Bangladesh">Bangladesh</option> 
<option value="Barbados">Barbados</option> 
<option value="Belarus">Belarus</option> 
<option value="Belgium">Belgium</option> 
<option value="Belize">Belize</option> 
<option value="Benin">Benin</option> 
<option value="Bermuda">Bermuda</option> 
<option value="Bhutan">Bhutan</option> 
<option value="Bolivia">Bolivia</option> 
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
<option value="Botswana">Botswana</option> 
<option value="Bouvet Island">Bouvet Island</option> 
<option value="Brazil">Brazil</option> 
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
<option value="Brunei Darussalam">Brunei Darussalam</option> 
<option value="Bulgaria">Bulgaria</option> 
<option value="Burkina Faso">Burkina Faso</option> 
<option value="Burundi">Burundi</option> 
<option value="Cambodia">Cambodia</option> 
<option value="Cameroon">Cameroon</option> 
<option value="Canada">Canada</option> 
<option value="Cape Verde">Cape Verde</option> 
<option value="Cayman Islands">Cayman Islands</option> 
<option value="Central African Republic">Central African Republic</option> 
<option value="Chad">Chad</option> 
<option value="Chile">Chile</option> 
<option value="China">China</option> 
<option value="Christmas Island">Christmas Island</option> 
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
<option value="Colombia">Colombia</option> 
<option value="Comoros">Comoros</option> 
<option value="Congo">Congo</option> 
<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
<option value="Cook Islands">Cook Islands</option> 
<option value="Costa Rica">Costa Rica</option> 
<option value="Cote D'ivoire">Cote D'ivoire</option> 
<option value="Croatia">Croatia</option> 
<option value="Cuba">Cuba</option> 
<option value="Cyprus">Cyprus</option> 
<option value="Czech Republic">Czech Republic</option> 
<option value="Denmark">Denmark</option> 
<option value="Djibouti">Djibouti</option> 
<option value="Dominica">Dominica</option> 
<option value="Dominican Republic">Dominican Republic</option> 
<option value="Ecuador">Ecuador</option> 
<option value="Egypt">Egypt</option> 
<option value="El Salvador">El Salvador</option> 
<option value="Equatorial Guinea">Equatorial Guinea</option> 
<option value="Eritrea">Eritrea</option> 
<option value="Estonia">Estonia</option> 
<option value="Ethiopia">Ethiopia</option> 
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
<option value="Faroe Islands">Faroe Islands</option> 
<option value="Fiji">Fiji</option> 
<option value="Finland">Finland</option> 
<option value="France">France</option> 
<option value="French Guiana">French Guiana</option> 
<option value="French Polynesia">French Polynesia</option> 
<option value="French Southern Territories">French Southern Territories</option> 
<option value="Gabon">Gabon</option> 
<option value="Gambia">Gambia</option> 
<option value="Georgia">Georgia</option> 
<option value="Germany">Germany</option> 
<option value="Ghana">Ghana</option> 
<option value="Gibraltar">Gibraltar</option> 
<option value="Greece">Greece</option> 
<option value="Greenland">Greenland</option> 
<option value="Grenada">Grenada</option> 
<option value="Guadeloupe">Guadeloupe</option> 
<option value="Guam">Guam</option> 
<option value="Guatemala">Guatemala</option> 
<option value="Guinea">Guinea</option> 
<option value="Guinea-bissau">Guinea-bissau</option> 
<option value="Guyana">Guyana</option> 
<option value="Haiti">Haiti</option> 
<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
<option value="Honduras">Honduras</option> 
<option value="Hong Kong">Hong Kong</option> 
<option value="Hungary">Hungary</option> 
<option value="Iceland">Iceland</option> 
<option value="India">India</option> 
<option value="Indonesia">Indonesia</option> 
<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
<option value="Iraq">Iraq</option> 
<option value="Ireland">Ireland</option> 
<option value="Israel">Israel</option> 
<option value="Italy">Italy</option> 
<option value="Jamaica">Jamaica</option> 
<option value="Japan">Japan</option> 
<option value="Jordan">Jordan</option> 
<option value="Kazakhstan">Kazakhstan</option> 
<option value="Kenya">Kenya</option> 
<option value="Kiribati">Kiribati</option> 
<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
<option value="Korea, Republic of">Korea, Republic of</option> 
<option value="Kuwait">Kuwait</option> 
<option value="Kyrgyzstan">Kyrgyzstan</option> 
<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
<option value="Latvia">Latvia</option> 
<option value="Lebanon">Lebanon</option> 
<option value="Lesotho">Lesotho</option> 
<option value="Liberia">Liberia</option> 
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
<option value="Liechtenstein">Liechtenstein</option> 
<option value="Lithuania">Lithuania</option> 
<option value="Luxembourg">Luxembourg</option> 
<option value="Macao">Macao</option> 
<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
<option value="Madagascar">Madagascar</option> 
<option value="Malawi">Malawi</option> 
<option value="Malaysia">Malaysia</option> 
<option value="Maldives">Maldives</option> 
<option value="Mali">Mali</option> 
<option value="Malta">Malta</option> 
<option value="Marshall Islands">Marshall Islands</option> 
<option value="Martinique">Martinique</option> 
<option value="Mauritania">Mauritania</option> 
<option value="Mauritius">Mauritius</option> 
<option value="Mayotte">Mayotte</option> 
<option value="Mexico">Mexico</option> 
<option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
<option value="Moldova, Republic of">Moldova, Republic of</option> 
<option value="Monaco">Monaco</option> 
<option value="Mongolia">Mongolia</option> 
<option value="Montserrat">Montserrat</option> 
<option value="Morocco">Morocco</option> 
<option value="Mozambique">Mozambique</option> 
<option value="Myanmar">Myanmar</option> 
<option value="Namibia">Namibia</option> 
<option value="Nauru">Nauru</option> 
<option value="Nepal">Nepal</option> 
<option value="Netherlands">Netherlands</option> 
<option value="Netherlands Antilles">Netherlands Antilles</option> 
<option value="New Caledonia">New Caledonia</option> 
<option value="New Zealand">New Zealand</option> 
<option value="Nicaragua">Nicaragua</option> 
<option value="Niger">Niger</option> 
<option value="Nigeria">Nigeria</option> 
<option value="Niue">Niue</option> 
<option value="Norfolk Island">Norfolk Island</option> 
<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
<option value="Norway">Norway</option> 
<option value="Oman">Oman</option> 
<option value="Pakistan">Pakistan</option> 
<option value="Palau">Palau</option> 
<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
<option value="Panama">Panama</option> 
<option value="Papua New Guinea">Papua New Guinea</option> 
<option value="Paraguay">Paraguay</option> 
<option value="Peru">Peru</option> 
<option value="Philippines">Philippines</option> 
<option value="Pitcairn">Pitcairn</option> 
<option value="Poland">Poland</option> 
<option value="Portugal">Portugal</option> 
<option value="Puerto Rico">Puerto Rico</option> 
<option value="Qatar">Qatar</option> 
<option value="Reunion">Reunion</option> 
<option value="Romania">Romania</option> 
<option value="Russian Federation">Russian Federation</option> 
<option value="Rwanda">Rwanda</option> 
<option value="Saint Helena">Saint Helena</option> 
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
<option value="Saint Lucia">Saint Lucia</option> 
<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
<option value="Samoa">Samoa</option> 
<option value="San Marino">San Marino</option> 
<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
<option value="Saudi Arabia">Saudi Arabia</option> 
<option value="Senegal">Senegal</option> 
<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
<option value="Seychelles">Seychelles</option> 
<option value="Sierra Leone">Sierra Leone</option> 
<option value="Singapore">Singapore</option> 
<option value="Slovakia">Slovakia</option> 
<option value="Slovenia">Slovenia</option> 
<option value="Solomon Islands">Solomon Islands</option> 
<option value="Somalia">Somalia</option> 
<option value="South Africa">South Africa</option> 
<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
<option value="Spain">Spain</option> 
<option value="Sri Lanka">Sri Lanka</option> 
<option value="Sudan">Sudan</option> 
<option value="Suriname">Suriname</option> 
<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
<option value="Swaziland">Swaziland</option> 
<option value="Sweden">Sweden</option> 
<option value="Switzerland">Switzerland</option> 
<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
<option value="Tajikistan">Tajikistan</option> 
<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
<option value="Thailand">Thailand</option> 
<option value="Timor-leste">Timor-leste</option> 
<option value="Togo">Togo</option> 
<option value="Tokelau">Tokelau</option> 
<option value="Tonga">Tonga</option> 
<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
<option value="Tunisia">Tunisia</option> 
<option value="Turkey">Turkey</option> 
<option value="Turkmenistan">Turkmenistan</option> 
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
<option value="Tuvalu">Tuvalu</option> 
<option value="Uganda">Uganda</option> 
<option value="Ukraine">Ukraine</option> 
<option value="United Arab Emirates">United Arab Emirates</option> 
<option value="United Kingdom">United Kingdom</option> 
<option value="United States">United States</option> 
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
<option value="Uruguay">Uruguay</option> 
<option value="Uzbekistan">Uzbekistan</option> 
<option value="Vanuatu">Vanuatu</option> 
<option value="Venezuela">Venezuela</option> 
<option value="Viet Nam">Vietnam</option> 
<option value="Virgin Islands, British">Virgin Islands, British</option> 
<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
<option value="Wallis and Futuna">Wallis and Futuna</option> 
<option value="Western Sahara">Western Sahara</option> 
<option value="Yemen">Yemen</option> 
<option value="Zambia">Zambia</option> 
<option value="Zimbabwe">Zimbabwe</option>
</select>
      </div>
    </div>
 </td>
 </tr>
 <tr><td>
        <input type="submit" style="float: left;" name ="submit" class="btn btn-warning" value="Register"><span class="fa fa-arrow-right"></span>
    </td>
	</tr>
	</table>
      </div>
    </div>
  </form>
  </div>
   </div>
 
    </div> 
  </body>
</html>