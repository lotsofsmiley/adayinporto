<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET['id'];
            $operacao = $_GET['operacao'];
            if (empty($id) || $operacao!="editar"){
            echo "Erro, pedido inválido";
            exit();
        }
    }
    else{
        echo "Erro, pedido inválido";
        exit();
}    
$sql = "SELECT * FROM tour WHERE id_tour = '$id' ";
$resultado = mysqli_query($conn,$sql);

if (!$resultado) {
    echo 'Falha na consulta: '. mysqli_error($conn);
}
else
    $row = mysqli_fetch_assoc($resultado); 


?>
<style>
    p {
        display: inline-block;
    }
    input {
        margin-left: 1rem;
    }
</style>
<div>
    
    <h3 style="text-align:left;">Editar Departamento</h3>
    <hr>
    <form method="post" action="?p=14">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>ID</p>
                <input type="text" placeholder="Enter ID.." name="id" value="<?=$row['id_tour']?>" readonly>
            </div>
            <div>
                <p>Nome</p>
                <input type="text" placeholder="Enter Tour name.." name="nome" value="<?=$row['nome']?>" required>
            </div>
            <div>
                <p>Preço Unitário</p>
                <input type="number" placeholder="Enter Value.." name="preco" min="1" value="<?=$row['preco_unit']?>" required>
            </div>
            <div>
                <p>Fim Previsto</p>
                <input type="time" placeholder="Enter Value.." name="fim" value="<?=$row['fim_previsto']?>" required>
            </div>
            <div>
                <p>Limite Pessoas</p>
                <input type="number" placeholder="Enter Value.." name="lim" min="1" value="<?=$row['lim_pessoas']?>" required>
            </div> 
            <div style="margin-top: 0.5rem;">
                <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
                <a href="?p=1"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
            </div>
        </div>
    </form>
</div>