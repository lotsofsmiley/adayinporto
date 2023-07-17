<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nacionality = $_POST['nacionality'];
    $verified = $_POST['verified'];
    $birth = $_POST['birth'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $nacionality = mysqli_real_escape_string($conn, $nacionality);
    $birth = mysqli_real_escape_string($conn, $birth);
    $role = mysqli_real_escape_string($conn, $role);


    $checkdb = "SELECT * FROM user WHERE (email='$email' or phone_number='$phone') and id != '$id'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "UPDATE user SET 
                    name = '$name' 
                    , email = '$email' 
                    , phone_number = '$phone' 
                    , nacionality = '$nacionality' 
                    , birthdate = '$birth'
                    , verified = '$verified'
                    , gender = '$gender'
                    , role = '$role'
                    WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("echo '<p> Erro ao editar registo. <br>' . mysqli_error($conn)");
        } else {
            echo "<p style='color:#40bf64;'> Registo editado com sucesso. </p>";
            echo "<script>setTimeout(function() { window.location.href = './?p=2'; }, 1000);</script>";
            exit();
        }
    } else
        die("<p> Esse registo já existe. Email/NºTelemóvel repetidos</p>");
}
