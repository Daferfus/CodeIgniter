<h2>Crear noticia</h2>
<?php
echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
echo form_open('news/create');
?>
<div class = "form-group">
    <label for = "titulo">Titulo</label>
    <input type = "text" class = "form-control" id = "titulo" name = "title" placeholder = "Escribe el titulo">
</div>
<div class = "form-group">
    <label for = "texto">Texto</label>
    <textarea class = "form-control" id = "texto" name = "text"></textarea>
</div>
<input type = "submit" class = "btn btn-success" value = "Crear">
</form>

