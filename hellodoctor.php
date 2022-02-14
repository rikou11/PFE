<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  include("interdit.php");
  include("connection.php");
  
  
  //variable
  $a =mysqli_real_escape_string($con,$_SESSION['email']);
  $s=true;
  $k="";
  if(isset($_POST['logout'])){
  
      unset($_POST['email']);
      session_destroy();
      $_SESSION = array();
  header("location: médica.php");
  }
  
  
  /*select for table  */
  $sql = "SELECT * FROM medecin WHERE `email` ='".$a."'  ";
  $result = $con->query($sql);
  

  $sqla=  "SELECT count('newdemande') AS total FROM consultation WHERE newdemande = 1";
  $resulta=mysqli_query($con,$sqla);
  $data=mysqli_fetch_assoc($resulta);
if( $data['total']>0){
   $f= "<span class='badge bg-danger rounded-pill'>  " .$data['total'] . " </span>";
}else{
  $f= "<span class='badge bg-success rounded-pill'>  " .$data['total'] . " </span>";

}
  /* 
  if(isset($_POST['LDC']))
  {
  $sql = "SELECT * FROM demandeconsultaion WHERE  `newdemande` ='".$s."' ";
  $result = $con->query($sql);
  
  
  if ($result->num_rows > 0) {
      // output data of each row
       while($row = $result->fetch_assoc()) {
  
     
   echo "<table >
   <tr>
     <th>Firstname</th>
     <th>Lastname</th>
     <th>Age</th>
     <th>adresse</th>
     <th>email</th>
     <th>phone</th>
   </tr>
   <tr>
   <td>" . $row["first_name"]."</td>
   <td>". $row["last_name"]."</td>
   <td>". $row["age"]."</td>
   <td>". $row["adresse"]."</td>
   <td>". $row["email"]. "</td>
   <td> " . $row["phone"]." </td>
  </tr>
   
   ";
  
      }
    } else {
      echo "0 results";
    
    }
  } */
  
  
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hello.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>session</title>
  </head>
  <body  class="bg-image" 
    style="background-image:url('imgs\cool-background 2.png');
    height: 100vh">
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <?php while($row = $result -> fetch_assoc()):   ?>
      <a class="navbar-brand" href="hellodoctor.php"><?php echo " <i class='fas fa-home'></i> Bienvenue Docteur <span class='text-primary'> ". $row["first_name"]."</span>"   ?> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="hellodoctor.php">accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
 <a href="profildoctor.php"  class="nav-link waves-effect waves-light" >Profile</a>
          </li>
        </ul>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          method="post" class="form-inline my-2 my-lg-0">
          &nbsp;

          <button type="submit" name="logout" class="btn btn-outline-danger">  Deconnecter</button>
        </form>
      </div>
      <?php endwhile; ?>
    </nav>
    <!-- end nav -->
    <div class="container1" >
    <!-- Background image -->
    <div class="container">
      <!-- container -->
      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        method="post">
        <br> <br>
        <div class="row">
          <div class="col-sm-6">
            <div class="bg-light card shadow-1-strong ">
              <div class="card-body ">
                <h5 class="card-title">veillez entrer a cette page </h5>
                <p class="card-text">afin d'avoir des informations de vos patients .</p>
                
                <a href="listeDC.php"  class="btn btn-primary btn-lg"> Gérer demandes de consultation  <?php   echo $f   ?></a> 
              </div>
            </div>
          </div>
      </form>
      </div><!--fin container -->
    </div>
    <!-- Background image -->

<script>
    let button = document.querySelector('.button');
let buttonText = document.querySelector('.tick');

const tickMark = "<svg width=\"58\" height=\"45\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";

buttonText.innerHTML = "Submit";

button.addEventListener('click', function() {

  if (buttonText.innerHTML !== "Submit") {
    buttonText.innerHTML = "Submit";
  } else if (buttonText.innerHTML === "Submit") {
    buttonText.innerHTML = tickMark;
  }
  this.classList.toggle('button__circle');
});</script>
  </body>
</html>