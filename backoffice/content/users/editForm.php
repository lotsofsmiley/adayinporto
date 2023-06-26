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
} else {
    
}
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
                <p>Nome</p>
                <input class="input-long-text" type="text" placeholder="Enter Name.." name="name" value="<?= $row['tour_limit'] ?>" required>
            </div>
            <div>
                <p>Email</p>
                <input class="input-long-text" id="email" type="email" placeholder="Enter Email.." name="email" value="<?= $row['tour_limit'] ?>" required>
            </div>
            <div>
                <p>Nº Telemóvel</p>
                <input type="tel" placeholder="Enter Phone Number.." name="phone" value="<?= $row['tour_limit'] ?>" required>
            </div>
            <div>
                <p>Nacionalidade</p>
                <input type="text" placeholder="Enter Nacionality.." name="nacionality" value="<?= $row['tour_limit'] ?>" required>
            </div>
            <div>
                <p>Data de nascimento</p>
                <input type="date" placeholder="Enter Birthdate.." name="bdate" value="<?= $row['tour_limit'] ?>" required>
            </div>
            <div>
                <p>Imagem de perfil</p>
                <input type="file" placeholder="Insert Image.." name="image" value="<?= $row['tour_limit'] ?>" value="">
            </div>
            <div>
                <p>Género</p>
                <select name="gender" required>
                    <?php
                    $showdesc = "SELECT * FROM gender order by id;";
                    if ($show = mysqli_query($conn, $showdesc))
                        while ($row = mysqli_fetch_assoc($show))
                            echo "<option value='" . $row['id'] . "'>" . $row['description'] . "</option>";
                    ?>
                </select>
            </div>
            <div>
                <p>Role</p>
                <select name="role" required>
                    <?php
                    $showrole = "SELECT * FROM role order by id;";
                    if ($show = mysqli_query($conn, $showrole))
                        while ($row = mysqli_fetch_assoc($show))
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    ?>
                </select>
            </div>
            <div>
                <p>Password</p>
                <input class="input-long-text" type="password" placeholder="Enter Password.." value="<?= $row['tour_limit'] ?>" name="password" required>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
            <a href="?p=1"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
</div>
</form>
</div>