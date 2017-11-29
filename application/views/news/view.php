<h2><?php echo $noticia['noticia_titulo'];?></h2>
<img src="<?php echo base_url(); ?>assets/imagenes/noticias/<?php echo $noticia['noticia_imagen'];?>"/>
<p><?php echo $noticia['noticia_texto'];?></p>
<?php echo $noticia['noticia_fecha'];?>
<br>
<a class="btn btn-default pull-left" href="<?php echo base_url();?>news/edit/<?php echo $noticia['noticia_id'];?>">Editar</a>
<?php echo form_open('/news/delete/'.$noticia['noticia_id']); ?>
<input type="submit" value="Borrar" class="btn btn-danger">
</form>