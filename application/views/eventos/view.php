<h2><?php echo $evento['evento_descripcion'];?></h2>
<img src="<?php echo base_url(); ?>assets/imagenes/eventos/<?php echo $evento['evento_cartel'];?>"/>
<p><?php echo $evento['evento_tipo'];?></p>
<p><?php echo $evento['evento_reglamento'];?></p>
<?php echo $evento['evento_fecha'];?>
<?php echo "/";?>
<?php echo $evento['evento_hora'];?>
<?php echo $evento['evento_organizador'];?>

<br>
<a class="btn btn-default pull-left" href="<?php echo base_url();?>eventos/edit/<?php echo $evento['evento_id'];?>">Edit</a>
<?php echo form_open('/eventos/delete/'.$evento['evento_id']); ?>
    <input type="submit" value="Borrar" class="btn btn-danger">
</form>