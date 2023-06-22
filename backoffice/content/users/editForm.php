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
$sql = "SELECT * FROM tour WHERE id = '$id' ";
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

    <h3 style="text-align:left;">Editar tour</h3>
    <hr>
    <form method="post" action="?p=14">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>ID</p>
                <input type="text" placeholder="Enter ID.." name="id" value="<?= $row['id'] ?>" readonly>
            </div>
            <div>
                <p>Nome</p>
                <input class="input-long-text" type="text" placeholder="Enter Tour name.." name="name" value="<?= $row['name'] ?>" required>
            </div>
            <div>
                <p>Preço Unitário</p>
                <input type="number" placeholder="Enter Value.." name="price" min="1" value="<?= $row['price_unit'] ?>" required>
            </div>
            <div>
                <p>Fim Previsto</p>
                <input type="time" placeholder="Enter Value.." name="end" value="<?= $row['ending'] ?>" required>
            </div>
            <div>
                <p>Limite Pessoas</p>
                <input type="number" placeholder="Enter Value.." name="lim" min="1" value="<?= $row['tour_limit'] ?>" required>
            </div>
            <div>
                <p>Descrição do Tour</p>
            </div>
            <div>
                <textarea name="desc" cols="50" rows="10" minlength="1" maxlength="500" height="100px" style="resize:none" required> <?php echo $row['description'] ?> </textarea>
            </div>
            <div style="margin-top: 0.5rem;">
                <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
                <a href="?p=1"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
            </div>
        </div>
    </form>
</div>