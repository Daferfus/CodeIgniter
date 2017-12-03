<h2><?php echo $titulo ?></h2>
<?php
echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
echo form_open_multipart('news/update'); ?>
<input type="hidden" name="id" value="<?php echo $noticia['noticia_id']; ?>">
<div class = "form-group">
    <label for = "titulo">Titulo</label>
    <input type = "text" class = "form-control" id = "titulo" name = "titulo" value=<?php echo $noticia['noticia_titulo']?>>
</div>
<div class="form-group">
    <label for="userfile">Imágen</label>
    <input type="file" class="form-control" name="noticia_imagen">
</div>
<div class = "form-group">
    <label for = "texto">Texto</label>
    <textarea class = "form-control" id = "editor1" name = "texto" <?php echo $noticia['noticia_texto']?>></textarea>
</div>
<div class="form-group">
    <label>Fecha</label>
    <input type="date" class="form-control" name="fecha" placeholder="El dia en el que te encuentras">
    <small>Formato (MM/DD/YYYY).</small>
</div>
<input type = "submit" class = "btn btn-success" value = "Crear">
</form>

