<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <form action="authenticate.php" method="post">
            <div class="input">
                <label for="email">
                    <i class="fas fa-user"></i>
                </label>
                <input type="email" name="email" placeholder="Email" id="email" required>
            </div>
            <div class="input">
                <label for="password">
                    <i class="fas fa-lock"></i>
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required>

                <a href="../account/send-email.php">
                    Recuperar palavra-passe.
                </a>
            </div>

            <div class="register-link">
                <a href="../register/index.php">Não possui uma conta? Crie uma!</a>
            </div>
            <div class="buttons">
                <a class="return-button" href="../../index.php"><input class="return-button" type="button" value="Voltar"></a>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>

</html>