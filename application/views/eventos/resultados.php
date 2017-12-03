<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/indice.css"/>
<h1><?= $titulo ?></h1>
<hr>
<?php foreach($eventos as $evento) : ?>
<img src="<?php echo base_url(); ?>assets/imagenes/eventos/<?php echo $evento['evento_cartel'];?>"/>
<h2><?php echo $evento['evento_descripcion'];?></h2>
<hr>
<?php endforeach; ?>
<div class="pagination-links">
<?php echo $this->pagination->create_links(); ?>
</div>