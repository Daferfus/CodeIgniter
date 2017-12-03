<style>
    li {
        margin-left: 20px;
        margin-top: 10px;
        font-size: 20px;
        text-aling: center;
        list-style-type: none;
    }

    ul#cambiante a{
        color: green;
    }

</style>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <?php if(!$this->session->userdata('logueado')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>eventos">Próximos Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>eventos/resultados">Resultados</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>tipos">Eventos por Tipo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>noticias">Noticias</a>
            </li>
        </ul>
        <ul id="cambiante" class="nav navbar-nav navbar-right">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>usuarios/login">Backoffice</a>
                </li>
            <?php endif; ?>
            <?php if($this->session->userdata('logueado')) : ?>
            <?php if($this->session->userdata('usuario_rol_id') == 1): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>usuarios">Usuarios</a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 3): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>eventos/create">Insertar Eventos</a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 2): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>news/create">Insertar Noticia</a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 3): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>tipos/create">Insertar Tipos</a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 2 || $this->session->userdata('usuario_rol_id') == 3): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>usuarios/logout">Frontoffice</a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container">


    <?php if($this->session->flashdata('evento_creado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('evento_creado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('evento_actualizado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('evento_actualizado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('evento_eliminado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('evento_eliminado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('participante_inscrito')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('participante_inscrito').'</p>'; ?>
    <?php endif; ?>



    <?php if($this->session->flashdata('tipo_creado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('tipo_creado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('tipo_borrado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('tipo_borrado').'</p>'; ?>
    <?php endif; ?>



    <?php if($this->session->flashdata('noticia_creada')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('noticia_creada').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('noticia_eliminada')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('noticia_eliminada').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('noticia_actualizada')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('noticia_actualizada').'</p>'; ?>
    <?php endif; ?>



    <?php if($this->session->flashdata('usuario_registrado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('usuario_registrado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('usuario_borrado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('usuario_borrado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('usuario_actualizado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('usuario_actualizado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('rol_insertado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('rol_insertado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('usuario_logueado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('usuario_logueado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_fallado')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_fallado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('usuario_deslogueado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('usuario_deslogueado').'</p>'; ?>
    <?php endif; ?>