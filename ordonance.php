<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

include("interdit.php");
include("connection.php");


 if(isset($_GET['id']) ){
      $id =intval($_GET["id"]);

}
     
    
  $indeex=  "UPDATE consultation SET `ordonance` =   ('".  @$_POST['ord']."')   WHERE id = ('".  $id ."' ) ";

 
if(isset($_POST['valider'])){
 
$p= $_POST['ord'];

$del=  mysqli_query ($con, $indeex);
  header("location:listeDC.php"); 
 
}/*logout*/
if(isset($_POST['logout'])){

  unset($_POST['email']);
  session_destroy();
  $_SESSION = array();
header("location: médica.php");
}/*finlogout*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="hello.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />

    <title>Document</title>
</head>
<body>

<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <a href="hellodoctor.php" class="btn btn-outline-primary"> 
 <i class="fas fa-home"></i>
accueil</a>      </li>
     <li class=" nav-item active">
     <a href="listeDc.php" class="nav-link "> 
     <i class="fas fa-info-circle"></i> liste pasient 
</a> 
     </li>
    </ul>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
 method="post" class="form-inline my-2 my-lg-0">
 
    <button type="submit" name="logout" class="btn btn-outline-danger">  Deconnecter</button>
    </form>
  </div>

</nav>
<!-- end nav -->
<div class="container1"> 
    <div class="container">  
    <h2>ecrire ici l'ordonnance</h2>
    <form  action="" method="POST">
    
    <textarea for ="ord" name="ord"  cols="60" rows="20"> 
</textarea>    <br> <br>
     <input type="submit" name="valider"  class="btn btn-lg btn-primary " value="valider" >
    </form>

    </div></div>


</body>
</html>