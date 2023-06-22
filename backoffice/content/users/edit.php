<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $end = $_POST['end'];
    $lim = $_POST['lim'];
    $desc = $_POST['desc'];

    $name = mysqli_real_escape_string($conn, $name);
    $desc = mysqli_real_escape_string($conn, $desc);

    $checkdb = "SELECT * FROM tour WHERE name='$name'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "UPDATE tour SET 
                    name = '$name' 
                    , price_unit = '$price' 
                    , ending = '$end' 
                    , tour_limit = '$lim' 
                    , description = '$desc'
                    WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("echo '<p> Erro ao editar registo. <br>' . mysqli_error($conn)");
        } else {
            header("location: ./?p=1");
            exit();
        }
    } else
        die("<p> Esse registo já existe. </p>");
}
