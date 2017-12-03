<h2>Crear noticia</h2>
<?php
echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
echo form_open_multipart('news/create');
?>
<div class = "form-group">
    <label>Titulo</label>
    <input type = "text" class = "form-control" id = "titulo" name = "titulo">
</div>
<div class="form-group">
    <label>Imágen</label>
    <input type="file" class="form-control" name="noticia_imagen">
</div>
<div class = "form-group">
    <label>Texto</label>
    <textarea class = "form-control" id = "editor1" name = "texto"></textarea>
</div>
<div class="form-group">
    <label>Fecha</label>
    <input type="date" class="form-control" name="fecha" placeholder="El dia en el que te encuentras">
    <small>Formato (MM/DD/YYYY).</small>
</div>
<input type = "submit" class = "btn btn-success" value = "Crear">
</form>

