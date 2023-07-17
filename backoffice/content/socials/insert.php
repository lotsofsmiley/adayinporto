<?php
if (isset($_POST['category'])) {
    $id = $_POST['id'];
    $cat = $_POST['category'];
    $val = $_POST['value'];
    $icon = $_POST['icon_class'];

    $cat = mysqli_real_escape_string($conn, $cat);
    $val = mysqli_real_escape_string($conn, $val);
    $icon = mysqli_real_escape_string($conn, $icon);

    $checkdb = "SELECT * FROM social_media WHERE category='$cat'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO social_media(category, value, icon_class) VALUES('$cat', '$val', '$icon')";
        $regist = mysqli_query($conn, $sql);
        if (!$regist) {
            echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
        } else {
            echo "<p style='color:#40bf64;'> Registo inserido com sucesso. </p>";
            echo "<script>setTimeout(function() { window.location.href = './?p=7'; }, 1000);</script>";
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
    <h3 style="text-align:left;">Inserir rede social</h3>
    <hr>
    <form method="post">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>Categoria</p>
                <input class="input" type="text" placeholder="Enter Category.." name="category" required>
            </div>
            <div>
                <p>Link</p>
                <input class="input-real-long-text" type="text" placeholder="Enter Link.." name="value" required>
            </div>
            <div>
                <p>Classe do Ícone</p>
                <input class="input-real-long-text" type="text" placeholder="Enter Class.." name="icon_class" required>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="insert-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Inserir">
            <a href="?p=7"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>