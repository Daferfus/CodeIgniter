<h1>SECCION DE NOTICIAS</h1>
<a href="news/create" class="btn btn-info">Crear</a>
<?php
foreach ($news as $new) {
    ?>
    <h2><?= $new['title'] ?></h2>
    <div id="main"><?= $new['text'] ?></div>
    <p><a href="news/<?= $new['slug']?>">Ver noticias</a></p>
    <?php
}