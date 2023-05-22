<?php
require('../db/connect.php');

if(isset($_POST['userid']))
{
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $password = sha1($_POST['pass']);

    $sql = "SELECT id, nome, tipo FROM users WHERE id = '$userid' AND `password`
    = '$password'";

    $login = mysqli_query($conn, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $row = mysqli_fetch_assoc($login);
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['nome'];
        $_SESSION['tipo'] = $row['tipo'];
        header("location: ../");
    }
    else
        echo "<p style='color:white;'>ERRO!! - Utilizador ou password inválidos.</p>".mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styleslogin.css">
    </head>
    <body>
        <!--<form method="post">
            <div class="centered">
                <div class="box1">
                    <h1>M7A - Empresa</h1>
                    <h2>Redes de comunicação</h2>
                    <p>M7A - Acesso a bases de dados via web</p>
                </div>
                <div class="box2">
                    <br>
                    <p><b>ID </b></p>
                    <p><input type="text" placeholder="Enter ID.." name="userid" required></p>

                    <p><b>Password </b></p>
                    <p><input type="password" placeholder="Enter Password.." name="pass" required></p>

                    <p><input type="submit" value="Login"> <input type="reset" name="limpar" value="Limpar"></p>
                </div>
            </div>
        </form>-->
        <form action="#" method="post" class="form login">
            <div class="form__field">
                <label for="login__username">
                        <svg class="icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                        </svg>
                        <span class="hidden">Username</span>
                    </label>
                    <input id="login__username" type="text" name="username" class="form__input" placeholder="Username" required="">
                </div>
                <div class="form__field">
                    <label for="login__password">
                        <svg class="icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use>
                        </svg>
                        <span class="hidden">Password</span>
                    </label>
                    <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required="">
                </div>
                <div class="form__field">
                    <input type="submit" value="Sign In">
            </div>
        </form>
    </body>
</html>
