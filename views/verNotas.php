<?php
session_start();
// var_dump($reg);

?>


<div class="content">
  <h2>Notas registradas</h2>

<table>

<tr>
  <th>Asignatura</th>
  <th>Nota 1</th>
  <th>Nota 2</th>
  <th>Nota 3</th>
  <th>Nota 4</th>
  <th>Nota 5</th>
  <th>Nota 6</th>
  <th>Defin.</th>
  <th>Acciones<th>
</tr>
<?php
foreach ($reg as $info) {
?>
<tr>

  <td><?php echo $info->materia; ?></td>
  <td><?php echo $info->nota1; ?></td>
  <td><?php echo $info->nota2; ?></td>
  <td><?php echo $info->nota3; ?></td>
  <td><?php echo $info->nota4; ?></td>
  <td><?php echo $info->nota5; ?></td>
  <td><?php echo $info->nota6; ?></td>
  <td><?php echo $info->def; ?></td>
  <td><a href="?vista=addnota">Agregar nota</a></td>
  <?php
  }
  ?>
</tr>


</table>

</div>

</div>
