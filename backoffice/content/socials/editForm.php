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
$sql = "SELECT * FROM social_media WHERE id = '$id' ";
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

    <h3 style="text-align:left;">Editar rede social</h3>
    <hr>
    <form method="post" action="?p=74">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>ID</p>
                <input type="text" placeholder="Enter ID.." name="id" value="<?= $row['id'] ?>" readonly>
            </div>
            <div>
                <p>Categoria</p>
                <input class="input-long-text" type="text" placeholder="Enter Category.." name="category" value="<?= $row['category'] ?>" required>
            </div>
            <div>
                <p>Link</p>
                <input class="input-real-long-text" type="text" placeholder="Enter Link.." name="value" value="<?= $row['value'] ?>" required>
            </div>
            <div>
                <p>Classe do Ícone</p>
                <input class="input-real-long-text" type="text" placeholder="Enter Class.." name="icon_class" value="<?= $row['icon_class'] ?>" required>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
            <a href="?p=7"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>