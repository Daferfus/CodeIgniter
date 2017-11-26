<h1><?= $news_item['title'] ?></h1>
<a href="<?= site_url('news') ?>" class="btn btn-info">Volver a noticias</a>
<?php
echo $news_item['text'];
