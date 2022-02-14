<?php
   include("connection.php");
   session_start();
   $err="";
   $err_email="";

   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $mypassword = mysqli_real_escape_string($con,$_POST['your_pass']); 
     

      $sql = "SELECT id FROM patient WHERE email = '$email' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $email and $mypassword, table row must be 1 row	
      if($count == 1) {
        $_SESSION["email"] = $email;
          header("location:hellopatient.php"); 
      }else {
        
          $err = "password ou email incorrect";}

        $s = "SELECT id FROM medecin WHERE email = '$email' and password = '$mypassword'";
        $resul = mysqli_query($con,$s);
        $row = mysqli_fetch_array($resul,MYSQLI_ASSOC);
      
        $count = mysqli_num_rows($resul);
        if($count == 1) {
            $_SESSION["email"] = $email;
             header("location: hellodoctor.php"); }
        else{ $err = "password ou email incorrect";}
 
            $s = "SELECT id FROM infermier WHERE email = '$email' and password = '$mypassword'";
            $resul = mysqli_query($con,$s);
            $row = mysqli_fetch_array($resul,MYSQLI_ASSOC);
         
            $count = mysqli_num_rows($resul);
            if($count == 1) {
                $_SESSION["email"] = $email;
                 header("location: hellonurse.php");   }
               else{
                   $err = "password ou email incorrect ";

                     }

         

   }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="Doctor form/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="Doctor form/css/style.css">
</head>
<body>

    <div class="main">

        
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div >
                        <figure><img src="imgs/u.svg" alt="sing up image"></figure>
                        <a href="médica.php" class="signup-image-link">Creer un compte</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Connecter vous</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name" ></i></label>
                                <input type="email" name="email" id="your_name" placeholder="email" required/>
                                <span style="color: red;">*<?php echo $err; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Mot de pass" required/>
                                <span style="color: red;">*<?php echo $err;  ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Rappel moi</label>
                                
                            </div>
                            <div class="form-group form-button">
                            <div class="g-recaptcha" data-sitekey="6Lc1KTIbAAAAAGJtWiZBodd0QD4qZG_RhAOLB-N6"></div>
      <br/>
                                <input    type="submit" name="signin" id="signin" class="form-submit" value="Connexion" />
                            </div>


                        </form>
                       
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
   
    <script src="Doctor form/vendor/jquery/jquery.min.js"></script>
    <script src="Doctor form/js/main.js"></script>

</body>
</html>