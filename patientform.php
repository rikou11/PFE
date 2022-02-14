
<?php 
include("connection.php");

//debut
$fname = $email = $lname = $adresse = $phone = $password= $age="";
$err_fname =$query=$query2= $err_email = $err_lname = $err_adresse = $err_phone = $err_password= $err_age="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //variables
  $fname = test_input($_POST["fname"]);
  $email = test_input($_POST["email"]);
  $lname = test_input($_POST["lname"]);
  $phone = test_input($_POST["phone"]);
  $password = test_input($_POST["pass"]);
  $adresse =  test_input($_POST["adresse"]);
  $age =  test_input($_POST["age"]);
}
//fucntion
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}//fin



//test de validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //first name
    if (empty($_POST["fname"])) {
      $err_fname = "Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
          $err_fname = "Only letters and white space allowed";
        }
    }
    
  //!!!!!!!email validation IMPORTANT !!!!!!
    if (empty($_POST["email"])) {
      $err_email = "Email is required";
    } else {
      $adresse = test_input($_POST["adresse"]);
       $select= mysqli_query($con,"SELECT id FROM patient WHERE email ='".$_POST['email']."'")
       or exit(mysqli_error($con));
if(mysqli_num_rows($select)) {
    $err_email =' This email is already being used';

}}  // fin !!!!!!!!!!!  

  //last name


    if (empty($_POST["lname"])) {
      $err_lname = "last name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
          $err_lname = "Only letters and white space allowed";
    }}
  //adresse
    if (empty($_POST["adresse"])) {
      $err_adresse = "adresse is required";
    } else {
      $adresse = test_input($_POST["adresse"]);
    }


  //phone
    if (empty($_POST["phone"])) {
      $err_phone = "phone is required";
      
    } else {
      $phone = test_input($_POST["phone"]);
    } 
    //age
    if (empty($_POST["age"])) {
        $err_age = "age is required";
      } else {
        $age = test_input($_POST["age"]);
      }
      //password 
         if(empty(trim($_POST["pass"]))){
            $err_password = "Please enter a password.";     
        } elseif(strlen(trim($_POST["pass"])) < 6){
            $err_password= "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["pass"]);
        }




        /* $query2 = "INSERT INTO consultation (last_name,phone,first_name,email,age,newdemande)VALUE('$lname','$phone','$fname','$email' ,'$age',false )";
        if(mysqli_query($con,$query2)){
          echo "hello ";} else {
            echo "Error: " . $query2 . "<br>" . $con->error;
          } */


//DATA INSERT
 
        $query = "INSERT INTO patient (last_name,first_name,email,password,phone,adresse,age)VALUE('$lname','$fname','$email','$password','$phone','$adresse' ,'$age')";
        if(mysqli_query($con,$query)){

          $query2 = "INSERT INTO consultation (last_name,phone,adresse,first_name,email,age,newdemande)VALUE('$lname','$phone','$adresse','$fname','$email' ,'$age',false )";
          if(mysqli_query($con,$query2)){
           } 
                   header("location:continue.php");

            }  




          }
         
         //
    /*      $image = $_FILES['img']['tmp_name'];
    $img = file_get_contents($image);
    $sql = "INSERT INTO `patient`(`photo`)VALUES ('$image')";
    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Image Successfullly UPloaded';
    }else{
        $msg = 'Error uploading image';
    }
    mysqli_close($con);

         }  */

        //DATA INSERT
      



   
  
//fin

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>
<!-- bootstrap -->
<link rel="stylesheet" href="O:\ANIME\www\LetsTry\bootstrap-5.0.1-dist\css\bootstrap.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="User form/css/style.css">
    <style>.error{
        color: red;
        font-size: smaller;

    }</style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title"> Patient Sign up</h2>
                        
                        <form method="POST" class="register-form" id="register-form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                            <div class="form-group" >
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="fname" placeholder="Nom"/>
                                <span class="error">* <?php echo $err_fname;?></span>
                            </div>
                            <div class="form-group" >
                                <label for="prename"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lname" placeholder="Prénon"/>
                                <span class="error">* <?php echo $err_lname;?></span>

                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                                <span class="error">* <?php echo $err_email;?></span>

                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-code-smartphone"></i></label>
                                <input type="tel" name="phone" id="phone" placeholder="Téléphone"  />
                                <span class="error">* <?php echo $err_phone;?></span>

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-my-location"></i></label>
                                <input type="text" name="adresse" id="adresse" placeholder="Adresse"/>
                                <span class="error">* <?php echo $err_adresse;?></span>

                            </div>
                            <div class="form-group" >
                                <label for="age"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="number" name="age" id="age" placeholder="Age" maxlength="2" minlength="2"/>
                                <span class="error">* <?php echo $err_age;?></span>

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="mot de pass" required minlength="6"/>

                            </div>
                          
                            
                             <div class="form-group" style="
                                margin-bottom : 5px; ">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>je suis d'acord aves toutes les   <a href="privacy&policy" class="term-service">Privacy Policy</a></label>
                            </div>
                            <div class="form-group" >

                            <h4><a href="médica.php">Acueil </a> ou vous avez deja un compte? <a href="logind.php">Connecter ici</a></h4>

</div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Inscrire"/>
                            </div>
                          
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="User form/images/Add User-rafiki.svg" alt="sing up image"></figure>
                       
                    </div>
                </div>
            </div>
        </section>


    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>