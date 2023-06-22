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
<style>

</style>

<body>
    <header>
        <h1>BackOffice</h1> <br>
    </header>
    <section>
        <nav>
            <a class="company-title noSelect" href="../index.php">aDayinPorto</a>
        </nav>
    </section>
    <section>
        <div class="sidenav">
            <a class="noSelect" href="./?p=1">TOURS</a>
            <a class="noSelect" href="./?p=3">BOOKINGS</a>
            <a class="noSelect" href="./?p=2">USERS</a>
            <a class="noSelect" href="./?p=6">GENDER</a>
            <a class="noSelect" href="./?p=5">ROLES</a>
            <a class="noSelect" href="./?p=4">PERMISSIONS</a>
            <a class="noSelect" href="./?p=7">SOCIALS</a>
        </div>
        <div class="main">
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
                    include("./content/users/users.php");
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

                case 3:
                    include("./content/bookings/bookings.php");
                    break;
                    case 31:
                        include("./content/bookings/insert.php");
                        break;
                    case 32:
                        include("./content/bookings/delete.php");
                        break;
                    case 34:
                        include("./content/bookings/edit.php");
                        break;
                    case 35:
                        include("./content/bookings/editForm.php");
                        break;

                case 4:
                    include("./content/permissions/permissions.php");
                    break;
                    case 41:
                        include("./content/permissions/insert.php");
                        break;
                    case 42:
                        include("./content/permissions/delete.php");
                        break;
                    case 44:
                        include("./content/permissions/edit.php");
                        break;
                    case 45:
                        include("./content/permissions/editForm.php");
                        break;

                case 5:
                    include("./content/roles/roles.php");
                    break;
                    case 51:
                        include("./content/roles/insert.php");
                        break;
                    case 52:
                        include("./content/roles/delete.php");
                        break;
                    case 54:
                        include("./content/roles/edit.php");
                        break;
                    case 55:
                        include("./content/roles/editForm.php");
                        break;

                case 6:
                    include("./content/gender/gender.php");
                    break;
                    case 61:
                        include("./content/gender/insert.php");
                        break;
                    case 62:
                        include("./content/gender/delete.php");
                        break;
                    case 64:
                        include("./content/gender/edit.php");
                        break;
                    case 65:
                        include("./content/gender/editForm.php");
                        break;

                case 7:
                    include("./content/socials/socials.php");
                    break;
                    case 71:
                        include("./content/socials/insert.php");
                        break;
                    case 72:
                        include("./content/socials/delete.php");
                        break;
                    case 74:
                        include("./content/socials/edit.php");
                        break;
                    case 75:
                        include("./content/socials/editForm.php");
                        break;



                default:
                    echo "<h3> Conteudo Inválido ($op) </h3>";
            }
            ?>
        </div>
    </section>
</body>

</html>