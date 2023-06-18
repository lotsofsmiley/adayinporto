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

    if (empty($id) || empty($name) || empty($price) || empty($end) || empty($lim) || empty($desc)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    
}
else{
    echo " ERRO - Não foi possível executar a operação editar. ";
    exit();
}


$sql = "UPDATE tour SET 
        name = '$name' 
        , price_unit = '$price' 
        , ending = '$end' 
        , tour_limit = '$lim' 
        , description = '$desc'
        WHERE id = '$id'";

if (!mysqli_query($conn,$sql)) {
    echo " ERRO - Falha ao executar o comando: \"$sql\" <br>". mysqli_error($conn);
}
else{
        header('location: ./?p=1');
}
?>