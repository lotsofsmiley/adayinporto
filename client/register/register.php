<?php
session_start();

require('../../assets/scripts/db/connect.php');

if (!isset($_POST['email'], $_POST['password'], $_POST['confpassword'])) {
    exit('Preencha os campos necessários!');
}

$email = $_POST['email'];
$password = $_POST['password'];
$confPassword = $_POST['confpassword'];


if ($password !== $confPassword) {
    exit('As passwords não são iguais!');
}
$hashedPassword = sha1($password);

if ($stmt = $conn->prepare('INSERT INTO user (email, password, role) VALUES (?, ?, ?)')) {
    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword, "1");
    $result = mysqli_stmt_execute($stmt);
}


if ($stmt = $conn->prepare('SELECT id, name, role, password FROM user AS u WHERE email = ?')) {
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $role, $password);
        $stmt->fetch();

        session_regenerate_id();
        $_SESSION['logged'] = TRUE;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        $permissions = array();
        if ($stmt = $conn->prepare('SELECT p.tag FROM role_permission AS rp JOIN permission AS p ON rp.permission = p.id WHERE rp.role = ?')) {
            $stmt->bind_param('s', $role);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($tag);
                while ($stmt->fetch()) {
                    $permissions[] = $tag;
                }
            }
            $stmt->close();
        }
        $_SESSION['permissions'] = $permissions;

        header("location: ../../index.php");
    }
    $stmt->close();
}
?>
