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
$sql = "SELECT * FROM role WHERE id = '$id' ";
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

    <h3 style="text-align:left;">Editar Role</h3>
    <hr>
    <form method="post" action="?p=54">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>ID</p>
                <input type="text" placeholder="Enter ID.." name="id" value="<?= $row['id'] ?>" readonly>
            </div>
            <div>
                <p>Nome</p>
                <input class="input-long-text" type="text" placeholder="Enter Name.." name="name" value="<?= $row['name'] ?>" required>
            </div>
                        <div>
                <p>Permissões</p>
            </div>
            <div>
                <?php
                $query = "SELECT * FROM permission ORDER BY id;";
                if ($show = mysqli_query($conn, $query)) {
                    $rolePermissions = array();
                    while ($row = mysqli_fetch_assoc($show)) {
                        $permissionId = $row['id'];
                        $checked = '';

                        $permissionQuery = "SELECT COUNT(*) AS count FROM role_permission WHERE role = '$id' AND permission = '$permissionId';";
                        $permissionResult = mysqli_query($conn, $permissionQuery);
                        $permissionRow = mysqli_fetch_assoc($permissionResult);

                        if ($permissionRow['count'] > 0) {
                            $checked = 'checked';
                        }

                        echo "<input type='checkbox' name='permissionlist[]' value='" . $permissionId . "' $checked>" . $row['description'] . "</input> <br>";
                    }
                } else {
                    echo "Não foram encontrados registos.";
                }?>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
            <a href="?p=5"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>