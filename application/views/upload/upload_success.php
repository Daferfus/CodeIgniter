<h3>Tu fichero se ha subido con éxito</h3>
<ul>
    <?php foreach ($upload_data as $item => $value): ?>
        <li><?= $item ?><?= $value ?></li>
    <?php endforeach; ?>
</ul>

<?= anchor('upload', '<button class="btn btn-info">Subir otro fichero</button>') ?>
