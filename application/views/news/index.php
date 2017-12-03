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
<hr>
<?php foreach($noticias as $noticia) : ?>
    <h2><?php echo $noticia['noticia_titulo'];?></h2>
    <img src="<?php echo base_url(); ?>assets/imagenes/noticias/<?php echo $noticia['noticia_imagen'];?>"/>
    <p><small><a class="btn btn-default" href="<?php echo base_url('/noticias/'.$noticia['noticia_id']);?>">Ver más..</a></small></p>
    <hr>
<?php endforeach; ?>
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>