<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  
  include("interdit.php"); 
  include("connection.php");
  /* variables */
  $q="";
  $s=true;
$NotiBilan="0";
$NotiAnalyse = "0";
$NotiQ = "0";
$NotiA = "0";
$NotiOrd="0";
$boitelettre="boite de lettre est vide";
  $a =mysqli_real_escape_string($con,$_SESSION['email']);
  /* logout */
  if(isset($_POST['logout'])){
  
     unset($_POST['email']);
     session_destroy();
     $_SESSION = array();
  header("location: médica.php");
  }
  
  /* demande de consultation  */
  if(isset($_POST['DC'])){
   $q= mysqli_query($con, "UPDATE consultation SET `newdemande` = '".$s."'  WHERE email = '".$a."'   ") ; 
  }
  /*fin  demande de consultation  */
  
  /* demande de soin  */
  if(isset($_POST['DS'])){
   $q= mysqli_query($con, "UPDATE consultation SET `newSoin` = '".$s."'  WHERE email = '".$a."'   ") ; 
  }
  /*fin  demande de soin  */
  /*select for table  */
  $sql = "SELECT * FROM consultation WHERE `email` ='".$a."'  ";
  $result = $con->query($sql);


  /* notification ordonance*/
  $ql =  "SELECT ordonance FROM consultation WHERE `email` ='".$a."'  ";
$re= $con->query($ql);
 while($row = $re -> fetch_assoc()){
$NotiOrd = "1";
    if($row["ordonance"]==$boitelettre  or empty($row["ordonance"])){
    $NotiOrd = "0";
    }
 }

 /* notification Bilan*/
 $qls =  "SELECT bilanAnalyse FROM consultation WHERE `email` ='".$a."'  ";
 $res= $con->query($qls);
  while($row = $res -> fetch_assoc()){
 $NotiBilan = "1";
   if($row["bilanAnalyse"]==$boitelettre or empty($row["bilanAnalyse"] ) ){
 $NotiBilan = "0";}}


  /* notification cong malde*/
  $qlw =  "SELECT congMalade FROM consultation WHERE `email` ='".$a."'  ";
  $resq= $con->query($qlw);
   while($row = $resq -> fetch_assoc()){
    $NotiAnalyse = "1";

    if($row["congMalade"]==$boitelettre or empty($row["congMalade"] ) ){
      $NotiAnalyse = "0";}
   }

  /* notification orientation */
  $qlr =  "SELECT newOrient FROM consultation WHERE `email` ='".$a."'  ";
  $rezq= $con->query($qlr);
   while($row = $rezq -> fetch_assoc()){
    $NotiQ = "1";

    if($row["newOrient"]==$boitelettre or empty($row["newOrient"] ) ){
      $NotiQ = "0";}
   }

  /* notification dhospitalisation*/
  $qlwp =  "SELECT hopital FROM consultation WHERE `email` ='".$a."'  ";
  $respq= $con->query($qlwp);
   while($row = $respq -> fetch_assoc()){
    $NotiA = "1";

    if($row["hopital"]==$boitelettre or empty($row["hopital"] ) ){
      $NotiA = "0";}
   }
 
 
  
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
    <title>session</title>
  </head>
  <body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <?php while($row = $result -> fetch_assoc()):   ?> <!-- debut while -->
        <a class="navbar-brand" href="hellopatient.php"><?php echo "  <i class='fas fa-home'></i>&nbsp;welcome Mr(s).<span class='text-primary'> ". $row["first_name"]."</span>"   ?> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <?php endwhile; ?> <!-- fin while -->
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="hellopatient.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
			 <a href="profilpatient.php"  class="nav-link waves-effect waves-light" >profile</a>

          </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Voir resultats de consultation
            </a>
        
            
            <div class="dropdown-menu dropdown-danger" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="listOrient.php" name="orientation"> <i class="fas fa-stethoscope"></i>orientation  <span class="badge bg-primary rounded-pill text-white"><?php echo $NotiQ ?> </span></a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="listehospital.php"> <i class="fas fa-hospital-symbol"></i> hospitalisation<span class="badge bg-primary rounded-pill text-white"><?php echo $NotiA ?> </span></a>
                <div class="dropdown-divider"></div>

              <a class="dropdown-item text-success" href="listCongMalade.php"> <i class="fas fa-notes-medical"></i> congé maladie <span class="badge bg-success rounded-pill text-white"><?php echo $NotiAnalyse ?> </span> </a>
              <a class="dropdown-item text-success" href="listeBilan.php"> <i class="fas fa-notes-medical"></i> bilan d'analyses  <span class="badge bg-success rounded-pill text-white"><?php echo $NotiBilan ?> </span> </a>
              <a class="dropdown-item text-success" href="listeOrd.php"><i class="fas fa-notes-medical"></i>  ordonnance     <span class="badge bg-success rounded-pill text-white"><?php echo $NotiOrd ?> </span></a>
            </div>

			
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
      <div class="container"> <br><br><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
         
          <div class="row">
          <div class="col-sm-6">
            <div class="bg-light card shadow-1-strong ">
              <div class="card-body ">
                <h5 class="card-title">Veillez Clicker a ce button</h5>
                <p class="card-text">afin de siscrire pour des soins medicaux:</p>

 
               <button type="submit" class="btn btn-lg btn-primary"  name="DS">demander soin</button><br> <br>
 
              </div>
            </div>
          </div>

<br><br><br>

          <div class="row" >
          <div class="col-sm-6">
            <div class="bg-light card shadow-1-strong ">
              <div class="card-body ">
                <h5 class="card-title">Veillez Clicker a ce button</h5>
                <p class="card-text">afin de siscrire pour avoire une consultation medicale:</p>
                <button type="submit" class="btn btn-lg btn-primary"  name="DC">demander consulatation</button><br> <br>
              </div>
            </div>
          </div>
<br><br>
<div class="row">
          <div class="col-sm-6" style="max-width :400px ;">
            <div class="bg-light card shadow-1-strong ">
              <div class="card-body ">
                <h5 class="card-title">Veillez Clicker a ce button</h5>
                <p class="card-text">afin de connaitre resultat de consultation:</p>

                <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Voir resultats de consultation
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              <a class="dropdown-item" href="listOrient.php" name="orientation"> <i class="fas fa-stethoscope"></i>orientation<span class="badge bg-primary rounded-pill text-white"><?php echo $NotiQ ?> </span></a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="listehospital.php"> <i class="fas fa-hospital-symbol"></i>hospitalisation<span class="badge bg-primary rounded-pill text-white"><?php echo $NotiA ?> </span></a>
                <div class="dropdown-divider"></div>

                <h6 class="dropdown-header  font-weight-bold" ><i class="fas fa-notes-medical"></i> &nbsp; Prescription</h6>

              <a class="dropdown-item text-success" href="listCongMalade.php">  congé maladie <span class="badge bg-success rounded-pill text-white"><?php echo $NotiBilan ?> </span></a>
              <a class="dropdown-item text-success" href="listeBilan.php"> bilan d'analyses  <span class="badge bg-success rounded-pill text-white"><?php echo $NotiBilan ?> </span></a>
              <a class="dropdown-item text-success" href="listeOrd.php">  ordonnance   <span class="badge bg-success rounded-pill text-white"><?php echo $NotiOrd ?> </span></a>
            </div>
          </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </body>
</html>


