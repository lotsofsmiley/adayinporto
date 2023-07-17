<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $perm = isset($_POST['permissionlist']) ? $_POST['permissionlist'] : array();

    $name = mysqli_real_escape_string($conn, $name);

    $checkdb = "SELECT * FROM role WHERE name='$name' AND id != '$id'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "UPDATE role SET name = '$name' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("echo '<p> Erro ao editar registo. <br>' . mysqli_error($conn)");
        } else {
            if(empty($perm)){
                $deleteSql = "DELETE FROM role_permission WHERE role = '$id'";
                $deleteResult = mysqli_query($conn, $deleteSql);
                if (!$deleteResult) {
                    die("echo '<p> Erro ao apagar permissões. <br>' . mysqli_error($conn)");
                }
            }
            else{
                $deleteQuery = "DELETE FROM role_permission WHERE role = '$id' AND permission NOT IN (" . implode(',', $perm) . ")"; 
                //exemplo: implode() forma o array em uma string que separa o array em virgulas: array[1,2,3] vai ser por exemplo '1,2,3'. Então permissions NOT IN (1,2,3) 
                $deleteResult = mysqli_query($conn, $deleteQuery);
                if (!$deleteResult) {
                    die("echo '<p> Erro ao apagar permissões. <br>' . mysqli_error($conn)");
                }

                foreach ($perm as $p) {
                    $permissionQuery = "SELECT * FROM role_permission WHERE role = '$id' AND permission = '$p'";
                    $permissionResult = mysqli_query($conn, $permissionQuery);
                    if ($permissionResult && mysqli_num_rows($permissionResult) == 0) {
                        $insertQuery = "INSERT INTO role_permission (role, permission) VALUES ('$id', '$p')";
                        $insertResult = mysqli_query($conn, $insertQuery);
                        if (!$insertResult) {
                            die("echo '<p> Erro ao inserir permissões. <br>' . mysqli_error($conn)");
                        }
                    }
                }
            }
            header("location: ./?p=5");
            exit();
        }
    } else
        die("<p> Esse registo já existe. </p>");
}

if(isset($_POST['role'])) {
    if (isset($_POST['permissionlist'])) {
        $role = $_POST['role'];
        $perm = $_POST['permissionlist'];



        $checkdb = "SELECT * FROM role WHERE name='$role' where id != '$id'";
        $result = mysqli_query($conn, $checkdb);
        if ($result && mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO role(name) VALUES('$role')";
            $regist = mysqli_query($conn, $sql);
            if (!$regist) {
                echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
            } else {


                if ($id_result && mysqli_num_rows($id_result) == 1) {
                    foreach ($perm as $p) {
                        $p_sql = "INSERT INTO role_permission(role, permission) VALUES ('$id', '$p')";
                        $p_result = mysqli_query($conn, $p_sql);
                    }
                    echo "<p style='color:#40bf64;'> Registo editado com sucesso. </p>";
                    echo "<script>setTimeout(function() { window.location.href = './?p=5'; }, 1000);</script>";
                }      
            }
        } else
            echo "<p> Esse registo já existe. </p>";
    } else {
        echo "<p> Selecione alguma permissão. </p>";
    }
}
?>