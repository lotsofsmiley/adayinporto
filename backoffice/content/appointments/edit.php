<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $user = $_POST['id_user'];
    $tour = $_POST['id_tour'];
    $start = $_POST['start'];
    $number_people = $_POST['number_people'];
    $cancel = $_POST['cancel'];
    $book = $_POST['book'];
    $payment = $_POST['payment'];
    $reason = $_POST['reason'];



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
                    , cancel_date = '$cancel'
                    , reason = '$reason'
                    , number_people = '$number_people'
                    WHERE id = '$id'";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        echo "<p style='color:#40bf64;'> Registo editado com sucesso. </p>";
                        echo "<script>setTimeout(function() { window.location.href = './?p=3'; }, 1000);</script>";
                        exit();
                    }
                } else
                    die("<p> Esse registo já existe. Um utilizador não pode fazer a mesma marcação para o mesmo dia.</p>");
            } else {
                die("<p>Limite de vagas excedido. Não é possível fazer a marcação.</p>");
            }
        } else {
            die("<p>Ocorreu um erro ao obter o número total de pessoas.</p>");
        }
    } else {
        die("<p>Ocorreu um erro ao obter o limite de vagas da experiência.</p>");
    }
}
