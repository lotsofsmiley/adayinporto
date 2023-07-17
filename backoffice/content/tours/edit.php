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

    $checkdb = "SELECT * FROM tour WHERE name='$name' and id != '$id'";
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
            echo "<p style='color:#40bf64;'> Registo editado com sucesso. </p>";
            echo "<script>setTimeout(function() { window.location.href = './?p=1'; }, 1000);</script>";
            exit();
        }
    } else
        die("<p> Esse registo já existe. </p>");
}
