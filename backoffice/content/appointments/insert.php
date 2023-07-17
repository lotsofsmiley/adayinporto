<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $user = $_POST['id_user'];
    $tour = $_POST['id_tour'];
    $start = $_POST['start'];
    $number_people = $_POST['number_people'];
    $book = $_POST['book'];
    $payment = $_POST['payment'];



    $reason = mysqli_real_escape_string($conn, $reason);

    $tourLimitQuery = "SELECT tour_limit FROM tour WHERE id = '$tour'";
    $tourLimitResult = mysqli_query($conn, $tourLimitQuery);
    if ($tourLimitResult && mysqli_num_rows($tourLimitResult) > 0) {
        $tourLimitRow = mysqli_fetch_assoc($tourLimitResult);
        $tourLimit = $tourLimitRow['tour_limit'];

        $sumPeopleQuery = "SELECT SUM(number_people) as total_people FROM appointment WHERE id_tour = '$tour' AND start = '$start' AND id != '$id'";
        $sumPeopleResult = mysqli_query($conn, $sumPeopleQuery);
        if ($sumPeopleResult && mysqli_num_rows($sumPeopleResult) > 0) {
            $sumPeopleRow = mysqli_fetch_assoc($sumPeopleResult);
            $sumPeople = $sumPeopleRow['total_people'];

            if (($sumPeople + $number_people) <= $tourLimit) {
                $checkdb = "SELECT * FROM appointment WHERE (id_user = '$user' and id_tour = '$tour' and start = '$start') and id != '$id'";
                $result = mysqli_query($conn, $checkdb);
                if ($result && mysqli_num_rows($result) == 0) {
                    $sql = "UPDATE appointment SET 
                    id_user = '$user' 
                    , id_tour = '$tour' 
                    , start = '$start' 
                    , book_date = '$book'
                    , payment_date = '$payment'
                    , number_people = '$number_people'
                    WHERE id = '$id'";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        echo "<p style='color:#40bf64;'> Registo inserido com sucesso. </p>";
                        echo "<script>setTimeout(function() { window.location.href = './?p=3'; }, 1000);</script>";
                        exit();
                    }
                } else
                    echo"<p> Esse registo já existe. Um utilizador não pode fazer a mesma marcação para o mesmo dia.</p>";
            } else {
                echo "<p>Limite de vagas excedido. Não é possível fazer a marcação.</p>";
            }
        } else {
            echo "<p>Ocorreu um erro ao obter o número total de pessoas.</p>";
        }
    } else {
        echo "<p>Ocorreu um erro ao obter o limite de vagas da experiência.</p>";
    }
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

    <h3 style="text-align:left;">Editar tour</h3>
    <hr>
    <form method="post" action="?p=34">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>User*</p>
                <select name="gender"' name="gender"' required>
                    <?php
                    $showuser = "SELECT * FROM user ORDER BY id;";
                    if ($showuser = mysqli_query($conn, $showuser)) {
                        while ($rowuser = mysqli_fetch_assoc($showuser)) {
                            echo "<option value='" . $rowuser['id'] . "'";
                            echo ">" . $rowuser['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <p>Tour*</p>
                <select name="gender"' name="gender"' required>
                    <?php
                    $showtour = "SELECT * FROM tour ORDER BY id;";
                    if ($showtour = mysqli_query($conn, $showtour)) {
                        while ($rowtour = mysqli_fetch_assoc($showtour)) {
                            echo "<option value='" . $rowtour['id'] . "'";
                            echo ">" . $rowtour['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <p>Nº de pessoas*</p>
                <input type="number" max="<?= $row['tour_limit'] ?>" placeholder="Enter People Number.." name="number_people" value="<?= $row['number_people'] ?>" required>
            </div>
            <div>
                <p>Data do tour*</p>
                <input type="date" name="start" required>
            </div>
            <div>
                <p>Data/hora da marcação</p>
                <input type="datetime-local" name="book"">
            </div>
            <div>
                <p>Data/hora do pagamento</p>
                <input type=" datetime-local" name="payment"">
            </div>
        </div>


</div>
<div style=" margin-top: 0.5rem;">
                <input class="edit-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Editar">
                <a href="?p=3"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
            </div>
        </div>
    </form>
</div>