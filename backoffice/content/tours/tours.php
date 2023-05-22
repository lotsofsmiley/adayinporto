<?php
$showdep = "SELECT * FROM tour ORDER BY nome";
$show = mysqli_query($conn, $showdep);
$row = mysqli_fetch_array($show);

//<i class="fa-light fa-pen-to-square"></i>
//<i class="fa-light fa-plus"></i>
//<i class="fa-light fa-trash"></i>
?>

<style> 
    .table-hover tbody tr:hover td{
    background-color: rgba(169, 218, 235, 0.3);
    }
    .fa-regular {
        color: #223658!important;
        padding-inline: 0.25rem;
    }
</style>

<br>
<h2>Tabela Tours</h2>
<p>Manutenção dos departamentos no site.</p>
<br>

<a href="./?p=11" class="insert-button">Inserir Tour</a>
<a href="./?p=12" disabled><i id="del" class="fa-regular fa-trash-can fa-2xl" onclick="confirmDelete(<?php echo $id; ?>)"></i></a>
<?php echo '<a href="./?p=15&id='.$row['id_tour'].'&operacao=editar" disabled><i id="edit" class="fa-regular fa-pen-to-square fa-2xl"></i></a>' ?>

<table class="table-hover" style="width:100%; font-size: 20px; margin-top: 1rem; padding-top: 1rem;">

<thead>

    <tr >
        <th scope="col" style="text-align: left; width:20%; border-bottom: solid 1px grey; border-collapse: collapse;">Tour</th>

        <th scope="col" style="text-align: left; width:20%; border-bottom: solid 1px grey; border-collapse: collapse;">Preço(unit)</th>

        <th scope="col" style="text-align: left; width:20%; border-bottom: solid 1px grey; border-collapse: collapse;">Fim Previsto</th>

        <th scope="col" style="text-align: left; width:20%; border-bottom: solid 1px grey; border-collapse: collapse;">Limite Pessoas</th>

        <th scope="col" style="text-align: center; width:10%; border-bottom: solid 1px grey; border-collapse: collapse;"></th>

        <th scope="col" style="text-align: center; width:10%; border-bottom: solid 1px grey; border-collapse: collapse;"></th>
    </tr>

</thead>

<tbody>
<?php
    do{     
        
    ?>  <tr onclick="storeID(<?php echo $row['id_tour'] ?>)"><?php
        echo "<td>". $row['nome'] ."</td>";
        echo "<td>". $row['preco_unit'] ."</td>";
        echo "<td>". $row['fim_previsto'] ."</td>";
        echo "<td>". $row['lim_pessoas'] ."</td>";
        //echo '<td style="text-align:center;"><input class="delete-button" type="button" onclick="confirmDelete(' . $id . ')" value="Apagar"></td>';
        //echo '<td style="text-align:center;"> <a href="./?p=15&id='.$row['id_tour'].'&operacao=editar"><input class="edit-button" type="button" value="Editar"></a></td>';
        
        ?></tr>
<?php }
     while ($row = mysqli_fetch_assoc($show)); ?>
</tbody>
</table>

<script>
    function storeID(id) {
        selectedID = id;
        if(selectedID != 0){
            document.querySelector('#del').disabled = false;
            document.querySelector('#edit').disabled = false;
        }
        console.log("Selected ID: " + selectedID);
    }

    function confirmDelete(id) {
    if (confirm("Tem a certeza?")) {
        window.location.href = './?p=12&id=' + encodeURIComponent(id) + '&operacao=eliminar';
    }
}
</script>