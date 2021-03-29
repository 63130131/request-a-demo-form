<!DOCTYPE html>

<html>
  <head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Contact Form</title>
    <meta charset="utf-8">
    <style>


      /* TYPOGRAPGY */
      *{font-family: Montserrat;font-size:15px;}
      a{color: #FD4F57; text-decoration: none;}
      a:hover{color:#e54b50;}
      h1{font-size: 5em;}
      h2{ font-size:2em; font-weight: 400; }
      h5{ font-size:14px; display: inline-block; color: #A0A0A0; font-weight: 400; }
      .highlight{text-decoration: underline;text-transform: capitalize; text-decoration-color: #ffda49; text-decoration-thickness: 3px;  font-weight: 800;font-size:1em;}

       

      /* MAIN CONTAINER */
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


      /* INPUT FIELDS */
      .form-part{
          display: flex;
          position: relative;
          flex-direction: column-reverse;
      }

      input[type="text"], input[type="number"]{
          width:100%;
          /*padding:1em 0;*/
          border-top: none;
          border-left: none;
          border-right: none;
          border-bottom: 1px solid #A0A0A0;
          background: none !important;
          /*transition: all 0.2s ease;*/
          padding: 14px 0 12px 0;
          font-size: 30px !important;
          
        }

       input[type="text"]:focus, input[type="number"]:focus{
          outline: 0;
          border-bottom: 2px solid #FD4F57 ;

        }

        /* LABELS */
        label{
          text-transform: uppercase;
          font-weight: 600;
          color:#A0A0A0;
        }

        /* label on focus */
       input:focus + label{
          font-size:10px;
          color: #FD4F57;
          transition: all 0.6s ease;
        } 
        /* label when input not empty  */
        .fokus{
          font-size:10px;
        }


        /* BUTTON */
        input[type="submit"]{
          border: 2px solid #fd4f57;
          color: #FD4F57;
          padding: 17px 22px;
          border-radius: 30px;
          background: none;
          font-size:16px;
          cursor:pointer;
          } 

        input[type="submit"]:hover{
          color: #fff;
          background: #fd4f57;
        } 

  
        /* ALERTS */
       .errorMsg{
          position:absolute;
          right:0;
          color:#FD4F57;
          font-size: 12px;
        }

       #formMsg{
        padding-left:7px;
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
        <!-- left titles -->
        <div class="title">
          <h1>Request <br> a Demo</h1>
          <h2>Fill this form to get in<br> front of an <span class="highlight">expert.</span></h2>
          <span><br>
            <label>Have a question?</label><br>
            <h5>Try giving us a call at <a href="tel:123-456-891"><strong>123-456-891</strong></a> or <a href="#"> <strong>Contact Support.</strong> </a></h5>
          </span>
        </div>
        <!-- right form -->
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
                      /*echo '<script>document.getElementById("formMsg").innerHTML="<h5>Thank you! You will hear from us shortly!</h5>";</script>';*/
                      echo '<script> $("#formMsg").html("<h5>Thank you! You will hear from us shortly!</h5>").fadeIn(500); $("#demoForm input").hide(); $("#demoForm .form-part").hide(); </script>';

                    }
                  }
                ?>
          </form>    
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
    </div>
  

</body>
</html>