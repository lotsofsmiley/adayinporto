<?php
if (isset($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $end = $_POST['end'];
    $lim = $_POST['lim'];
    $desc = $_POST['desc'];

    $name = mysqli_real_escape_string($conn, $name);
    $desc = mysqli_real_escape_string($conn, $desc);

    $checkdb = "SELECT * FROM tour WHERE name='$name'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO tour(name, price_unit, ending, tour_limit, description) VALUES('$name', '$price', '$end', '$lim', '$desc')";
        $regist = mysqli_query($conn, $sql);
        if (!$regist) {
            echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
        } else {
            echo "<p style='color:#40bf64;'> Registo inserido com sucesso. </p>";
            echo "<script>setTimeout(function() { window.location.href = './?p=1'; }, 1000);</script>";
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
    <h3 style="text-align:left;">Inserir tour</h3>
    <hr>
    <form method="post">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>Nome do tour</p>
                <input class="input-long-text" type="text" placeholder="Enter Username.." name="name" required>
            </div>
            <div>
                <p>Preço Unitário</p>
                <input type="number" placeholder="Enter Value.." name="price" min="1" required>
            </div>
            <div>
                <p>Fim Previsto</p>
                <input type="time" placeholder="Enter Value.." name="end" required>
            </div>
            <div>
                <p>Limite Pessoas</p>
                <input type="number" placeholder="Enter Value.." min="1" name="lim" required>
            </div>
            <div>
                <p>Descrição do Tour</p>
            </div>
            <div>
                <textarea name="desc" cols="50" rows="10" minlength="1" maxlength="500" required></textarea>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="insert-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Inserir">
            <a href="?p=1"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>