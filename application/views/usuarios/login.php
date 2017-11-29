<h2><?=$titulo;?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('usuarios/login'); ?>
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Introduce Nombre de Usuario">
</div>
<div class="form-group">
    <label for="contraseña">Contraseña</label>
    <input type="password" class="form-control" name="contraseña" placeholder="Introduce Contraseña">
</div>
<button type="submit" class="btn btn-primary">Crear Usuario</button>
<?php echo form_close(); ?>