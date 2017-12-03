<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/formularioGrande.css"/>
</head>

<h2><?php echo $titulo ?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('Eventos/inscripcion/'.$evento['evento_id']); ?>
<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Introduce tu nombre">
</div>
<div class="form-group">
    <label>Apellidos</label>
    <input type="text" class="form-control" name="apellidos" placeholder="Introduce tus apellidos">
</div>
<div class="form-group">
    <label>NIF</label>
    <input type="text" class="form-control" name="nif" placeholder="Introduce tu DNI">
</div>
<div class="form-group">
    <label>Sexo</label><br>
    <input type="radio" name="sexo" value="HOMBRE" checked>Hombre
    <input type="radio" name="sexo" value="MUJER">Mujer<br>
</div>
<div class="form-group">
    <label for="hora">Población</label>
    <input type="text" class="form-control" name="poblacion" placeholder="Introduce el nombre de tu población">
</div>
<div class="form-group">
    <label>CP</label>
    <input type="text" class="form-control" name="cp" placeholder="Código Postal">
</div>
<div class="form-group">
    <label>País</label>
    <input type="text" class="form-control" name="pais" placeholder="Nombre de tu país">
</div>
<div class="form-group">
    <label>Teléfono</label>
    <input type="tel" class="form-control" name="telefono" placeholder="Número de Teléfono">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="Introduce tu correo electrónico">
</div>
<div class="form-group">
    <label>Fecha de Nacimiento</label>
    <input type="date" class="form-control" name="fechaNaci" placeholder="Tu Fecha de Nacimiento">
    <small>Formato (MM/DD/YYYY).</small>
</div>
<div class="form-group">
    <label>Club</label>
    <input type="text" class="form-control" name="club" placeholder="Club al que perteneces (si es que perteneces a alguno)">
</div>

<div class="form-group">
    <label for="tipo">Categoria</label>
    <input type="text" class="form-control" name="categoria" placeholder="La teua categoria">
</div>
<button type="submit" class="btn btn-primary">Insertar Datos</button>
</form>