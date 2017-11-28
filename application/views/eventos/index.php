<style>
    h1 {
        color: red;
    }
    h2 {
        color: deepskyblue;
    }

    .pagination-links{
        margin: 30px 0;
    }

    .pagination-links strong{
        padding: 8px 13px;
        margin: 5px;
        background: black;
        border: 1px blue solid;
        color: green;
    }

    a.pagination-links {
        padding: 8px 13px;
        margin: 5px;
        background: white;
        border: 1px black solid;
    }
</style>
<h1><?= $titulo ?></h1>
<?php foreach($eventos as $evento) : ?>
<img src="<?php echo base_url(); ?>assets/imagenes/eventos/<?php echo $evento['evento_cartel'];?>"/>
<h2><?php echo $evento['evento_descripcion'];?></h2>
<p><small><a class="btn btn-default" href="<?php echo base_url('/eventos/'.$evento['evento_id']);?>">Ver más..</a></small></p>
<?php endforeach; ?>
<div class="pagination-links">
<?php echo $this->pagination->create_links(); ?>
</div>