<?php 
session_start();

require('../../assets/scripts/db/connect.php');

if (!isset($_POST['email'], $_POST['password'])) {
    exit('Fill up the form correctly!');
}

if ($stmt = $conn->prepare('SELECT id, name, role, password FROM user AS u WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $role, $password);
        $stmt->fetch();

        if (sha1($_POST['password']) == $password) {
            session_regenerate_id();
            $_SESSION['logged'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
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
            echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
            echo 'Incorrect username and/or password!';
        }
    } else {
        echo 'Incorrect username and/or password!';
    }
    $stmt->close();
}
?>