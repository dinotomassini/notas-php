<?php
include_once '../../config.php';
include_once ROOT . '/src/models/Usuario.php';

/**
 * Empieza la sesion y se fija si esta seteado el usuario, si no esta seteado lo devuelve al index
 */
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: /index.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main page</title>
</head>

<body>
  <h1>Esta pagina es la del perfil</h1>

  <!-- Esta etiqueta de php es para mostrar los valores de las variabes -->
  <!-- Como el usuario estaba seteado muestra el nombre del usuario y su contraseña -->
  <p>Hola <?= $_SESSION['usuario']->getNombre() ?></p>
  <p>Tu contraseña es: <?= $_SESSION['usuario']->getPassword() ?></p>
  <p>sssshhhhhhhhhhhhhhhhhhhhhh</p>
  <br>

  <p>La sesion se destruye cuando se termina de cargar la pagina, por lo que no permite recargar y te manda al index.
  </p>
</body>
<!-- Se destruye la sesion -->
<?php session_destroy(); ?>

</html>
