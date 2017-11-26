<style>
    h1 {
        color: red;
    }
    h2 {
        color: deepskyblue;
    }
</style>
<h1><?= $titulo ?></h1>
<?php foreach($eventos as $evento) : ?>
<img src="<?php echo base_url(); ?>assets/imagenes/eventos/<?php echo $evento['evento_cartel'];?>"/>
<h2><?php echo $evento['evento_descripcion'];?></h2>
<p><small><a class="btn btn-default" href="<?php echo base_url('/eventos/'.$evento['evento_id']);?>">Ver más..</a></small></p>
<?php endforeach; ?>