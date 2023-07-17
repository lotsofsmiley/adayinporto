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
$sql = "SELECT * FROM user WHERE id = '$id' ";
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
    <form method="post" action="?p=24">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>ID</p>
                <input class="input" type="number" placeholder="Enter Name.." name="id" value="<?= $row['id'] ?>" readonly>
            </div>
            <div>
                <p>Nome</p>
                <input class="input-long-text" type="text" placeholder="Enter Name.." name="name" value="<?= $row['name'] ?>" required>
            </div>
            <div>
                <p>Email</p>
                <input class="input-long-text" id="email" type="email" placeholder="Enter Email.." name="email" value="<?= $row['email'] ?>" required>
            </div>
            <div>
                <p>Nº Telemóvel</p>
                <input type="tel" placeholder="Enter Phone Number.." name="phone" value="<?= $row['phone_number'] ?>" required>
            </div>
            <div>
                <p>Nacionalidade</p>
                <input type="text" placeholder="Enter Nacionality.." name="nacionality" value="<?= $row['nacionality'] ?>" required>
            </div>
            <div>
                <p>Data de nascimento</p>
                <input type="date" placeholder="Enter Birthdate.." name="birth" value="<?= $row['birthdate'] ?>" required>
            </div>
            <!--<div>
                <p>Imagem de perfil</p>
                <input type="file" placeholder="Insert Image.." name="image" value="" value="">
            </div>-->
            <div>
                <p>Género</p>
                <select name="gender"' name="gender"' required>
                    <?php
                    $showgender = "SELECT * FROM gender ORDER BY id;";
                    if ($showgender = mysqli_query($conn, $showgender)) {
                        while ($rowgender = mysqli_fetch_assoc($showgender)) {
                            echo "<option value='" . $rowgender['id'] . "'";
                            if ($rowgender['id'] === $row['gender']) {
                                echo " selected";
                            }
                            echo ">" . $rowgender['description'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <p>Role</p>
                <select name="role" required>
                    <?php
                    $showrole = "SELECT * FROM role ORDER BY id;";
                    if ($showrole = mysqli_query($conn, $showrole)) {
                        while ($rowrole = mysqli_fetch_assoc($showrole)) {
                            echo "<option value='" . $rowrole['id'] . "'";
                            if ($rowrole['id'] === $row['role']) {
                                echo " selected";
                            }
                            echo ">" . $rowrole['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <p>Verificado</p>
                <select name="verified" required>
                    <?php
                    $options = [
                        0 => 'Não verificado',
                        1 => 'Verificado'
                    ];

                    foreach ($options as $value => $label) {
                        $selected = ($value == $row['verified']) ? 'selected' : '';
                        echo "<option value='$value' $selected>$label</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
            <a href="?p=2"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
</div>
</form>
</div>