<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include("interdit.php");
include("connection.php");



//variable
$a =mysqli_real_escape_string($con,$_SESSION['email']);
$b="boite de lettre est vide";

 /*select for table  */
 $sql = "SELECT * FROM consultation WHERE `email` ='".$a."'  ";
 $result = $con->query($sql);
 
 /*delete */
 if (isset( $_GET["delete"]))
 {     
$id= $_GET["delete"];

$del=  mysqli_query ($con,"UPDATE consultation SET `ordonance` =  '".$b."' WHERE id = $id  ");


header("location:hellopatient.php"); 

 } /* fin delete *//*logout*/
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

     <title>Ordonnance</title>
 </head>
 <body>

<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <a href="hellopatient.php" class="btn btn-outline-primary"> 
 <i class="fas fa-home"></i>Home page</a></li>

    </ul>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
 method="post" class="form-inline my-2 my-lg-0">
 
    <button type="submit" name="logout" class="btn btn-outline-danger">  Logout</button>
    </form>
  </div>

</nav>
<!-- end nav -->


<div class="container1">
 <div class="container">
 
<br><br>
 <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<?php while($row = $result -> fetch_assoc()):   ?>
 
 <div class="card border-success mb-3" style="width: 25rem;">
 <div class="card-header">Ordonnance</div>

  <div class="card-body">
<!--     <h5 class="card-title">Letre d'orientation</h5>
 -->    <h6 class="card-subtitle mb-2 text-muted">Pour MR(s)  <?php echo $row["first_name"] ?> <?php echo $row["last_name"] ?>  </h6>
    <p class="card-text"> <?php echo $row["ordonance"]?></p>

<!--     <a href="#" class="card-link btn btn-success"> Bien Recu !</a>
 -->    <a href="listeOrd.php?delete=<?php echo $row["id"];  ?>" class="card-link  btn btn-danger" name="delete">supprimer</a>
  </div>
</div>

    <?php endwhile; ?>


</form>
</div> </div>

 </body>