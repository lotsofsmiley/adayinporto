<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $cat = $_POST['category'];
    $val = $_POST['value'];
    $class = $_POST['icon_class'];

    $cat = mysqli_real_escape_string($conn, $cat);
    $val = mysqli_real_escape_string($conn, $val);
    $class = mysqli_real_escape_string($conn, $class);

    if (empty($id) || empty($cat) || empty($val) || empty($class)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    
}
else{
    echo " ERRO - Não foi possível executar a operação editar. ";
    exit();
}


$sql = "UPDATE social_media SET 
        category = '$cat'
        , value = '$val'
        , icon_class = '$class'
        WHERE id = '$id'";

if (!mysqli_query($conn,$sql)) {
    echo " ERRO - Falha ao executar o comando: \"$sql\" <br>". mysqli_error($conn);
}
else{
        header('location: ./?p=7');
}
?>

