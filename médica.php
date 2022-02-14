<?php
    include ("connection.php");
    ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
        <!-- Bootstrap CSS -->
        <link  rel="stylesheet" href="art.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
    </head>
    <body>


        <!-- nav bar-->
        <section class="header">
            <!-- a -->
            <nav>
                <a href="médica.html"><img src="imgs/photo1.png"></a>         
                <div class="nav-link">
                    <ul>
                        <li><a href="médica.html"> <i class="fas fa-home"></i>Accueil</a></li>
                        <li><a href="aboutus.html" >A propos de nous</a></li>
                        <li><button class="myBtn_multi"  ><i class="fas fa-user-plus"></i>Inscrire</button> </li>
                        <li><!-- <button  id="myBtn"></button> -->
                    <a  class="myBtnStyle" href="logind.php"><i class="fas fa-user"></i>Connecter</a> </li> </ul>
                </div>
            </nav>
            <!--z  -->
            <!-- lktiba li f nos Home Page
                --> 
            <div class="text-box">
                <h1>Votre Santé Nous Concerne</h1>
                <p>
                </p>
                <button class="hero-btn">Commencez Avec Nous </button>
            </div>
          
            <!--  the sign In modal -->
            <!-- The Modal -->
            <div  class="modal modal_multi">
            <!-- Modal content -->
            <div class="modal-content" style="width: 600px;">
                <span class="close close_multi">×</span>



                <h2> choisis comment tu veux inscrire  </h2>

           <div class="flex-box"> 
<div class="container1">
  <img src="imgs/doctorvect.png" alt="Avatar" class="image1">
  <div class="overlay1">
    <div class="text1">  <button class="btn55" name="BtnDoctor" ><a href="doctorform.php" style="text-decoration: none; color: inherit;">Medecin</a></button></div>
  </div>
</div>
<div class="container1">
  <img src="imgs/infermier.png" alt="Avatar" class="image1">
  <div class="overlay1">
    <div class="text1">  <button class="btn55" name="BtnNurse" > <a href="nurseform.php" style="text-decoration: none; color: inherit;">Infermier</a></button></div>
  </div>
</div>
<div class="container1">
  <img src="imgs\Person with a cold-bro.png" alt="Avatar" class="image1">
  <div class="overlay1">
    <div class="text1">  <button class="btn55" name="BtnPatient" ><a href="patientform.php" style="text-decoration: none; color: inherit;">Patient</a> </button></div>
  </div>  
</div><!-- 
<div class="flex-box"> 
<div class="container2">
  <img src="imgs\Person with a cold-bro.png" alt="Avatar" class="image1">
  <div class="overlay1">
    <div class="text1">  <button class="btn55" name="BtnPatient" ><a href="patientform.php" style="text-decoration: none; color: inherit;"> as Patient</a> </button></div>
  </div>
</div>
<div class="container2">
  <img src="imgs/assic.gif" alt="Avatar" class="image2">
  <div class="overlay1">    <div class="text1">  <button class="btn55" name="BtnAssociation" ><a href="patientform.php" style="text-decoration: none; color: inherit;">Association ?</a></button></div>
   </div>
