<style>
    img {
        width: 200px;
        height: 150px;
    }
    table .btn {
        border-radius:100%;
        width: 50px;
        height: 50px;
        cursor: pointer;
    }
</style>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Agregar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td>".ucfirst($producto->nombre)."</td>";
            echo "<td><img src='".base_url()."assets/catalogo/imagenes/".$producto->imagen."'></td>";
            echo "<td>".$producto->precio."€</td>";
            echo "<td><a href='".base_url()."catalogo/agregarProducto/".$producto->id."'><button class='btn btn-success'>+</button></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
