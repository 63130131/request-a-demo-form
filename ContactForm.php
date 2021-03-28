<!DOCTYPE html>

<html>
  <head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Contact Form</title>
    <meta charset="utf-8">
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

      .form-part{
          display: flex;
          position: relative;
          flex-direction: column-reverse;
      }

      label{
        font-size:16px;
        text-transform: uppercase;
      }

        input[type="text"], input[type="number"]{
          width:100%;
          padding:1em 0;
          border-top: none;
          border-left: none;
          border-right: none;
          border-bottom: 1px solid grey !important;
          background: none !important;
          transition: all 0.2s ease;
          
        }
         input:focus{
          outline: 0;
          border-bottom: 2px solid red !important;

        }

        input:focus + .fieldLabel{
          font-size:12px !important;
         
        }

        .errorMsg{
          position:absolute;
          right:0;
          color:red;
          font-size: 12px;
        }
    </style>
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
            $errName = 'Invalid characters in name';
          }
          if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
            $errEmail = 'Invalid email';
          }
          if(!preg_match('/^[a-zA-Z0-9]{9,30}$/',$phone)){
            $errPhone = 'Invalid phone';
          }
         
          if(!preg_match("/^[A-Za-z .'-]+$/", $restaurant)){
            $errRestaurant = 'Invalid characters';
          }
         
          if(strlen((string)$zip) === 0){
            $errZip = 'Zip code should be between 1000 and 9999';
          }
        }
    ?>


  <div class="form-box">
        <!-- left titles -->
        <div class="title">
          <h1>Request a Demo</h1>
          <h3>Fill this form to get in front of an Expert.</h3>
          <span>
            <a href="#">HAVE A QUESTION?</a>
            <p>Try giving us a call at <a href="tel:123-456-891">123-456-891</a> or <a href="#"> Contact Support </a></p>
          </span>
        </div>
        <!-- right form -->
        <div class="form">
          <form id="demoForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-part">
                    <input type="text" name="name"> 
                    <label class="fieldLabel" for="name">Name</label>
                    <span class="errorMsg"><?php if(isset($errName)) echo $errName; ?></span><br>
                </div>
                <div class="form-part">
                    <input type="text" name="email">
                    <label  class="fieldLabel" for="email">Email</label>
                    <span class="errorMsg"><?php if(isset($errEmail)) echo $errEmail; ?></span><br>
                </div>
                <div class="form-part">
                    <input type="number" id="quantity" name="phone" >
                    <label class="fieldLabel" for="phone"> Phone </label>
                    <span class="errorMsg"><?php if(isset($errPhone)) echo $errPhone; ?></span><br>
                </div>
                <div class="form-part">
                    <input type="text" name="restaurant">
                    <label class="fieldLabel" for="restaurant">Restaurant Name</label>
                    <span class="errorMsg"><?php if(isset($errRestaurant)) echo $errRestaurant; ?></span><br>
                </div>
                <div class="form-part">
                    <input type="number" id="quantity" name="zip" min="1000" max="9000">
                    <label class="fieldLabel" for="zip"> Restaurant Zip code</label>
                    <span class="errorMsg"><?php if(isset($errZip)) echo $errZip; ?></span><br>
                </div>
                <br><br>

                <input type="submit" name="submit" value="Submit">
                <span id="legalTerms" class="terms">By tapping submit, you concede to our Legal Terms.</span>
                <?php 
                  if(isset($_POST['submit']) && !isset($errName) && !isset($errEmail) && !isset($errPhone) && !isset($errRestaurant) && !isset($errZip)){
                    if(mail('mihalamp@gmail.com', $name, $body)){
                      echo '<script>document.getElementById("legalTerms").innerHTML = "We will hear from us shortly!";</script>';
                    }

                  }
                ?>
          </form>    
        </div>
    </div>
  

</body>
</html>