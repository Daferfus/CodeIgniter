<h2><?= $titulo; ?></h2>
<ul class="list-group">
    <?php foreach($tipos as $tipo) : ?>
    <li class="list-group-item"><a href="<?php echo base_url('/tipos/eventos/'.$tipo['tipo_id']);?>"><?php echo $tipo['tipo_descripcion']; ?></a></li>
    <?php endforeach; ?>
</ul>