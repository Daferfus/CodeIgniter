<h2><?=$titulo;?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('usuarios/update'); ?>
<input type="hidden" name="id" value="<?php echo $usuario['usuario_id']; ?>">
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value=<?php echo $usuario['usuario_nombre'];?> >
</div>
<div class="form-group">
    <label for="contraseña">Contraseña</label>
    <input type="password" class="form-control" name="contraseña" placeholder="Introduce Contraseña">
</div>
<div class="form-group">
    <label>Rol</label>
    <select name="rol" class="form-control">
        <?php foreach($roles as $rol): ?>
            <option value="<?php echo $rol['rol_id']; ?>"><?php echo $rol['rol_nombre']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Crear Usuario</button>
<?php echo form_close(); ?>