</div></div>
</div> -->








            </div>
        </section>
        <!--  deuxiem page  -->
        <section class="abouas">
            <h1 style="color: rgb(4, 93, 172);">Services que nous Offrons</h1>
            <!--na7kio 3la medecien w nurse w patient feedback-->
            <img src="imgs/" alt="">
            <p>nous mettons a votre service un site web qui facilite les deffirents besoins medicaux.
            </p>
            <div class="défi">
                <div class="défi1">
                    <h3>Docteur</h3>
                    <img src="imgs/1.png" alt="">
                    <p>je suis le medecin soigniant et je suis toujours a votre service .
                    </p>
                </div>
                <div class="défi1">
                    <h3>Infermier</h3>
                    <img src="imgs/2.png">
                    <p>je suis l'infermier est mes servives  sont disponibles h24 et 7/7 .
                    </p>
                </div>
                <div class="défi1">
                    <h3>patient</h3>
                    <img src="imgs/3.png">
                    <p>je vous fais entieres confiance et merci d'avance0
                    </p>
                </div>
            </div>
        </section>
        <!-- 3eme page 
            -->    
        <section class="cmpus">
            <h1 style="color: rgb(4, 93, 172);">Ou nous Somme </h1>
            <!--des photo des wilaya lblayss li fihom lhopital ta3na-->
            <p> acctuelemnt nos servise medicaux au wilaya suivant : 
            </p>
            <div class="row">
                <div class="cpscol">
                    <img src="imgs/cons.jpg">
                    <div class="layer">
                        <h3>Constantine</h3>
                        <p>La ville des ponts suspondus 
                        </p>
                    </div>
                </div>
                <div class="cpscol">
                    <img src="imgs/alge.jpg">
                    <div class="layer">
                        <h3>Alger</h3>
                        <p>la blanche
                        </p>
                    </div>
                </div>
                <div class="cpscol">
                    <img src="imgs/tind.jpg">
                    <div class="layer">
                        <h3>Tamanghaset</h3>
                        <p>ville des palmiers
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <!-- End of nav bar-->
        <!--footbar -->
        <section class="footer">
             <a href="aboutus.html" style="text-decoration: none;" ><h4>A propos de nous</h4></a>
            <div class="icons">
                <a href="#"><i class="fab fa-facebook-square"></i>Facebook</a>
                <a href="#"><i class="fab fa-twitter-square"></i>Twitter</a>
                <a href="#"><i class="fab fa-youtube-square"></i>youtube</a>         
            </div>
        </section>
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
            -->
        <script>
            // Get the modal
            
            var modalparent = document.getElementsByClassName("modal_multi");
            
            // Get the button that opens the modal
            
            var modal_btn_multi = document.getElementsByClassName("myBtn_multi");
            
            // Get the <span> element that closes the modal
            var span_close_multi = document.getElementsByClassName("close_multi");
            
            // When the user clicks the button, open the modal
            function setDataIndex() {
            
                for (i = 0; i < modal_btn_multi.length; i++)
                {
                    modal_btn_multi[i].setAttribute('data-index', i);
                    modalparent[i].setAttribute('data-index', i);
                    span_close_multi[i].setAttribute('data-index', i);
                }
            }
            
            
            
            for (i = 0; i < modal_btn_multi.length; i++)
            {
                modal_btn_multi[i].onclick = function() {
                    var ElementIndex = this.getAttribute('data-index');
                    modalparent[ElementIndex].style.display = "block";
                };
            
                // When the user clicks on <span> (x), close the modal
                span_close_multi[i].onclick = function() {
                    var ElementIndex = this.getAttribute('data-index');
                    modalparent[ElementIndex].style.display = "none";
                };
            
            }
            
            window.onload = function() {
            
                setDataIndex();
            };
            
            window.onclick = function(event) {
                if (event.target === modalparent[event.target.getAttribute('data-index')]) {
                    modalparent[event.target.getAttribute('data-index')].style.display = "none";
                }
            
                // OLD CODE
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };
          
            
            
             
        </script>
  <script> /*  
            //XXXXXXXXXXXXXXXXXXXXXXX    Modified old code    XXXXXXXXXXXXXXXXXXXXXXXXXX
            
              // Get the modal
            
              var modalparen = document.getElementsByClassName("modal_multi");
            
            // Get the button that opens the modal
            
            var modal_btn_mult = document.getElementsByClassName("hero-btn");
            
            // Get the <span> element that closes the modal
            var span_close_mult = document.getElementsByClassName("close_multi");
            
            // When the user clicks the button, open the modal
            function setDataIndex() {
            
                for (i = 0; i < modal_btn_mult.length; i++)
                {
                    modal_btn_mult[i].setAttribute('data-index', i);
                    modalparen[i].setAttribute('data-index', i);
                    span_close_mult[i].setAttribute('data-index', i);
                }
            }
            
            
            
            for (i = 0; i < modal_btn_mult.length; i++)
            {
                modal_btn_mult[i].onclick = function() {
                    var ElementIndex = this.getAttribute('data-index');
                    modalparen[ElementIndex].style.display = "block";
                };
            
                // When the user clicks on <span> (x), close the modal
                span_close_mult[i].onclick = function() {
                    var ElementIndex = this.getAttribute('data-index');
                    modalparen[ElementIndex].style.display = "none";
                };
            
            }
            
            window.onload = function() {
            
                setDataIndex();
            };
            
            window.onclick = function(event) {
                if (event.target === modalparen[event.target.getAttribute('data-index')]) {
                    modalparen[event.target.getAttribute('data-index')].style.display = "none";
                }
            
                // OLD CODE
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };
             */</script>


        <!--        xip_Name its for email_id  
            --><script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <!--          check box tae Remember me 
            -->      <script>
            $(function() {
            
                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#checky').attr('checked', 'checked');
                    $('#xip_Name').val(localStorage.usrname);
                    $('#xip_Password').val(localStorage.pass);
                } else {
                    $('#checky').removeAttr('checked');
                    $('#xip_Name').val('');
                    $('#xip_Password').val('');
                }
            
                $('#remember_me').click(function() {
            
                    if ($('#remember_me').is(':checked')) {
                        // save username and password
                        localStorage.usrname = $('#xip_Name').val();
                        localStorage.pass = $('#xip_Password').val();
                        localStorage.chkbx = $('#checky').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });
            
        </script> 
    </body>
</html>