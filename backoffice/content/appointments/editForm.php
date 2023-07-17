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
$sql = "SELECT t.tour_limit, a.id, u.name as user, a.id_user as id_user, t.name as tour, a.id_tour as id_tour, a.start, a.book_date as book, a.payment_date as payment, a.cancel_date as cancel, a.reason, a.number_people 
        FROM appointment a JOIN user u ON u.id = a.id_user JOIN tour t ON t.id = a.id_tour 
        WHERE a.id = '$id'";
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
    <form method="post" action="?p=34">
        <div style="margin-top: 0.5rem; line-height: 2; display:flex;">
            <div style="margin-right:2rem;">
                <input type="hidden" name="id_tour" value="<?= $row['id_tour'] ?>">
                <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">

                <div>
                    <p>ID</p>
                    <input class="number" type="number" placeholder="Enter Name.." name="id" value="<?= $row['id'] ?>" readonly>
                </div>
                <div>
                    <p>User</p>
                    <select name="gender"' name="gender"' required>
                        <?php
                        $showuser = "SELECT * FROM user ORDER BY id;";
                        if ($showuser = mysqli_query($conn, $showuser)) {
                            while ($rowuser = mysqli_fetch_assoc($showuser)) {
                                echo "<option value='" . $rowuser['id'] . "'";
                                if ($rowuser['id'] === $row['id_user']) {
                                    echo " selected";
                                }
                                echo ">" . $rowuser['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <p>Tour</p>
                    <select name="gender"' name="gender"' required>
                        <?php
                        $showtour = "SELECT * FROM tour ORDER BY id;";
                        if ($showtour = mysqli_query($conn, $showtour)) {
                            while ($rowtour = mysqli_fetch_assoc($showtour)) {
                                echo "<option value='" . $rowtour['id'] . "'";
                                if ($rowtour['id'] === $row['id_tour']) {
                                    echo " selected";
                                }
                                echo ">" . $rowtour['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <p>Nº de pessoas</p>
                    <input type="number" max="<?= $row['tour_limit'] ?>" placeholder="Enter People Number.." name="number_people" value="<?= $row['number_people'] ?>" required>
                </div>
                <div>
                    <p>Data do tour</p>
                    <input type="date" name="start" value="<?= $row['start'] ?>" required>
                </div>
                <div>
                    <p>Data/hora da marcação</p>
                    <input type="datetime-local" name="book" value="<?= $row['book'] ?>">
                </div>
                <div>
                    <p>Data/hora do pagamento</p>
                    <input type="datetime-local" name="payment" value="<?= $row['payment'] ?>">
                </div>
                <div>
                    <p>Data/hora do cancelamento</p>
                    <input type="datetime-local" name="cancel" value="<?= $row['cancel'] ?>">
                </div>
            </div>
            <div>
                <div>
                    <p>Motivo do cancelamento</p>
                </div>
                <div>
                    <textarea name="reason" placeholder="Enter Cancel Reason.." cols="50" rows="10" minlength="1" maxlength="500" height="100px" style="resize:none" required> <?php echo $row['reason'] ?> </textarea>

                </div>
            </div>
        </div>


</div>
<div style="margin-top: 0.5rem;">
    <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
    <a href="?p=3"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
</div>
</div>
</form>
</div>