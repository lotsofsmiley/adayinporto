<?php
$showsoc = "SELECT * FROM permission ORDER BY id";
$show = mysqli_query($conn, $showsoc);
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

<h2>Tabela Permission - Primária</h2>
<p>Manutenção das permissões das roles no site.</p>
<br>

<a href="./?p=41" class="insert-button">Inserir Permissão</a>
<a id="delLink" disabled><i class="fa-regular fa-trash-can fa-2xl" onclick="confirmDelete(<?php echo $row['id']; ?>)"></i></a>

<?php
if ($row !== null && isset($row['id'])) {
    $editLink = './?p=45&id=' . $row['id'] . '&operation=editar';
} else {
    $editLink = null;
}
echo '<a href="' . $editLink . '" id="editLink" disabled><i class="fa-regular fa-pen-to-square fa-2xl"></i></a>' ?>

<table class="table-hover" style="width:100%; font-size: 20px; margin-top: 1rem; padding-top: 1rem;">
    <thead>
        <tr>
            <th scope="col" style="text-align: left; width:30%; border-bottom: solid 1px grey; border-collapse: collapse;">Tag</th>
            <th scope="col" style="text-align: left; width:70%; border-bottom: solid 1px grey; border-collapse: collapse;">Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($row !== null) {
            do {
        ?>
                <tr id="tr_<?php echo $row['id']; ?>" onclick="storeID(<?php echo $row['id']; ?>)">
                    <?php
                    echo "<td>" . $row['tag'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
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
        document.getElementById("editLink").href = './?p=45&id=' + encodeURIComponent(selectedID) + '&operation=editar';
    }

    function disableButtons() {
        document.getElementById("delLink").setAttribute("disabled", "disabled");
        document.getElementById("editLink").setAttribute("disabled", "disabled");
    }

    function confirmDelete() {
        var selectedID = document.querySelector('.selected').id;
        selectedID = selectedID.split("_")[1];
        if (confirm("Tem a certeza?")) {
            var deleteURL = './?p=42&id=' + encodeURIComponent(selectedID) + '&operation=eliminar';
            window.location.href = deleteURL;
        }
    }
</script>