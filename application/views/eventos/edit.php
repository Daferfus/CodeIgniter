<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/formularioGrande.css"/>
</head>

<h2><?= $titulo;?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('eventos/update'); ?>
<input type="hidden" name="evento_id" value="<?php echo $evento['evento_id']; ?>">
<div class="form-group">
    <label>Título</label>
    <input type="text" class="form-control" name="titulo" value=<?php echo $evento['evento_descripcion']?>>
    <small>Máximo de 250 carácteres.</small>
</div>
<div class="form-group">
    <label>Cartel</label>
    <input type="file" class="form-control" name="evento_cartel" value=<?php echo $evento['evento_cartel']?>>
</div>
<div class="form-group">
    <label>Reglamento</label>
    <input type="file" class="form-control" name="evento_reglamento" value=<?php echo $evento['evento_reglamento']?>>
</div>
<div class="form-group">
    <label>Fecha</label>
    <input type="date" class="form-control" name="fecha" value=<?php echo $evento['evento_fecha']?>>
    <small>Formato(MM/DD/YYYY).</small>
</div>
<div class="form-group">
    <label>Hora</label>
    <input type="time" class="form-control" name="hora" value=<?php echo $evento['evento_hora']?>>
    <small>Formato (HH:MM).</small>
</div>
<div class="form-group">
    <label>Provincia</label>
    <input type="text" class="form-control" name="provincia" value=<?php echo $evento['evento_provincia']?>>
    <small>Máximo de 15 carácteres.</small>
</div>
<div class="form-group">
    <label>Población</label>
    <input type="text" class="form-control" name="poblacion" value=<?php echo $evento['evento_poblacion']?>>
    <small>Máximo de 15 carácteres.</small>
</div>
<div class="form-group">
    <label>Organizador</label>
    <input type="text" class="form-control" name="organizador" value=<?php echo $evento['evento_organizador']?>>
    <small>Máximo de 20 carácteres.</small>
</div>
<div class="form-group">
    <label>Salida</label>
    <input type="text" class="form-control" name="salida" value=<?php echo $evento['evento_salida']?>>
    <small>Máximo de 20 carácteres.</small>
</div>
<div class="form-group">
    <label>Meta</label>
    <input type="text" class="form-control" name="meta" value=<?php echo $evento['evento_meta']?>>
    <small>Máximo de 20 carácteres.</small>
</div>
<div class="form-group">
    <label>¿Activo?</label><br>
    <input type="radio" name="activa" value="y" checked>Activo<br>
    <input type="radio" name="activa" value="n">No Activo<br>
</div>
<div class="form-group">
    <label>Tipo</label>
    <select name="tipo" class="form-control">
        <?php foreach($tipos as $tipo): ?>
            <option value="<?php echo $tipo['tipo_id']; ?>"><?php echo $tipo['tipo_descripcion']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Actualizar Datos</button>
</form>