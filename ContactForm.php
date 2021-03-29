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

    if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
      $errName = 'Invalid name.';
    } 
    if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
      $errEmail = 'Invalid email';
    }
    if(strlen($phone) < 8){
      $errPhone = 'Invalid phone.';
    }

    if(!preg_match("/^[A-Za-z .'-]+$/", $restaurant)){
      $errRestaurant = 'Invalid characters.';
    }

    if(strlen((string)$zip) === 0){
      $errZip = 'Zip code should be between 1000 and 9999.';
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
          <input class="inputF" type="text" name="name"> 
          <label class="labelF" for="name">Name</label>
          <span class="errorMsg"><?php if(isset($errName)) echo $errName; ?></span><br>
        </div>    
        <div class="form-part">
          <input class="inputF" type="text" name="email">
          <label class="labelF" for="email" style="<?php /*if(isset($email)) echo "font-size:30px;";*/ ?>">Email</label>
          <span class="errorMsg"><?php if(isset($errEmail)) echo $errEmail; ?></span><br>
        </div>
        <div class="form-part">
          <input class="inputF"type="text" name="phone" >
          <label class="labelF" for="phone"> Phone </label>
          <span class="errorMsg"><?php if(isset($errPhone)) echo $errPhone; ?></span><br>
        </div>
        <div class="form-part">
          <input class="inputF" type="text" name="restaurant">
          <label class="labelF" for="restaurant">Restaurant Name</label>
          <span class="errorMsg"><?php if(isset($errRestaurant)) echo $errRestaurant; ?></span><br>
        </div>
        <div class="form-part">
          <input class="inputF" type="number" id="quantity" name="zip" min="1000" max="9999">
          <label class="labelF" for="zip"> Restaurant Zip code</label>
          <span class="errorMsg"><?php if(isset($errZip)) echo $errZip; ?></span><br>
        </div>
        <br><br>
        <input class="style-1" type="submit" name="submit" value="Submit">
        <span id="formMsg"><h5>By tapping submit, you concede to our Legal Terms.</h5></span>

        <?php 
        if(isset($_POST['submit']) && !isset($errName) && !isset($errEmail) && !isset($errPhone) && !isset($errRestaurant) && !isset($errZip)){
          $body = $name . ' made a request ' . ' from restaurant ' . $restaurant;

          if(mail('test@mail.com', $name, $body)){
            /* hide form echo $("#demoForm input").hide(); $("#demoForm .form-part").hide(); ;*/
            echo '<script> $("#formMsg").html("<h5>Thank you! You will hear from us shortly!</h5>").fadeIn(500); </script>';

          }
        }
        ?>
      </form>    
    </div>
  </div>
  <script>   
       /* $('#test').keyup(function()  {
          alert('Text1 changed!');
        }); */
        $(document).ready(function() {
          $('.inputF').on('change', function() {
            var $this = $(this);
            var val = $.trim($(this).val());
            /* when typing toggle class fokus */
            $this.parent().find('.labelF').toggleClass('fokus', val.length !== 0);
          }).change();
        });
      </script>


</body>
</html>