<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/vistaEventos.css"/>
<h1><?php echo $titulo; ?></h1>
<table border = 1>
    <tr>
        <td>Nombre</td>
        <td>Contraseña</td>
        <td>Rol</td>
    </tr>
<?php foreach($usuarios as $usuario) : ?>
    <tr>
        <td><?php echo $usuario['usuario_nombre']; ?></td>
        <td><?php echo $usuario['usuario_clave']; ?></td>
        <td><?php if($usuario['usuario_rol_id'] == 1) { echo "Administrador" ;?>
            <?php } ?>
            <?php if($usuario['usuario_rol_id'] == 2) { echo "Editor" ;?>
            <?php } ?>
            <?php if($usuario['usuario_rol_id'] == 3) { echo "Organizador" ;?>
            <?php } ?>
            <?php if($usuario['usuario_rol_id'] == 0) { echo "Sin Rol Definido" ;?>
            <?php } ?>
        </td>
        <td>
            <form action="usuarios/update/<?php echo $usuario['usuario_id']; ?>" method="POST">
                <input type="submit" class="btn-link text-dark" value="Edit">
            </form>
        </td>
        <td>
            <form action="usuarios/delete/<?php echo $usuario['usuario_id']; ?>" method="POST">
                <input type="submit" class="btn-link text-danger" value="Borrar">
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<br>
<a class="btn btn-primary" href="<?php echo base_url();?>usuarios/registro">Dar de Alta Usuario</a>
<a class="btn btn-success" href="<?php echo base_url();?>usuarios/roles_create">Crear Rol</a>
