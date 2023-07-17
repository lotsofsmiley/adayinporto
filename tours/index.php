<section class="tour-header">

</section>

<section>
    <div class="tours-text-box">
        <h1>Tours</h1>
        <p class="paragraph-description">Aqui pode conferir as nossas diferentes opções de passeios vínicos. De acordo com o seu perfil, personalidade e orçamento,
            podemos proporcionar-lhe uma experiência de vida que nunca irá esquecer! Faça parte da nossa família inscrevendo-se para um tour de vinhos abaixo!</p>
    </div>
</section>

<section class="section-tours">

    <div class="tour-tours">
        <?php
        echo "<div class='tour-row'>";
        $showtours = "SELECT * FROM tour order by id;";
        if ($show = mysqli_query($conn, $showtours))
            while ($row = mysqli_fetch_assoc($show))
                echo "
                <a href='./?p=21&id=" . $row['id'] . "'>
                    <div class='tour-tour'>
                        <img class='tours-image' src='resources/_images/" . $row['image'] . "'>
                        <h3 class='tours-title'>" . $row['name'] . "</h3>
                        <p class='tour-description'>" . $row['description'] . "</p>
                    </div> </a>";

        echo "</div>"
        ?>
    </div>
</section>