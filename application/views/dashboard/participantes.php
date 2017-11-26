<table class="table">
    <thead>
        <tr>
        <th>Apellidos</th>
        <th>Nombre</th>
        <th>Poblacion</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($participantes as $participante) {
            echo "<tr>";
            echo "<td>".$participante->Apellidos."</td>";
            echo "<td>".$participante->Nombre."</td>";
            echo "<td>".$participante->Poblacion."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?= $this->pagination->create_links() ?>

