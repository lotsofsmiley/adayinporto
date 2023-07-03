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
    <link rel="stylesheet" href="./tours/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ce285c7720.js" crossorigin="anonymous"></script>
    <script src="path/to/jquery.min.js"></script>
    <script>
        function createXMLHttpRequest() {
            if (window.XMLHttpRequest) {
                return new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } else {
                console.error("XMLHttpRequest is not supported by this browser.");
                return null;
            }
        }
    </script>
</head>

<body>
    <nav class="navbar" id="navbar">
        <!--<a class="company-title noSelect" href="./?p=0">aDayinPorto</a>-->
        <div class="nav-logo-container">
            <img src="./resources/_images/full_nobg_logo.png" alt="aDayinDouro" class="logo-image noSelect">
        </div>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="closemenu()"></i>
            <ul id="menu">
                <?php if (isset($_SESSION['permissions']) && in_array('BACKOFFICE_ACCESS', $_SESSION['permissions'])) { ?>
                    <li class="nav-items menu-sub-item"><a class="noSelect" id="backoffice" href="./backoffice/index.php">BackOffice</a></li>
                <?php } ?>
                <li class="nav-items menu-sub-item"></li>
                <li class="nav-items menu-sub-item"><a class="noSelect" href="./?p=0">HOME</a></li>
                <!-- <li class="nav-items menu-sub-item"><a class="noSelect" href="./?p=1">ABOUT</a></li>-->
                <li class="nav-items menu-sub-item"><a class="noSelect" href="index.php#about">ABOUT</a></li>
                <li class="nav-items menu-sub-item"><a class="noSelect" href="./?p=2">TOURS</a></li>
                <!-- <li class="nav-items menu-sub-item"><a class="noSelect" href="./?p=3">CONTACT</a></li> -->
                <li class="nav-items menu-sub-item"><a class="noSelect" href="index.php#contact">CONTACT</a></li>
                <!-- <li class="nav-items menu-sub-item"><a class="noSelect" href="./?p=6">FAQ's</a></li> -->
                <li class="nav-items menu-sub-item"></li>

                <li class="menu-sub-item responsive-profile">
                    <a class="noSelect" href="./client/account/index.php">
                        <span class="material-icons-outlined"> manage_accounts </span>
                        PROFILE
                    </a>
                </li>
                <li class="menu-sub-item responsive-profile">
                    <a class="noSelect" href="./client/login/logout.php">
                        <span class="material-icons-outlined"> logout </span>
                        LOG OUT
                    </a>
                </li>

                <?php if (!isset($_SESSION['logged'])) { ?>
                    <li class="nav-items menu-sub-item"><a class="noSelect" href="./client/login/login.php">LOG IN</a></li>
                <?php } else { ?>
                    <li class="nav-items nav-profile">
                        <img src="./resources/_images/user.png" class="profile" />
                        <ul class="dropdown">
                            <li class="sub-item">
                                <a class="noSelect" href="./client/account/index.php">
                                    <span class="material-icons-outlined"> manage_accounts </span>
                                    PROFILE
                                </a>
                            </li>
                            <li class="sub-item">
                                <a class="noSelect" href="./client/login/logout.php">
                                    <span class="material-icons-outlined"> logout </span>
                                    LOG OUT
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </div>
        <i class="fa fa-bars" onclick="openmenu()"></i>
    </nav>

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
                case 21:
                    include("./tours/tour.php");
                    break;

            case 3:
                include("./contact/index.php");
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