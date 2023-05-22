<!DOCTYPE html>

<?php

if(!isset($_SESSION))
    session_start();
$op = 0;
if(isset($_GET['p']))
    $op = $_GET['p'];

require('./scripts/db/connect.php');
?>



<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>aDayinPorto</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ce285c7720.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header style="padding-top:1rem; background:black; color:white;">
            <h1 style="text-align: center; font-weight:300;">BackOffice</h1> <br>
        </header>
        <section>
            <nav id="navbar">   
            <a class="company-title noSelect" href="./?p=0">aDayinPorto</a>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="closemenu()"></i>
                    <ul id="menu">
                        <li><a class="noSelect" href="./?p=0">HOME</a></li>
                        <li><a class="noSelect" href="./?p=1">TOURS</a></li>
                        <li><a class="noSelect" href="./?p=2">USERS</a></li>
                        <li><a class="noSelect" href=""></a></li>
                        <li><a class="noSelect" href="./?p=4">LOGIN</a></li>
                        <!--<li><a class="button" href="./?p=5">Logout</a></li>-->
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="openmenu()"></i>
            </nav>
        </section>
        <section style="padding:2rem;">
        <?php
            switch($op)
            {
                case 0: include("./content/home.php"); break;

                case 1: include("./content/tours/tours.php"); break;
                    case 11: include("./content/tours/insert.php"); break;
                    case 12: include("./content/tours/delete.php"); break;
                    case 14: include("./content/tours/edit.php"); break;
                    case 15: include("./content/tours/editForm.php"); break;

                case 2: include("./content/users.php"); break;

                case 3: include("./content/contact.php"); break;

                case 4: include("./content/login.php"); break;

                case 5: include("./content/logout.php"); break;

                default: echo "<h3> Conteudo Inválido ($op) </h3>";
            }
        ?>
        </section>
    </body>
</html>