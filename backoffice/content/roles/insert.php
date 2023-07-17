<?php
if(isset($_POST['role'])) {
        $role = $_POST['role'];
        $perm = $_POST['permissionlist'];



        $checkdb = "SELECT * FROM role WHERE name='$role'";
        $result = mysqli_query($conn, $checkdb);
        if ($result && mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO role(name) VALUES('$role')";
            $regist = mysqli_query($conn, $sql);
            if (!$regist) {
                echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
            } else {

                $getid = "SELECT id FROM role where name='$role'";
                $id_result = mysqli_query($conn, $getid);
                $row = mysqli_fetch_array($id_result);
                $id = $row['id'];

                if ($id_result && mysqli_num_rows($id_result) == 1) {
                    foreach ($perm as $p) {
                        $p_sql = "INSERT INTO role_permission(role, permission) VALUES ('$id', '$p')";
                        $p_result = mysqli_query($conn, $p_sql);
                    }
                echo "<p style='color:#40bf64;'> Registo inserido com sucesso. </p>";
                echo "<script>setTimeout(function() { window.location.href = './?p=5'; }, 1000);</script>";
                exit();
                }      
            }
        } else
            echo "<p> Esse registo já existe. </p>";
}
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
    <h3 style="text-align:left;">Inserir role</h3>
    <hr>
    <form method="post">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>Role</p>
                <input class="input-long-text" type="text" placeholder="Enter Role.." name="role" required>
            </div>
            <div>
                <p>Permissões</p>
            </div>
            <div>
                <?php
                $query = "SELECT * FROM permission order by id;";
                if ($show = mysqli_query($conn, $query)) {
                    while ($row = mysqli_fetch_assoc($show))
                        echo "<input type='checkbox' name='permissionlist[]' value='" . $row['id'] . "'>" . $row['description'] . "</input> <br>";
                } else {
                    echo "Não foram encontrados registos.";
                }
                ?>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="insert-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Inserir">
            <a href="?p=5"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>