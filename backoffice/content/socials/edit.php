<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $cat = $_POST['category'];
    $val = $_POST['value'];
    $class = $_POST['icon_class'];

    $cat = mysqli_real_escape_string($conn, $cat);
    $val = mysqli_real_escape_string($conn, $val);
    $class = mysqli_real_escape_string($conn, $class);

    $checkdb = "SELECT * FROM social_media WHERE category='$cat'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "UPDATE social_media SET 
                    category = '$cat'
                    , value = '$val'
                    , icon_class = '$class'
                    WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("echo '<p> Erro ao editar registo. <br>' . mysqli_error($conn)");
        } else {
            header("location: ./?p=7");
            exit();
        }
    } else
        die("<p> Esse registo já existe. </p>");
}
