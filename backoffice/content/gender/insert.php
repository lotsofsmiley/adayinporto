<?php
if (isset($_POST['description'])) {
    $desc = $_POST['description'];

    $checkdb = "SELECT * FROM gender WHERE description='$desc'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO gender(description) VALUES('$desc')";
        $regist = mysqli_query($conn, $sql);
        if (!$regist) {
            echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
        } else {
            echo "<p style='color:#40bf64;'> Registo inserido com sucesso. </p>";
            echo "<script>setTimeout(function() { window.location.href = './?p=6'; }, 1000);</script>";
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
    <h3 style="text-align:left;">Inserir género</h3>
    <hr>
    <form method="post">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>Descrição</p>
                <input class="input-long-text" type="text" placeholder="Enter Description.." name="description" required>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="insert-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Inserir">
            <a href="?p=6"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>