<?php
session_start();
?>
<div class="vertical-menu">
  <a href="#" class="active">Bienvenido: <?php echo $_SESSION['loginName']." ".$_SESSION['loginLastName'];   ?></a>
  <a href="?vista=materia">Crear Materias</a>
  <a href="?vista=logout">Cerrar sesion</a>
  <!-- <a href="#">Configurar</a>
  <a href="#">Cerrar sesión</a> -->
</div>
