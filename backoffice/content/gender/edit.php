<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $desc = $_POST['description'];

    $desc = mysqli_real_escape_string($conn, $desc);

    $checkdb = "SELECT * FROM gender WHERE description='$desc'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "UPDATE gender SET 
                description = '$desc' 
                where id = '$id'";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("echo '<p> Erro ao editar registo. <br>' . mysqli_error($conn)");

        } else {
            header("location: ./?p=6");
            exit();
        }
    } else
        die("<p> Esse registo já existe. </p>");
}

