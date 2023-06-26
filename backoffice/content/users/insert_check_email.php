<?php

require('../../../assets/scripts/db/connect.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $checkdb = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $checkdb);

    if ($result && mysqli_num_rows($result) > 0) {
        $availability = array(
            'status' => 'unavailable',
            'message' => 'Este Email já existe.'
        );
        echo json_encode($availability);
    }

    
}
?>