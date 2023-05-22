<?php

session_start();
$op = 0;
if(isset($_GET['p']))
    $op = $_GET['p'];

require('./scripts/db/connect.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>aDayinPorto</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <a id="header"></a>
        <section class="header">
            <nav id="navbar">   
            <a class="company-title noSelect" href="./?p=0">aDayinPorto</a>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="closemenu()"></i>
                    <ul id="menu">
                        <li><a class="noSelect" href="./?p=0">HOME</a></li>
                        <li><a class="noSelect" href="./?p=1">ABOUT</a></li>
                        <li><a class="noSelect" href="./?p=2">TOURS</a></li>
                        <li><a class="noSelect" href="./?p=3">CONTACT</a></li>
                        <li><a class="noSelect" href="./?p=6">FAQ's</a></li>
                        <li><a class="noSelect" href=""></a></li>
                        <li><a class="noSelect" href="./?p=4">LOGIN</a></li>
                        <li><a class="button" href="./?p=5">Logout</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="openmenu()"></i>
            </nav>
            
            <div class="text-box">
                <h1>Airbnb 2019 Douro Most Unique Experience</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium tortor arcu, eu tempus lectus sagittis quis. <br>Cras vel justo mi. Mauris consectetur eget nisl non congue. Nam cursus enim eu leo feugiat, quis mattis ex tempor. Vivamus consectetur elementum venenatis. Morbi vel elit auctor, vehicula lorem quis, tincidunt augue.</p>
                <a href="#tours" class="button">Our Tours</a>
            </div>
        </section>
        
        <section>
        <?php
            switch($op)
            {
                case 0: include("./index.php"); break;

                case 1: include("./content/about.php"); break;

                case 2: include("./content/tours.php"); break;

                case 3: include("./content/contact.php"); break;

                case 4: include("./content/login.php"); break;

                case 5: include("./content/logout.php"); break;

                default: echo "<h3> Conteudo Inválido ($op) </h3>";
            }
        ?>
        </section>
        
        <a id="about"></a>
        <section class="about">
            <h1>About Us</h1>
            <p class="paragraph-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus,
                sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum.</p>
        </section>
        
        <a id="tours"></a>
        <section class="tours">
            <h1>Our Tours</h1>
            <p class="paragraph-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus,
                sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum.</p>
            
            <!--
            <div class="tours-row">
                <div class="tours-col">
                    <h3 class="tour-title">Aaaa</h3>
                    <p class="paragraph-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium tortor arcu, eu tempus lectus sagittis quis. <br>Cras vel justo mi. Mauris consectetur eget nisl non congue.</p>
                </div>
                <div class="tours-col">
                    <h3 class="tour-title">Bbbb</h3>
                    <p class="paragraph-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium tortor arcu, eu tempus lectus sagittis quis. <br>Cras vel justo mi. Mauris consectetur eget nisl non congue.</p>
                </div>
                <div class="tours-col">
                    <h3 class="tour-title">Cccc</h3>
                    <p class="paragraph-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium tortor arcu, eu tempus lectus sagittis quis. <br>Cras vel justo mi. Mauris consectetur eget nisl non congue.</p>
                </div>
            </div> 
            -->
            <!--
            <div class="tours-row">
                <div class="tours-img-col">
                    <img class="tour-image" src="imagens/tour1.png">
                    <div class="layer">
                        <h3 class="tour-title">Airbnb 2019 Douro Most Unique Access Exp</h3>
                    </div>
                </div>
                <div class="tours-img-col">
                    <img class="tour-image" src="imagens/tour2.png">
                    <div class="layer">
                        <h3 class="tour-title">Eleven Wine Tastings, Wineries, Farm to Table Chef, Garden Lunch</h3>
                    </div>
                </div>
                <div class="tours-img-col">
                    <img class="tour-image" src="imagens/tour3.png">
                    <div class="layer">
                        <h3 class="tour-title">Douro Valley in a convertible Mercedes</h3>
                    </div>
                </div>
            </div>
            -->
            
            <div class="tours-row">
                <div class="tours-img-col">
                    <img class="tour-image" src="_images/tour1.png">
                    <h3 class="tour-title">Airbnb 2019 Douro Most Unique Access Exp</h3>
                    <p class="paragraph-description tour-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus
                        risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium
                        tortor arcu, eu tempus lectus sagittis quis. <br>Cras vel justo mi. Mauris consectetur eget nisl non congue.</p>
                    <a href="https://www.airbnb.pt/experiences/181572" class="tour-buttonLink">Check Tour</a>
                </div>
                
                <div class="tours-img-col">
                        <img class="tour-image" src="_images/tour2.png">
                        <h3 class="tour-title">Eleven Wine Tastings, Wineries, Farm to Table Chef, Garden Lunch</h3>
                        <p class="paragraph-description tour-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus
                            risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium
                            tortor arcu, eu tempus lectus sagittis quis. <br>Cras vel justo mi. Mauris consectetur eget nisl non congue.</p>
                        <a href="https://www.airbnb.pt/experiences/716209" class="tour-buttonLink">Check Tour</a>
                </div>
                
                <div class="tours-img-col">
                    <img class="tour-image" src="_images/tour3.png">
                    <h3 class="tour-title">Douro Valley in a convertible Mercedes</h3>
                    <p class="paragraph-description tour-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus
                        risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium
                        tortor arcu, eu tempus lectus sagittis quis. <br>Cras vel justo mi. Mauris consectetur eget nisl non congue.</p>
                    <a href="https://www.airbnb.pt/experiences/167283" class="tour-buttonLink">Check Tour</a>
                </div>
            </div>
            
            <!--
            <h2>What our clients think</h2>
            <div class="comments-row">
                <div class="comments-col">
                    <div>
                        <div class="com-img"><img src="imagens/user1.jpg"></div>
                        <div class="com-name"><h3>Puneh</h3></div>
                    </div>
                    <div>
                        <p class="paragraph-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium tortor arcu, eu tempus lectus sagittis quis.</p>
                    </div>
                </div>
                <div class="comments-col">
                    <div>
                        <div class="com-img"><img src="imagens/user2.jpg"></div>
                        <div class="com-name"><h3>Jess</h3></div>
                    </div>
                    <div>
                        <p class="paragraph-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus placerat vitae. Integer fringilla lorem eget commodo vestibulum. Donec pretium tortor arcu, eu tempus lectus sagittis quis.</p>
                    </div>    
                </div>
            </div>
        -->
        </section>

        <footer class="footer" id="contact">
            <div class="footer-column footer-about">
                <h3 class="company-title">aDayinPorto</h3>
                <div class="footer-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus
                    placerat vitae.
                    Integer fringilla lorem eget commodo vestibulum. Donec pretium tortor arcu, eu tempus lectus sagittis quis.
                    <br>Cras vel justo mi. Mauris consectetur eget nisl non congue.<br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula finibus risus, sit amet egestas lectus
                    placerat vitae.
                </div>
            </div>

            <!--<div class="footer-column footer-legal">
                <a class="footer-policies">Privacy Policy & Terms and Conditions</a>
            </div>-->
            
            <div class="footer-column footer-contact">
                <h3 class="footer-title">Contact info</h3>
                <a class="footer-contact-phone" target="_blank" href="tel:+351 916 541 852">
                    <i class="footer-contact-icon fa fa-phone"></i>
                    (+351) 916 541 852
                </a>
            
                <a class="footer-contact-mail" target="_blank" href="mailto:adayinporto@gmail.com">
                    <i class="footer-contact-icon fa fa-envelope"></i>
                    adayinporto@gmail.com
                </a>
            </div>

            <div class="footer-column footer-contact">
                <h3 class="footer-title">Our Social Media</h3>
                <!--
                <a class="social-platform" target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g189180-d4137824-Reviews-Taste_Porto_Food_Tours-Porto_Porto_District_Northern_Portugal.html">
                    <i class="social-platform-icon fab fa-tripadvisor"></i>
                </a>
                <a class="social-platform" target="_blank" href="">
                    <i class="social-platform-icon fab fa-twitter"></i>
                </a>
                <a class="social-platform" target="_blank" href="https://www.youtube.com/channel/UCWWG4QPG8QFUJVZHKcPjcHg">
                    <i class="social-platform-icon fab fa-youtube"></i>
                </a>
                -->
                <a class="social-platform" target="_blank" href="https://www.facebook.com/adayinporto/">
                    <i class="social-platform-icon fa fa-facebook-square"></i>
                </a>
                <a class="social-platform" target="_blank" href="https://www.instagram.com/adayindouro/">
                    <i class="social-platform-icon fa fa-instagram"></i>
                </a>
            </div>
        </footer>
        
        <script>
        var navLinks = document.getElementById("navLinks");

        function openmenu(){
            navLinks.style.right = "0";
        }
        function closemenu(){
            navLinks.style.right = "-200px";
        }

        var navbar = document.getElementById("navbar");

        window.onscroll = () => {
            if (window.scrollY != 0) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        };
        </script>
    </body>
</html>