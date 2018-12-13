<?php
session_start();
include_once "views/header.php";

if (isset($_SESSION['loginName'])) {
  include_once "views/menu0.php";

}else {
  include_once "views/menu.php";

}


switch ($_GET['vista']) {
  case 'login':
    include_once "views/login.php";
    break;
  case 'registro':
    include_once "views/register.php";
    break;
  case 'logout':
    session_destroy();
    header("Location: ?vista=login");
    break;
  case 'verNotas':
    require_once "controller/registro.controller.php";
    $controller=new registroController();
    $reg=json_decode($controller->listarNotas($_SESSION["IdUsuario"]));
    include_once "views/verNotas.php";
    break;

  default:
    include_once ("views/".$_GET['vista'].".php");
    break;
}

if (isset($_REQUEST['loginBtn'])) {
  include_once "controller/login.controller.php";
}

if (isset($_REQUEST['saveMatBtn'])) {
  require_once "controller/materia.controller.php";
}

 ?>





<div class="footer">
  <p>Mis notas v1.1 - designed by Luis Sarmiento - 2018</p>
</div>
</body>
</html>
