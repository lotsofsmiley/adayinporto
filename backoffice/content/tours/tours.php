<?php
$showdep = "SELECT * FROM tour ORDER BY nome";
$show = mysqli_query($conn, $showdep);
$row = mysqli_fetch_array($show);
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

<h2>Tabela Tours - Primária</h2>
<p>Manutenção dos tours no site.</p>
<br>

<a href="./?p=11" class="insert-button">Inserir Tour</a>
<a id="delLink" disabled><i class="fa-regular fa-trash-can fa-2xl" onclick="confirmDelete(<?php echo $row['id_tour']; ?>)"></i></a>
<?php echo '<a href="./?p=15&id=' . $row['id_tour'] . '&operacao=editar" id="editLink" disabled><i class="fa-regular fa-pen-to-square fa-2xl"></i></a>' ?>

<table class="table-hover" style="width:100%; font-size: 20px; margin-top: 1rem; padding-top: 1rem;">
    <thead>
        <tr>
            <th scope="col" style="text-align: left; width:25%; border-bottom: solid 1px grey; border-collapse: collapse;">Tour</th>
            <th scope="col" style="text-align: left; width:25%; border-bottom: solid 1px grey; border-collapse: collapse;">Preço(unit)</th>
            <th scope="col" style="text-align: left; width:25%; border-bottom: solid 1px grey; border-collapse: collapse;">Fim Previsto</th>
            <th scope="col" style="text-align: left; width:25%; border-bottom: solid 1px grey; border-collapse: collapse;">Limite Pessoas</th>
        </tr>
    </thead>
    <tbody>
        <?php
        do {
        ?>
            <tr id="tr_<?php echo $row['id_tour']; ?>" onclick="storeID(<?php echo $row['id_tour']; ?>)">
                <?php
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['preco_unit'] . "</td>";
                echo "<td>" . $row['fim_previsto'] . "</td>";
                echo "<td>" . $row['lim_pessoas'] . "</td>";
                ?>
            </tr>
        <?php
        } while ($row = mysqli_fetch_assoc($show));
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

        console.log("Selected ID: " + selectedID);
    }

    function enableButtons() {
        document.getElementById("delLink").removeAttribute("disabled");
        document.getElementById("editLink").removeAttribute("disabled");
        document.getElementById("editLink").href = './?p=15&id=' + encodeURIComponent(selectedID) + '&operacao=editar';
    }

    function disableButtons() {
        document.getElementById("delLink").setAttribute("disabled", "disabled");
        document.getElementById("editLink").setAttribute("disabled", "disabled");
    }

    function confirmDelete() {
        var selectedID = document.querySelector('.selected').id;
        selectedID = selectedID.split("_")[1];
        if (confirm("Tem a certeza?")) {
            var deleteURL = './?p=12&id=' + encodeURIComponent(selectedID) + '&operacao=eliminar';
            window.location.href = deleteURL;
        }
    }
</script>