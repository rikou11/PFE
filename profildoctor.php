<?php 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

include("interdit.php"); 
include("connection.php");
//variable
$a =mysqli_real_escape_string($con,$_SESSION['email']);

 /*select for table  */
 $sql = "SELECT * FROM medecin WHERE `email` ='".$a."'  ";
 $result = $con->query($sql);
 /* logout */
 if(isset($_POST['logout'])){
  
	unset($_POST['email']);
	session_destroy();
	$_SESSION = array();
 header("location: médica.php");
 }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
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
<br><br><br>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<?php while($row = $result -> fetch_assoc()):   ?>

<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="imgs/doctor.svg" alt="Maxwell Admin">
				</div>
				<h5 class="user-name">Docteur <?php echo $row["first_name"] ?>  </h5>
				<h6 class="user-email"><?php echo $row["email"] ?>  </h6>
			</div>
			
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Details personel</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Details personel</label>
					<input type="text" class="form-control" id="fullName" placeholder="<?php echo $row["first_name"] ?> <?php echo $row["last_name"] ?> " readonly>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" placeholder="<?php echo $row["email"] ?>" readonly>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Téléphone</label>
					<input type="text" class="form-control" id="phone" placeholder="<?php echo $row["phone"] ?> " readonly>
				</div>
			</div>
			
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">kindly care </h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">id</label>
					<input type="name" class="form-control" id="Street" placeholder="<?php echo $row["id_medcin"] ?>" readonly>
				</div>
			</div>
			
		
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
				<!-- 	<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<?php endwhile; ?>

</form>
</body>
</html>