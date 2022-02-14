<?php
session_start();
if(!isset($_SESSION['email'])){
header("location:médica.php");
exit();


}




?>