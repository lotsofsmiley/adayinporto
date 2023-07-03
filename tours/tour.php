<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    if (empty($id)) {
        echo "Erro, pedido inválido";
        exit();
    }
} else {
    echo "Erro, pedido inválido";
    exit();
}
$sql = "SELECT * FROM tour WHERE id = '$id' ";
$sqlbody = "SELECT * FROM tour_body WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);
$resultbody = mysqli_query($conn, $sqlbody);

if (!$result) {
    echo 'Falha na consulta: ' . mysqli_error($conn);
} else {
}
$row = mysqli_fetch_assoc($result);

if (!$resultbody) {
    echo 'Falha na consulta: ' . mysqli_error($conn);
} else {
}
$rowbody = mysqli_fetch_assoc($resultbody);

?>

<section class="tour-header">
    <div class="tour-text-box">
        <h1> <?= $row['name'] ?></h1>
    </div>
</section>
<div class="tour-regular">
    <section class="tour-main">
        <ul class="tour-info">
            <li class="tour-data max-guests">
                Max <?= $row['tour_limit'] ?> guests
            </li>
            <li class="tour-data price-unit">
                <?= $row['price_unit'] ?> €
            </li>
            <li class="tour-data ending">
                Ending around <?= $row['ending'] ?>
            </li>
        </ul>
        <div class="introduction">
            <h2 class="introduction-title">
                <?= $rowbody['subtitle'] ?>
            </h2>
            <div class="introduction-body">
                <?= $rowbody['content'] ?>
            </div>
        </div>
    </section>
</div>