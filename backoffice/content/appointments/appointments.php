<?php
$showapp = "SELECT a.id, a.id_user as id_user, u.name as user, a.id_tour as id_tour, t.name as tour, a.start, a.book_date as book, a.payment_date as payment, a.cancel_date as cancel, a.reason, a.number_people FROM appointment a JOIN user u ON u.id = a.id_user JOIN tour t ON t.id = a.id_tour order by a.start";
$show = mysqli_query($conn, $showapp);
if (mysqli_num_rows($show) > 0) {
    $row = mysqli_fetch_array($show);
} else {
    $row = null;
}
?>

<style>
    .fa-regular {
        color: #223658 !important;
        padding-inline: 0.25rem;
    }

    .table-hover tbody tr:hover td {
        background-color: rgba(169, 218, 235, 0.3);
    }

    .selected {
        background-color: rgba(169, 218, 235, 0.3);
    }
</style>

<h2>Tabela Appointment - Secundária</h2>
<p>Manutenção das marcações no site.</p>
<br>

<a href="./?p=31" class="insert-button">Inserir Marcação</a>
<a id="delLink" disabled><i class="fa-regular fa-trash-can fa-2xl" onclick="confirmDelete(<?php echo $row['id']; ?>)"></i></a>

<?php
if ($row !== null && isset($row['id'])) {
    $editLink = './?p=35&id=' . $row['id'] . '&operation=editar&id_tour=' . $row['id_tour'] . '&id_user=' . $row['id_user'] . '&start=' . $row['start'] . '';
} else {
    $editLink = null;
}
echo '<a href="' . $editLink . '" id="editLink" disabled><i class="fa-regular fa-pen-to-square fa-2xl"></i></a>' ?>

<table class="table-hover" style="width:100%; font-size: 20px; margin-top: 1rem; padding-top: 1rem;">
    <thead>
        <tr>
            <th scope="col" style="text-align: left; width:20%; border-bottom: solid 1px grey; border-collapse: collapse;">Nome</th>
            <th scope="col" style="text-align: left; width:60%; border-bottom: solid 1px grey; border-collapse: collapse;">Tour</th>
            <th scope="col" style="text-align: left; width:10%; border-bottom: solid 1px grey; border-collapse: collapse;">Data</th>
            <th scope="col" style="text-align: left; width:10%; border-bottom: solid 1px grey; border-collapse: collapse;">Ativo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($row !== null) {
            do {
                $cancelStatus = !isset($row['cancel']) || $row['cancel'] === '0000-00-00 00:00:00' ? 'S' : 'N';
        ?>
                <tr id="tr_<?php echo $row['id']; ?>" onclick="storeID(<?php echo $row['id']; ?>)">
                    <?php
                    echo "<td>" . $row['user'] . "</td>";
                    echo "<td>" . $row['tour'] . "</td>";
                    echo "<td>" . $row['start'] . "</td>";
                    echo "<td>" . $cancelStatus . "</td>";
                    ?>
                </tr>
        <?php
            } while ($row = mysqli_fetch_assoc($show));
        } else {
            // Handle case where no rows are returned
            echo "<tr><td colspan='4'>Não foram encontrados registos.</td></tr>";
        }
        ?>
    </tbody>
</table>

<script>
    var selectedID = null;

    function storeID(id) {
        var prevSelectedRow = document.querySelector('.selected');
        if (prevSelectedRow) {
            prevSelectedRow.classList.remove("selected");
        }

        var clickedRow = document.getElementById("tr_" + id);
        if (clickedRow) {
            clickedRow.classList.add("selected");
            selectedID = id;
            enableButtons();
        } else {
            disableButtons();
        }
    }

    function enableButtons() {
        document.getElementById("delLink").removeAttribute("disabled");
        document.getElementById("editLink").removeAttribute("disabled");
        document.getElementById("editLink").href = './?p=35&id=' + encodeURIComponent(selectedID) + '&operation=editar';
    }

    function disableButtons() {
        document.getElementById("delLink").setAttribute("disabled", "disabled");
        document.getElementById("editLink").setAttribute("disabled", "disabled");
    }

    function confirmDelete() {
        var selectedID = document.querySelector('.selected').id;
        selectedID = selectedID.split("_")[1];
        if (confirm("Tem a certeza?")) {
            var deleteURL = './?p=32&id=' + encodeURIComponent(selectedID) + '&operation=eliminar';
            window.location.href = deleteURL;
        }
    }
</script>