<?php

session_start();
$op = 0;
if (isset($_GET['p']))
    $op = $_GET['p'];

require('./assets/scripts/db/connect.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aDayinPorto</title>
    <link rel="stylesheet" href="./resources/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/ce285c7720.js" crossorigin="anonymous"></script>
</head>

<body>
    <a id="header"></a>
    <section class="header">
        <nav class="navbar" id="navbar">
            <a class="company-title noSelect" href="./?p=0">aDayinPorto</a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="closemenu()"></i>
                <ul id="menu">
                    <li><a class="noSelect" href="./backoffice/index.php">BackOffice</a></li>
                    <li></li>
                    <li><a class="noSelect" href="./?p=0">HOME</a></li>
                    <li><a class="noSelect" href="./?p=1">ABOUT</a></li>
                    <li><a class="noSelect" href="./?p=2">TOURS</a></li>
                    <li><a class="noSelect" href="./?p=3">CONTACT</a></li>
                    <li><a class="noSelect" href="./?p=6">FAQ's</a></li>
                    <li></li>
                    <li><a class="noSelect" href="./?p=4">LOGIN</a></li>
                    <li><a class="button" href="./?p=5">logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="openmenu()"></i>
        </nav>
    </section>

    <section>
        <?php
        switch ($op) {
            case 0:
                include("./home/index.php");
                break;

            case 1:
                include("./about/index.php");
                break;

            case 2:
                include("./tours/index.php");
                break;

            case 3:
                include("./contact/index.php");
                break;

            case 4:
                include("./login/login.php");
                break;

            case 5:
                include("./login/logout.php");
                break;

            case 6:
                include("./faqs/index.php");
                break;

            default:
                echo "<h3> Conteudo Inválido ($op) </h3>";
        }
        ?>
    </section>



    <script>
        var navLinks = document.getElementById("navLinks");

        function openmenu() {
            navLinks.style.right = "0";
        }

        function closemenu() {
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