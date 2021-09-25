<?php

/**
 * Se llaman a los archivos auxiliares para que funcione
 */
include_once '../../config.php';
include_once ROOT . '/src/models/ControladorBD.php';
include_once ROOT . '/src/models/Usuario.php';


// Se toman los valores pasados por el formulario
$user = $_POST['user'];
$pass = $_POST['pass'];
// password_hash($_POST['pass'], BCRYPT);

// Busca si existe el usuario y corrobora la contraseña
$usuario = ControladorDB::buscarUsuario($user, $pass);

// Si se encontro un usuario inicia la sesion con sus datos, si no encuentra lo redirige al index
if ($usuario) {
  iniciarSesion($usuario);
} else {
  header('Location: /index.php');
}



/**
 * Inicia la sesion del usuario con sus datos
 * @param Usuario
 */
function iniciarSesion($usuario) {
  session_start();
  // $_SESSION['usuario'] = $usuario->usuario;
  // $_SESSION['pass'] = $usuario->password;
  $_SESSION['usuario'] = $usuario;
  header('Location: /src/views/main.php');
}
