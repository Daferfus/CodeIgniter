<h2><?=$titulo;?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('usuarios/roles_create'); ?>
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Introduce Nombre de Rol">
</div>
<div class="form-group">
    <label for="nivel">Nivel</label>
    <input type="text" class="form-control" name="nivel" placeholder="Introduce Nivel">
</div>
<button type="submit" class="btn btn-primary">Crear Rol</button>
<?php echo form_close(); ?>