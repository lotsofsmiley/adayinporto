<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $operacao = $_GET['operacao'];
    if (empty($id) || $operacao!="eliminar"){
    echo "Erro, pedido inválido";
    exit();
}
}
else {
    echo "Erro, pedido inválido";
    exit();
}

$sql = "SELECT * FROM tour  WHERE id_tour = '$id' ";
$resultado = mysqli_query($conn,$sql);

if (!$resultado) {
    echo 'Falha na consulta: '. mysqli_error($conn);
}
else {
    $sql = "DELETE FROM tours WHERE id_tour='$id'";
    if (!mysqli_query($conn,$sql)) {
        echo " ERRO - Falha ao executar o comando: \"$sql\" <br>". mysqli_error($conn);
    }
    else{
            header('location: ./?p=1');
    }
}


?>