<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    $operacao = isset($_GET['operacao']) ? mysqli_real_escape_string($conn, $_GET['operacao']) : '';

    var_dump($id, $operacao); // Add this line for debugging purposes

    if (empty($id) || $operacao !== "eliminar") {
        echo "Erro, pedido inválido";
        exit();
    }
} else {
    echo "Erro, pedido inválidoa";
    exit();
}

$sql = "SELECT * FROM tour WHERE id_tour = '$id'";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    echo 'Falha na consulta: ' . mysqli_error($conn);
} else {
    $sql = "DELETE FROM tour WHERE id_tour='$id'";
    if (!mysqli_query($conn, $sql)) {
        echo "ERRO - Falha ao executar o comando: \"$sql\" <br>" . mysqli_error($conn);
    } else {
        header('Location: ./?p=1');
        exit();
    }
}
?>