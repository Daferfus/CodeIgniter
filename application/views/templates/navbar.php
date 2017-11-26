<style>
    li {
        margin-left: 20px;
        margin-top: 10px;
        font-size: 20px;
        text-aling: center;
        list-style-type: none;
    }

    form#nav {
        float: right;
    }

</style>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <!-- base_url() devuelve la ruta inicial para que funcione necesitamos el helper -->
                <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>eventos">Eventos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>tipos">Tipos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>news">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>login">Dashboard</a>
            </li>
            <?php if(!$this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>usuarios/registro">Registrarse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>usuarios/login">Loguearse</a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>eventos/create">Insertar Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>tipos/create">Insertar Tipos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>usuarios/logout">Desloguearse</a>
            </li>
            <?php endif; ?>
        </ul>
        <form id="nav" class="form-inline">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container">

    <?php if($this->session->flashdata('usuario_registrado')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('usuario_registrado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('evento_creado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('evento_creado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('evento_actualizado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('evento_actualizado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('evento_eliminado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('evento_eliminado').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('tipo_creado')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('tipo_creado').'</p>'; ?>
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