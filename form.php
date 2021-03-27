
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

if(isset($GET['submitForm'])){
	echo 'Thank you!';
}

?>