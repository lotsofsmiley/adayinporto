<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    $operacao = isset($_GET['operation']) ? mysqli_real_escape_string($conn, $_GET['operation']) : '';

    if (empty($id) || $operacao !== "eliminar") {
        echo "Erro, pedido inválido";
        exit();
    }
} else {
    echo "Erro, pedido inválidoa";
    exit();
}

$sql = "SELECT * FROM gender WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    echo 'Falha na consulta: ' . mysqli_error($conn);
} else {


    $checkuser = "SELECT * FROM user WHERE gender = '$id'";
    $resuser = mysqli_query($conn, $checkuser);
    if ($resuser && mysqli_num_rows($resuser) == 0) {
        $sql = "DELETE FROM gender WHERE id ='$id'";
        if (!mysqli_query($conn, $sql)) {
            echo "ERRO - Falha ao executar o comando: \"$sql\" <br>" . mysqli_error($conn);
        } else {
            header('Location: ./?p=6');
            exit();
        }
    } else {
        $sql = "SELECT name FROM user WHERE gender = '$id'";

        $showuser = mysqli_query($conn, $sql);

        echo "Género necessário na tabela User.<br>";
        while ($row = mysqli_fetch_array($showuser)) {
            $name = $row['name'];
            echo "Nome: \"$name\" <br>" . mysqli_error($conn);
        }
    }
}
?>