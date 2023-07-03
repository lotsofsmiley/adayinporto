<?php
session_start();

require('../../assets/scripts/db/connect.php');


$stmt = $conn->prepare('SELECT u.email, u.name, u.phone_number, u.nacionality, u.birthdate, u.creation_date, u.verified, u.gender, r.name
                       FROM user u
                       JOIN role r ON u.role = r.id
                       WHERE u.id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email, $name, $phone, $nacionality, $birth, $creation, $verified, $gender, $role);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="./styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="profile">
    <div class="content">


        <h2>
            <label for="return">
                <a href="../../index.php"><i class="fas fa-chevron-left"></i></a>
            </label>
            Perfil
        </h2>

        <div>
            <p>Detalhes da conta: </p>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><?= $name ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $email ?></td>
                </tr>
                <tr>
                    <td>Nº Telemóvel:</td>
                    <td><?= $phone ?></td>
                </tr>
                <tr>
                    <td>Nacionalidade:</td>
                    <td><?= $nacionality ?></td>
                </tr>
                <tr>
                    <td>Data de nascimento:</td>
                    <td><?= $birth ?></td>
                </tr>
                <tr>
                    <td>Género:</td>
                    <td><?= $gender ?></td>
                </tr>
                <?php if ($role != '1') { ?>
                    <tr>
                        <td>Cargo:</td>
                        <td><?= $role ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <p class="change-pass">
                <a href="../register/index.php">Alterar palavra-passe</a>
            </p>
        </div>
    </div>
</body>

</html>