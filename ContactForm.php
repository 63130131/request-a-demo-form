<!DOCTYPE html>

<html>
<head>
  <title>Contact Form</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="form.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <?php
  if(isset($_POST['submit'])){
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $phone = htmlspecialchars(stripslashes(trim($_POST['phone'])));
    $restaurant = htmlspecialchars(stripslashes(trim($_POST['restaurant'])));
    $zip = htmlspecialchars(stripslashes(trim($_POST['zip'])));
    $errors = false;

    if(empty($name)){
      $errName = "Please enter your name";
     
    } elseif(!preg_match("/^[A-Za-z .'-]+$/", $name)){
      $errName = "Can't contain any numbers.";
    }
    if(empty($email)){
       $errEmail = "Please enter your email.";
    } elseif(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
      $errEmail = "Invalid email.";
    }
    if(empty($phone)){
      $errPhone = "Please enter your phone.";
    } elseif(strlen($phone) < 8){
      $errPhone = "Must contain at least 8 numbers.";
    }
    if(empty($restaurant)){
       $errRestaurant = "Please enter restaurant name.";
    } elseif(!preg_match("/^[A-Za-z .'-]+$/", $restaurant)){
      $errRestaurant = "Invalid name. Can't contain any numbers.";
    }
    if(empty($zip)){
      $errZip = "Please enter your zip code.";
    } elseif(strlen((string)$zip) === 0){
      $errZip = "Code should be a number between 1000 and 9999.";
    }
  } 
  ?>

  <div class="form-box">
    
    <!-- left basis -->
    <div class="title">
      <h1>Request <br> a Demo</h1>
      <h2>Fill this form to get in<br> front of an <span class="highlight">expert.</span></h2>
      <span><br>
        <label>Have a question?</label><br>
        <h5>Try giving us a call at <a href="tel:123-456-891"><strong>123-456-891</strong></a> or <a href="#"> <strong>Contact Support.</strong> </a></h5>
      </span>
    </div>

    <!-- right basis -->
    <div class="form">
      <form id="demoForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="form-part">
          <input class="inputF" type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>"> 
          <label class="labelF" for="name" style="<?php echo isset($errName) ? "color:#FD4F57;" : "" ; ?>">Name</label>
          <span class="errorMsg"><?php echo isset($errName) ? $errName : ''; ?></span><br>
           <span class="border"></span>
        </div>    
        <div class="form-part">
          <input class="inputF" type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
          <label class="labelF" for="email" style="<?php echo isset($errEmail) ? "color:#FD4F57;" : "" ; ?>">Email</label>
          <span class="errorMsg"><?php echo isset($errEmail) ? $errEmail : ''; ?></span><br>
           <span class="border"></span>
        </div>
        <div class="form-part">
          <input class="inputF"type="text" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
          <label class="labelF" for="phone" style="<?php echo isset($errPhone) ? "color:#FD4F57;" : "" ; ?>"> Phone </label>
          <span class="errorMsg"><?php echo isset($errPhone) ? $errPhone : ''; ?></span><br>
           <span class="border"></span>
        </div>
        <div class="form-part">
          <input class="inputF" type="text" name="restaurant" value="<?php echo isset($restaurant) ? $restaurant : ''; ?>">
          <label class="labelF" for="restaurant" style="<?php echo isset($errRestaurant) ? "color:#FD4F57;" : "" ; ?>">Restaurant Name</label>
          <span class="errorMsg"><?php echo isset($errRestaurant) ? $errRestaurant : ''; ?></span><br>
           <span class="border"></span>
        </div>
        <div class="form-part">
          <input class="inputF" type="number" id="quantity" name="zip" min="1000" max="9999" value="<?php echo isset($zip) ? $zip : ''; ?>">
          <label class="labelF" for="zip" style="<?php echo isset($errZip) ? "color:#FD4F57;" : "" ; ?>"> Restaurant Zip code</label>
          <span class="errorMsg"><?php echo isset($errZip) ? $errZip : ''; ?></span><br>
          <span class="border"></span>
        </div>
        <br><br>
        <input id="submitBtn" class="style-1" type="submit" name="submit" value="Submit">
        <span id="formMsg"><h5>By tapping submit, you concede to our Legal Terms.</h5></span>
      </form>  
      <span id="successMsg" style="display:none;"><h3>Thank you! Your demo is on the way. </h3></span> 
    </div>
    
  </div>

   <?php 
        if(isset($_POST['submit']) && !isset($errName) && !isset($errEmail) && !isset($errPhone) && !isset($errRestaurant) && !isset($errZip)){
          $body = $name . ' made a request ' . ' from restaurant ' . $restaurant;
          if(mail('test@mail.com', $name, $body)){     
            echo '<script> 
            $("#demoForm").fadeOut(0);
            $("#successMsg").fadeIn();
            </script>';
          }
        }
  ?>

  <script>   

        $(document).ready(function() {
          $('.inputF').on('change', function() {
            var $this = $(this);
            var val = $.trim($(this).val());
            $this.parent().find('.labelF').toggleClass('fokus', val.length !== 0);
            /* extra JS field validations */
          }).change();
        });

  </script>

</body>
</html>