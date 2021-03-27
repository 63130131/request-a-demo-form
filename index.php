<!DOCTYPE html>
<html>
<head>
<title>How to put PHP in HTML - Simple Example</title>
<style>
	h1{font-size: 3em;}
	h2{font-size:2em;}
	body{
		background: coral;
	}
	.form-box{
		display:flex; 
		justify-content: center;
    	margin: auto;
    	align-items: center;
    	height: 50vw;
    	background: lightblue;
	}


	
</style>
</head>
<body>

<?php

$name = $email = $phone = $restaurantName = $zipCode = "";
$errLog = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty($POST[$name])){
  		$errLog .= "You forgot your name.";
	} else {
		$name = $POST["name"];
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
					  <span class="error">* <?php echo $errLog;?></span>
					  <br><br>

					  E-mail:<br><input type="text" name="email" value="<?php echo $email;?>">
					  <span class="error">* <?php echo $emailErr;?></span>
					  <br><br>

					  Phone:<br><input type="text" name="phone" value="<?php echo $phone;?>">
					  <span class="error"><?php echo $websiteErr;?></span>
					  <br><br>

					  Restaurant Name:<br><input type="text" name="restaurantName" value="<?php echo $restaurantName;?>">
					  <span class="error">* <?php echo $errLog;?></span>
					  <br><br>
					  Restaurant Zip Code<br><input type="number" id="quantity" name="quantity" min="1000" max="9000">
					  <span class="error">* <?php echo $errLog;?></span>
					  <br><br>
					  <input type="submit" name="submitForm" value="Submit">  
				</form>
			</div>
		</div>




</body>
</html>