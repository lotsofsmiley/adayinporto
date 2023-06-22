<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $operation = $_GET['operation'];
    if (empty($id) || $operation != "editar") {
        echo "Erro, pedido inválido";
        exit();
    }
} else {
    echo "Erro, pedido inválido";
    exit();
}
$sql = "SELECT * FROM gender WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo 'Falha na consulta: ' . mysqli_error($conn);
} else
    $row = mysqli_fetch_assoc($result);


?>
<style>
    p {
        display: inline-block;
        font-size: 20px;
    }

    input {
        margin-left: 1rem;
    }
</style>
<div>

    <h3 style="text-align:left;">Editar género</h3>
    <hr>
    <form method="post" action="?p=64">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>ID</p>
                <input type="text" placeholder="Enter ID.." name="id" value="<?= $row['id'] ?>" readonly>
            </div>
            <div>
                <p>Descrição</p>
                <input class="input-long-text" type="text" placeholder="Enter Description.." name="description" value="<?= $row['description'] ?>" required>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
            <a href="?p=6"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>