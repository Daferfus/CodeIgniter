<style>
    .cat-delete{
        display: inline;
    }
</style>
<h2><?= $titulo; ?></h2>
<ul class="list-group">
    <?php foreach($tipos as $tipo) : ?>
    <li class="list-group-item"><a href="<?php echo base_url('/tipos/eventos/'.$tipo['tipo_id']);?>"><?php echo $tipo['tipo_descripcion']; ?></a>
        <?php if($this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 2): ?>
            <form class="cat-delete" action="tipos/delete/<?php echo $tipo['tipo_id']; ?>" method="POST">
                <input type="submit" class="btn-link text-danger" value="[X]">
            </form>
        <?php endif; ?>
    </li>
    <?php endforeach; ?>
</ul>