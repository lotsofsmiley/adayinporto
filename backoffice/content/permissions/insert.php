<?php
if (isset($_POST['tag'])) {
    $id = $_POST['id'];
    $tag = $_POST['tag'];
    $desc = $_POST['description'];

    $tag = mysqli_real_escape_string($conn, $tag);
    $desc = mysqli_real_escape_string($conn, $desc);

    $checkdb = "SELECT * FROM permission WHERE tag ='$tag'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO permission(tag, description) VALUES('$tag', '$desc')";
        $regist = mysqli_query($conn, $sql);
        if (!$regist) {
            echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
        } else {
            echo "<p style='color:#40bf64;'> Registo inserido com sucesso. </p>";
            echo "<script>setTimeout(function() { window.location.href = './?p=4'; }, 1000);</script>";
            exit();
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
    <h3 style="text-align:left;">Inserir permissão</h3>
    <hr>
    <form method="post">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>Tag</p>
                <input class="input-long-text" type="text" placeholder="Enter Tag.." name="tag" required>
            </div>
            <div>
                <p>Descrição</p>
                <input class="input-long-text" type="text" placeholder="Enter Description.." name="description" required>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="insert-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Inserir">
            <a href="?p=4"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>