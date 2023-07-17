<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $cat = $_POST['category'];
    $val = $_POST['value'];
    $class = $_POST['icon_class'];

    $cat = mysqli_real_escape_string($conn, $cat);
    $val = mysqli_real_escape_string($conn, $val);
    $class = mysqli_real_escape_string($conn, $class);

    $checkdb = "SELECT * FROM social_media WHERE category='$cat' AND id != '$id'";
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
            echo "<p style='color:#40bf64;'> Registo editado com sucesso. </p>";
            echo "<script>setTimeout(function() { window.location.href = './?p=5'; }, 1000);</script>";
            exit();
        }
    } else
        die("<p> Esse registo já existe. </p>");
}
