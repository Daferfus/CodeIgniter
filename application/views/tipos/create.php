<h2><?=$titulo;?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('tipos/create'); ?>
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Introduce Nombre del Tipo">
    <small id="ayudaTitulo">Máximo de 30 carácteres.</small>
</div>
<button type="submit" class="btn btn-primary">Insertar Datos</button>
</form>