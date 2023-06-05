<!DOCTYPE html>

<?php

if (!isset($_SESSION))
    session_start();
$op = 1;
if (isset($_GET['p']))
    $op = $_GET['p'];

require('../assets/scripts/db/connect.php');


?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aDayinPorto</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/ce285c7720.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h1>BackOffice</h1> <br>
    </header>
    <section>
        <nav>
            <a class="company-title noSelect" href="../index.php">aDayinPorto</a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="closemenu()"></i>
                <ul id="menu">
                    <li><a class="noSelect" href="./?p=1">TOURS</a></li>
                    <li><a class="noSelect" href="./?p=2">USERS</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="openmenu()"></i>
        </nav>
    </section>

    <section style="padding:2rem;">
        <?php
        switch ($op) {

            case 1:
                include("./content/tours/tours.php");
                break;
            case 11:
                include("./content/tours/insert.php");
                break;
            case 12:
                include("./content/tours/delete.php");
                break;
            case 14:
                include("./content/tours/edit.php");
                break;
            case 15:
                include("./content/tours/editForm.php");
                break;

            case 2:
                include("./content/users.php");
                break;
            case 21:
                include("./content/users/insert.php");
                break;
            case 22:
                include("./content/users/delete.php");
                break;
            case 24:
                include("./content/users/edit.php");
                break;
            case 25:
                include("./content/users/editForm.php");
                break;
            default:
                echo "<h3> Conteudo Inválido ($op) </h3>";
        }
        ?>
    </section>
</body>

</html>