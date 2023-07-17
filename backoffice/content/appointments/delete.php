<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    $operacao = isset($_GET['operation']) ? mysqli_real_escape_string($conn, $_GET['operation']) : '';

    if (empty($id) || $operacao !== "eliminar") {
        echo "Erro, pedido inválido";
        exit();
    }
} else {
    echo "Erro, pedido inválido";
    exit();
}

$sql = "SELECT * FROM appointment WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    echo 'Falha na consulta: ' . mysqli_error($conn);
} else {
    $cancelDateTime = date('Y-m-d H:i:s');
    $sql = "UPDATE appointment SET cancel_date = '$cancelDateTime' WHERE id = '$id'";
    if (!mysqli_query($conn, $sql)) {
        echo "ERRO - Falha ao executar o comando: \"$sql\" <br>" . mysqli_error($conn);
    } else {
        header('Location: ./?p=3');
        exit();
    }
}
