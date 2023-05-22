<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $fim = $_POST['fim'];
    $lim = $_POST['lim'];

    if (empty($id) || empty($nome) || empty($preco) || empty($fim) || empty($lim)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    
}
else{
    echo " ERRO - Não foi possível executar a operação editar. ";
    exit();
}


$sql = "UPDATE tour SET 
        nome='$nome' 
        and preco_unit = '$preco' 
        and fim_previsto = '$fim' 
        and lim_pessoas = '$lim' 
        WHERE id_tour='$id'";

if (!mysqli_query($conn,$sql)) {
    echo " ERRO - Falha ao executar o comando: \"$sql\" <br>". mysqli_error($conn);
}
else{
        header('location: ./?p=1');
}
?>