<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vistaEventos.css"/>
<h1><?php echo $evento['evento_descripcion'];?></h1>
<hr>
<img src="<?php echo base_url(); ?>assets/imagenes/eventos/<?php echo $evento['evento_cartel'];?>"/>
<h2>Tabla de Información</h2>
<table border="5">
    <tr>
        <td>Fecha: </td> <td><?php echo $evento['evento_fecha'];?> <?php echo "/";?> <?php echo $evento['evento_hora'];?></td>
    </tr>
    <tr>
        <td>Residencia del Evento: </td> <td><?php echo $evento['evento_poblacion'];?> <?php echo "/";?> <?php echo $evento['evento_provincia'];?></td>
    </tr>
    <tr>
        <td>Organizador: </td> <td><?php echo $evento['evento_organizador'];?></td>
    </tr>
    <tr>
        <td>Recorrido Total: </td> <td><?php echo $evento['evento_distancia'];?></td>
    </tr>
    <tr>
        <td>Calle de Salida: </td> <td><?php echo $evento['evento_salida'];?></td>
    </tr>
    <tr>
        <td>Calle de Meta: </td> <td><?php echo $evento['evento_meta'];?></td>
    </tr>
</table>

<h3>Para más información sobre el evento descargate su reglamento.</h3>
<a href="<?php echo base_url(); ?>assets/reglamentos/eventos/<?php echo $evento['evento_reglamento'];?>">Descargar Reglamento</a>
<br><br>
<h3>Si está interesado pulsa en el siguiente enlace para rellenar el formulario de inscripción.</h3>
<?php if($evento['evento_activa'] === "y"){?>
    <a href="<?php echo base_url(); ?>eventos/inscripcion/<?php echo $evento['evento_id']?>">Inscripción</a>
<?php } else { ?>
    <p>El plazo de inscripción ha finalizado.</p>
<?php } ?>
<br><br>
<a class="btn btn-default pull-left" href="<?php echo base_url();?>eventos/edit/<?php echo $evento['evento_id'];?>">Edit</a>
<?php echo form_open('/eventos/delete/'.$evento['evento_id']); ?>
    <input type="submit" value="Borrar" class="btn btn-danger">
</form>