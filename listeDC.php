<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include("interdit.php");
include("connection.php");



//variable
$a =mysqli_real_escape_string($con,$_SESSION['email']);
$s=true;
$k="";
$f = false;
$text2 = '
cher patient , 
vu votre cas veillez s orienter vers un medcin specialiste .
pour une meilleur prise en charge 
Cordialement .';

$text1 = '
cher patient , 
vu votre cas veillez s orienter vers un hopital .
pour une meilleur prise en charge 
Cordialement .';
/*logout*/
if(isset($_POST['logout'])){

    unset($_POST['email']);
    session_destroy();
    $_SESSION = array();
header("location: médica.php");
}/*finlogout*/

  /*select for table  */
$sql = "SELECT * FROM consultation WHERE `newdemande` ='".$s."'  ";
$result = $con->query($sql);



 /*delete */
   if (isset( $_GET["delete"]))
  {     
$id= $_GET["delete"];

$del=  mysqli_query ($con,"UPDATE consultation SET `newdemande` = false  WHERE id = $id   ");
  } /* fin delete */


  /* hopital*/
/*   if (isset( $_GET["hopital"])){ 
        $id2= $_GET["hopital"];
$del=  mysqli_query ($con,"UPDATE consultation SET `newOrient` = '$text1'  WHERE `id` = $id2   ");
} */
 /* orienter */
/* if (isset( $_GET["orienter"])){
    $id3 = $_GET["orienter"];
$del=  mysqli_query ($con,"UPDATE consultation SET `newOrient` = '$text2'  WHERE `id` = $id3   ");
}
 */

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
Accueil</a>      </li>
     
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
 <br>
<br><br>
 <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<table class="table table-striped "  style="height: auto;  overflow-y: auto;">
<thead  >

<tr>
<th scope="col">Prénom</th>
<th scope="col">Nom</th>
<th scope="col">age</th>
<th scope="col"> adresse</th>
<th scope="col">Téléphone</th>
<th scope="col">email</th>
<th scope="col">action</th>
<th scope="col">suprimer</th>

</tr>
</thead>
<?php
   while($row = $result->fetch_assoc()):
?>
<tr>  
<td><?php echo $row["first_name"]?></td>
<td><?php echo $row["last_name"]?></td>
<td><?php echo $row["age"]?></td>
<td><?php echo $row["adresse"]?></td>
<td><?php echo $row["phone"]?></td>
<td><?php  echo $row["email"]?></td>


<td> 

<div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    consulter
  </button>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a href="orient.php?id=<?php echo $row["id"];  ?> "  class=" dropdown-item font-weight-bold "> <i class="fas fa-stethoscope"></i> Orienter</a> 
  <div class="dropdown-divider"></div>
<a href="hopital.php?id=<?php echo $row["id"];  ?> " class="dropdown-item font-weight-bold "><i class="fas fa-hospital-symbol"></i> Hospitaliser</a> 
<div class="dropdown-divider"></div>
  <h6 class="dropdown-header  font-weight-bold" ><i class="fas fa-notes-medical"></i> Prescrire</h6>
<!-- done -->
    <a class="dropdown-item text-success" href="ordonance.php?id=<?php echo $row["id"];  ?> ">&nbsp; &nbsp;ordonance</a>
    <a class="dropdown-item text-success" href="congmalade.php?id=<?php echo $row["id"];  ?> ">&nbsp;&nbsp;congé de maladie</a>

<!-- fin done -->




    <a class="dropdown-item text-success" href="bilanAnalyse.php?id=<?php echo $row["id"];  ?> ">&nbsp;&nbsp;Bilan d'analyse ou examen complementaire</a>

  </div>
</div>



 </td>

 <td><a href="listeDC.php?delete=<?php echo $row["id"];  ?>"   class="btn btn-danger btn-sm">x</a></td>
</tr>
<?php endwhile; ?>

</table>
</form>
</div></div>


</body>
</html>