<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tag = $_POST['tag'];
    $desc = $_POST['description'];

    $tag = mysqli_real_escape_string($conn, $tag);
    $desc = mysqli_real_escape_string($conn, $desc);

    $checkdb = "SELECT * FROM permission WHERE tag='$tag'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "UPDATE permission SET
                tag = '$tag',
                description = '$desc' 
                where id = '$id'";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("echo '<p> Erro ao editar registo. <br>' . mysqli_error($conn)");

        } else {
            header("location: ./?p=4");
            exit();
        }
    } else
    die("<p> Esse registo já existe. </p>");
}