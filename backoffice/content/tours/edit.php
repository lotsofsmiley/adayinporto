<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $fim = $_POST['fim'];
    $lim = $_POST['lim'];
    $desc = $_POST['desc'];

    if (empty($id) || empty($nome) || empty($preco) || empty($fim) || empty($lim) || empty($desc)){
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
        , preco_unit = '$preco' 
        , fim_previsto = '$fim' 
        , lim_pessoas = '$lim' 
        , descricao = '$desc'
        WHERE id_tour='$id'";

if (!mysqli_query($conn,$sql)) {
    echo " ERRO - Falha ao executar o comando: \"$sql\" <br>". mysqli_error($conn);
}
else{
        header('location: ./?p=1');
}
?>