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

/*logout*/
if(isset($_POST['logout'])){

    unset($_POST['email']);
    session_destroy();
    $_SESSION = array();
header("location: médica.php");
}/*finlogout*/

  /*select for table  */
$sql = "SELECT * FROM consultation WHERE `newSoin` ='".$s."'  ";
$result = $con->query($sql);



 /*delete */
   if (isset( $_GET["delete"]))
  {     
$id= $_GET["delete"];

$del=  mysqli_query ($con,"UPDATE consultation SET `newSoin` = false  WHERE id = $id   ");
/* header("location: listDSinfo.php");
 */
  } /* fin delete */


 
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- bootrap link --> 

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
      <a href="hellonurse.php" class="btn btn-outline-primary"> 
 <i class="fas fa-home"></i>Accueil</a></li>
<li class="nav-item">
        <a class="nav-link disabled" href="listeDS.php"><i class="fas fa-info-circle"></i> consulter demandes de soignement</a>
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
 
<br><br>
 <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<table class="table table-striped">
<thead>

<tr>
<th scope="col">Nom</th>
<th scope="col">Prénom</th>
<th scope="col">age</th>
<th scope="col">adresse</th>
<th scope="col">télephone</th>
<th scope="col">email</th>
<th scope="col">action</th>
<th scope="col">Suprimer</th>
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


<td></td><td> 
<a href="listeDSinfo.php?delete=<?php echo $row["id"];  ?>" onclick="bootrstrapAlert()"  class="btn btn-danger btn-sm">x</a>

 </td>

</tr>
<?php endwhile; ?>

</table>
</form>
</div></div>



<script>
function bootstrapAlert(){

$.bootstrapGrowl("this is success message",{
type : "success",
offset : {from : "top , amout 250"},
align : "center", 
delay : 3000,
allow_dismiss : true ,
stakup_spacing : 10

});
}

</script>
</body>
</html>