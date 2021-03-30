<!DOCTYPE html>
<?php error_reporting(0); ?>
<?php
/*if(isset($_POST['submit'])) {
    header('location: index.php');
    

}*/
?>
<html>
<head>
	<title>Request a demo Form </title>
	<meta charset="utf-8">

	<style>
		h1{font-size: 3em;}
		h2{font-size:2em;}
		body{
			font-family: Montserrat;
			background: lightgrey;
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

	    input{
	    	width:200px;
	    	padding:1em 0;
	    	border: none !important;
	    	background: none !important;
	    	
	    }
	     input:focus{
	    	border-bottom: 2px solid red !important;

	    }	</style>
</head>
<body>

<?php

$name = $email = $phone = $restaurantName = $zipCode = "";

/*$errName = $errEmail = $errPhone = $errRestaurant = $errZip = "";*/
//** $_SERVER["REQUEST_METHOD"] === "POST" **/

if(isset($_POST['submit'])){

	if(empty($_POST[$name])){
  		$errName = "You forgot your name.";
	} else {
		$name = $_POST["name"];
	}

	if(empty($_POST[$email])){
  		$errEmail = "You forgot your e-mail.";
	} else {
		$email = $_POST["email"];
	}

	if(empty($_POST[$phone])){
  		$errPhone = "You forgot your phone.";
	} else {
		$phone = $_POST["phone"];
	}

	if(empty($_POST[$restaurantName])){
  		$errRestaurant = "You forgot your phone.";
	} else {
		$restaurantName = $POST["restaurantName"];
	}

	if(empty($_POST[$zipCode])){
  		$errZip = "Enter restaurant Zip code";
	} else {
		$zipCode = $_POST["zipCode"];
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
				<form id="demoForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >  
						  <div class="field">Name:<br><input id="nameF" type="text" name="name" value="<?php echo $name;?>">
						  <span class="error-msg">* <?php if(isset($errName)) echo $errName;?></span></div>

						  <br><br>
						  <div class="field">E-mail:<br><input id="emailF" type="text" name="email" value="<?php echo $email;?>">
						  <span class="error-msg">* <?php echo $errEmail;?></span></div>
						  <br><br>

						  <div class="field">Phone:<br><input id="phoneF" type="text" name="phone" value="<?php echo $phone;?>">
						  <span class="error-msg">* <?php echo $errPhone;?></span></div>
						  <br><br>

						  <div class="field">Restaurant Name:<br><input id="restaurantF" type="text" name="restaurantName" value="<?php echo $restaurantName;?>">
						  <span class="error-msg">* <?php echo $errRestaurant;?></span></div>
						  <br><br>
						  <div class="field">Restaurant Zip Code<br><input  id="zipF" type="number" id="quantity" name="zipCode" min="1000" max="9000">
						  <span class="error-msg">* <?php echo $errZip;?></span></div>
						  <br><br>
						  <input type="submit" name="submit" value="Submit">  

						  	<?php 
								
								if(isset($_POST['submit']) && !isset($errName) && !isset($errEmail) && !isset($errPhone) && !isset($errRestaurant) && !isset($errZip) ){
									/*echo "<style>#demoForm{display: none;</style>";*/ 
									echo "prodje";
								} else{
									 echo '<p>Error occurred, please try again later</p>';
								}
								
								?>

				</form>
			</div>
		</div>
	</body>
</html>