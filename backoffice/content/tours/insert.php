<?php
if (isset($_POST['nome'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $fim = $_POST['fim'];
    $lim = $_POST['lim'];
    $desc = $_POST['desc'];

    $checkdb = "SELECT * FROM tour WHERE nome='$nome'";
    $result = mysqli_query($conn, $checkdb);
    if ($result && mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO tour(nome, preco_unit, fim_previsto, lim_pessoas, descricao) VALUES('$nome', '$preco', '$fim', '$lim', '$desc')";
        $regist = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
        } else {
            echo "<p> Registo inserido com sucesso. </p>";
            header("location: ./?p=1");
        }
    } else
        echo "<p> Esse tour já existe. </p>";
}
?>
<style>
    p {
        display: inline-block;
    }

    input {
        margin-left: 1rem;
    }
</style>
<div>
    <h3 style="text-align:left;">Editar Departamento</h3>
    <hr>
    <form method="post">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p style="font-size: 20px;">Nome do tour</p>
                <input type="text" placeholder="Enter Username.." name="nome" required>
            </div>
            <div>
                <p style="font-size: 20px;">Preço Unitário</p>
                <input type="number" placeholder="Enter Value.." name="preco" min="1" required>
            </div>
            <div>
                <p style="font-size: 20px;">Fim Previsto</p>
                <input type="time" placeholder="Enter Value.." name="fim" required>
            </div>
            <div>
                <p style="font-size: 20px;">Limite Pessoas</p>
                <input type="number" placeholder="Enter Value.." min="1" name="lim" required>
            </div>
            <div>
                <p style="font-size: 20px;">Descrição do Tour</p>
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