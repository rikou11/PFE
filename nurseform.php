<?php
include("connection.php");

//debut
$fname = $email = $lname  = $phone = $password = $hospitalid = "";
$err_fname = $query = $err_email = $err_lname  = $err_phone = $err_password = $err_hospitalid = "";


//fucntion
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} //fin





// test validation 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $email = test_input($_POST["email"]);
    $lname = test_input($_POST["lname"]);
    $phone = test_input($_POST["phone"]);
    $password = test_input($_POST["pass"]);
    $hospitalid =  test_input($_POST["hospitalid"]);

    //first name
    if (empty($_POST["fname"])) {
        $err_fname = "Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $err_fname = "Only letters and white space allowed";
        }
    }


    //phone
    if (empty($_POST["phone"])) {
        $err_phone = "phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
    }
    //last name
    if (empty($_POST["lname"])) {
        $err_lname = "Last Name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $err_lname = "Only letters and white space allowed";
        }
    }
    //hospitalid validation

    if (empty($_POST["hospitalid"])) {
        $err_hospitalid = "hospitalid is required";
    } else {
        /*     $hospitalid = test_input($_POST["hospitalid"]);
 */
        $selecthospital = mysqli_query($con, "SELECT id_emp FROM employer_id WHERE id_emp ='" . $_POST['hospitalid'] . "'")
            or exit(mysqli_error($con));

        if (mysqli_num_rows($selecthospital)) {
            $err_hospitalid = ' you must enter Your id to continue the regestration';
        }
    }


    //email  debut
    if (empty($_POST["email"])) {
        $err_email = "Email is required";
    } else {
        $select = mysqli_query($con, "SELECT id FROM infermier WHERE email ='" . $_POST['email'] . "'")
            or exit(mysqli_error($con));
        if (mysqli_num_rows($select)) {
            $err_email = ' This email is already being used';
        }
    } //fiiiiin

    //password 
    // Validate password
    // note: 
    //compaire to patient form you ll see that password validation dont "TRIM()"in that code idk why it doesnt word here.
    //password 
    if (empty(trim($_POST["pass"]))) {
        $err_password = "Please enter a password.";
    } elseif (strlen(trim($_POST["pass"])) < 6) {
        $err_password = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["pass"]);
    }



    //after validation we insert DATA to our DATABASE
    $query = "INSERT INTO infermier (last_name,first_name,email,password,phone,id_infermier)VALUE('$lname','$fname','$email','$password','$phone','$hospitalid' )";
    if (mysqli_query($con, $query)) {
        echo " insert data seccesfuly";
        header("location:continue.php");
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Nurse Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="Nurse form/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="Nurse form/css/style.css">
    <style>
        .error {
            color: red;
            font-size: smaller;
        }
    </style>
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Inscription</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="name" placeholder="Prenom" />
                                <span class="error">* <?php echo $err_fname; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="prename"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="name" placeholder="Nom" />
                                <span class="error">* <?php echo $err_lname; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" />
                                <span class="error">* <?php echo $err_email; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-code-smartphone"></i></label>
                                <input type="tel" name="phone" id="phone" placeholder="téléphone" minlength="10" />
                                <span class="error">* <?php echo $err_phone; ?></span>

                            </div>

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="number" name="hospitalid" id="re_pass" placeholder="KindlyCare id " />
                                <span class="error">* <?php echo $err_hospitalid; ?> </span>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="mot de pass" />
                                <span class="error">* <?php echo $err_password; ?></span>
                            </div>
                            <div class="form-group" style="
                                margin-bottom : 5px; ">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>je suis d'accord avec toutes les declarations du <a href="privacy&policy" class="term-service">Privacy Policy</a></label>
                            </div>
                            <div class="form-group">

                                <h5><a href="médica.php">accueil </a> ou vous avez deja un compte? <a href="logind.php">Connecter ici</a></h5>

                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Inscrire" />
                            </div>

                    </div>
                    <div class="signup-image">
                        <figure><img src="Nurse form/images/undraw_medical_care_movn.svg" alt="sing up image"></figure>

                    </div>
                </div>
            </div>
        </section>


        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>