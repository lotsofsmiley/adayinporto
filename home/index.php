<?php
$sql = "SELECT * FROM tour";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo 'Falha na consulta: ' . mysqli_error($conn);
    exit();
}

$tours = array();

while ($row = mysqli_fetch_assoc($result)) {
    $tours[] = $row;
}

?>

<section class="header">

</section>


<section>
    <div class="text-box">
        <h1>Airbnb 2019 Douro Most Unique Experience</h1>
        <p class="paragraph-description">Prepare-se para embarcar numa viagem de descoberta e paixão com aDayinDouro. Fundada em 2011 pelo visionário Manuel Guimarães,
            um engenheiro de computação com um coração apaixonado, esta empresa familiar é muito mais do que apenas uma empresa - é uma celebração de emoções e laços familiares.<br>
            Prove connosco o autêntico Douro Valleu para fazer parte da Most Authentic Access Experience by Airbnb em 2019!</p>
        <a href="#tours" class="header-button">Tours</a>
    </div>
</section>

<a id="about"></a>
<section class="about">
    <h1>Sobre nós</h1>
    <p class="paragraph-description">A vida de Manuel segiu um rumo inesperado durante a crise econômica de 2008. Enfrentou dificuldades, mas manteve acesa dentro de si a chama da esperança. Foi nesse momento de adversidade que ele encontrou sua verdadeira vocação. Determinado a criar um futuro brilhante para sua família, ele começou a alugar um quarto na casa da sua família através do Airbnb, abrindo as portas para viajantes sedentos por experiências autênticas.
        Mas foi em 2011 que a verdadeira magia aconteceu. Manuel criou a aDayinDouro, uma empresa dedicada a criar experiências vínicas no Vale do Douro, a região vinícola mais marcante de Portugal. Eles compartilharam histórias, momentos preciosos e diversão criando laços que transcenderam os limites físicos. Juntos, eles descobriram uma nova maneira de conectar corações e mentes por meio da hospitalidade.<br>
        A paixão de Manuel e da sua família pelo Vale do Douro era uma chama acesa dentro deles. Cada canto, cada vinhedo, cada sabor continha uma história profunda e emocionalmente cativante. Foi assim que nasceu a ideia de oferecer passeios personalizados que fossem além de uma simples visita.<br>
        Cada passeio da aDayinDouro é uma imersão total nas maravilhas do Vale do Douro. Das pitorescas colinas cobertas de vinhedos às tradicionais vinícolas, cada paragem é uma oportunidade para se apaixonar pela rica história e cultura da região. Mas o verdadeiro encanto está nas pessoas - a família de Manuel, com os seus sorrisos calorosos e corações generosos, guia cada hóspede em uma jornada de conexões profundas e momentos tocantes, tornando-os parte da família.<br>
        A história de Manuel e sua família ganhou vida quando, em 2019, eles foram homenageados com o prestigioso prêmio "Most Authentic Airbnb Experience of 2019". Este reconhecimento foi o selo de aprovação pela paixão e dedicação que colocam em cada visita e reafirmaram que estavam no caminho certo para criar memórias inesquecíveis.
        Com a aDayinDouro, todos os dias são repletos de amor, conexão e um toque de magia. É uma empresa familiar onde as emoções transbordam em cada interação e cada cliente se torna parte de uma história em constante evolução. Unidos pelo amor e paixão pelo Vale do Douro, Manuel, a sua família e a sua equipa apaixonada estão prontos para compartilhar a jornada mais emocionante de sua vida.<br>
        Junte-se a nós e deixe-se levar pela emoção enquanto descobrimos juntos a essência do Vale do Douro, uma experiência que vai tocar o seu coração e despertar os seus sentidos. Bem-vindo ao aDayinDouro - onde a paixão, a descoberta e os laços familiares se encontram.</p>
</section>

<a id="tours"></a>
<section class="tours">
    <h1>Os nossos Tours</h1>
    <p class="paragraph-description">Aqui pode conferir as nossas diferentes opções de passeios vínicos. De acordo com o seu perfil, personalidade e orçamento,
        podemos proporcionar-lhe uma experiência de vida que nunca irá esquecer! Faça parte da nossa família inscrevendo-se para um tour de vinhos abaixo!</p>

    <div class="tours-row">
        <?php foreach ($tours as $tour) {
            echo "
                <div class='tours-img-col'>
                        <img class='tour-image' src='resources/_images/" . $tour['image'] . "'>
                        <h3 class='tour-title'>" . $tour['name'] . "</h3>
                        <p class='tour-description'>" . $tour['description'] . "</p>
                        <a href='./?p=21&id=" . $tour['id'] . "' class='tour-buttonLink'>Check Tour</a>
                    </div>";
        } ?>
    </div>
</section>

<footer class="footer" id="contact">
    <div class="footer-column footer-about">
        <!--<h3 class="company-title">aDayinPorto</h3>-->
        <div class="logo-container">
            <img src="./resources/_images/full_nobg_logo.png" alt="ola" class="logo-image noSelect">
        </div>
        <div class="footer-description">
            Prepare-se para embarcar numa viagem de descoberta e paixão com aDayinDouro. Fundada em 2011 pelo visionário Manuel Guimarães, um engenheiro informático de coração apaixonado, esta empresa familiar é muito mais do que uma empresa - é uma celebração de emoções e laços familiares.<br>
            Prove connosco o autêntico Douro Valleu para fazer parte da Most Authentic Access Experience by Airbnb em 2019!
        </div>
    </div>

    <!--<div class="footer-column footer-legal">
                <a class="footer-policies">Privacy Policy & Terms and Conditions</a>
            </div>-->

    <div class="footer-column footer-contact">
        <h3 class="footer-title">Contacte-nos!</h3>
        <a class="footer-contact-phone" target="_blank" href="tel:+351 916 541 852">
            <i class="footer-contact-icon fa fa-phone"></i>
            (+351) 916 541 852
        </a>

        <a class="footer-contact-mail" target="_blank" href="mailto:adayinporto@gmail.com">
            <i class="footer-contact-icon fa fa-envelope"></i>
            adayinporto@gmail.com
        </a>
    </div>

    <div class="footer-column footer-contact">
        <h3 class="footer-title">Visite as nossas redes sociais!</h3>
        <!--
        <a class="social-platform" target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g189180-d4137824-Reviews-Taste_Porto_Food_Tours-Porto_Porto_District_Northern_Portugal.html">
            <i class="social-platform-icon fab fa-tripadvisor"></i>
        </a>
        <a class="social-platform" target="_blank" href="">
            <i class="social-platform-icon fab fa-twitter"></i>
        </a>
        <a class="social-platform" style="margin-right:5px;" target="_blank" href="https://www.youtube.com/channel/UCWWG4QPG8QFUJVZHKcPjcHg">
            <i class="social-platform-icon fa fa-youtube"></i>
        </a>
        -->
        <a class="social-platform" target="_blank" href="https://www.facebook.com/adayinporto/">
            <i class="social-platform-icon fa fa-facebook-square"></i>
        </a>
        <a class="social-platform" target="_blank" href="https://www.instagram.com/adayindouro/">
            <i class="social-platform-icon fa fa-instagram"></i>
        </a>


    </div>
</footer>