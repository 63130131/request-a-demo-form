<!DOCTYPE html>
<html>
<head>
<title>Request a demo Form </title>
<style>
	h1{font-size: 3em;}
	h2{font-size:2em;}
	body{
		font-family: Montserrat;
	}
	.form-box{
		display:flex; 
		flex-wrap: wrap;
		justify-content: center;
    	margin: auto;
    	align-items: center;
    	height: 50vw;
	}
	.form-box > div{
		padding:3em;
	}

    input[type="text"]{
    	width:200px;
    	padding:1em 0;
    	border: none !important;

    }

	
</style>
</head>
<body>

<?php

$name = $email = $phone = $restaurantName = $zipCode = "";
$errName = $errEmail = $errPhone = $errRestaurant = $errZip = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty($POST[$name])){
  		$errName = "You forgot your name.";
	} else {
		$name = $POST["name"];
	}

	if(empty($POST[$email])){
  		$errEmail = "You forgot your e-mail.";
	} else {
		$email = $POST["email"];
	}

	if(empty($POST[$phone])){
  		$errPhone = "You forgot your phone.";
	} else {
		$phone = $POST["phone"];
	}

	if(empty($POST[$restaurantName])){
  		$errRestaurant = "You forgot your phone.";
	} else {
		$restaurantName = $POST["restaurantName"];
	}

	if(empty($POST[$zipCode])){
  		$errZip = "Enter restaurant Zip code";
	} else {
		$zipCode = $POST["zipCode"];
	}

}	

?>
		<div class="form-box">

			<!-- title -->
			<div class="title">
				<h1>Request a Demo</h1>
				<h3>Fill this form to get in front of an Expert.</h3>
				<span>
					<a href="#">HAVE A QUESTION?</a>
					<p>Try giving us a call at <a href="tel:123-456-891">123-456-891</a> or <a href="#"> Contact Support </a></p>
				</span>

			</div>

			<!-- form -->
			<div class="form">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
					  Name:<br><input type="text" name="name" value="<?php echo $name;?>">
					  <span class="error-msg">* <?php echo $errName;?></span>
					  <br><br>

					  E-mail:<br><input type="text" name="email" value="<?php echo $email;?>">
					  <span class="error-msg">* <?php echo $errEmail;?></span>
					  <br><br>

					  Phone:<br><input type="text" name="phone" value="<?php echo $phone;?>">
					  <span class="error-msg">* <?php echo $errPhone;?></span>
					  <br><br>

					  Restaurant Name:<br><input type="text" name="restaurantName" value="<?php echo $restaurantName;?>">
					  <span class="error-msg">* <?php echo $errRestaurant;?></span>
					  <br><br>
					  Restaurant Zip Code<br><input type="number" id="quantity" name="zipCode" min="1000" max="9000">
					  <span class="error-msg">* <?php echo $errZip;?></span>
					  <br><br>
					  <input type="submit" name="submitForm" value="Submit">  
				</form>
			</div>
		</div>




</body>
</html>