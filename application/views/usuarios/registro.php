<h2><?=$titulo;?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('usuarios/registro'); ?>
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Introduce Nombre de Usuario">
    <small id="ayudaNombre">Máximo de 30 carácteres.</small>
</div>
<div class="form-group">
    <label for="contraseña">Contraseña</label>
    <input type="text" class="form-control" name="contraseña" placeholder="Introduce Contraseña">
    <small id="ayudaContraseña">Máximo de 256 carácteres.</small>
</div>
<div class="form-group">
    <label for="contraseña2">Confirmar Contraseña</label>
    <input type="text" class="form-control" name="contraseña2" placeholder="Vuelve a Introducir la Contraseña">
    <small id="ayudaContraseña2">Máximo de 256 carácteres.</small>
</div>
<button type="submit" class="btn btn-primary">Crear Usuario</button>
<?php echo form_close(); ?>