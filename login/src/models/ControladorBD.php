<?php

include_once '../../config.php';
include_once ROOT . '/src/models/ConnectDB.php';
include_once ROOT . '/src/models/Usuario.php';

/**
 * Clase con metodos para interactuar con la base de datos
 */
class ControladorDB {

  private function __contruct() {
  }

  /**
   * Funcion para buscar un usuario en la base de datos
   * @param string nombre del usuario
   * @param string contraseña del usuario
   * @return Usuario|null devuelve un objeto de la usuario o null si falla
   */
  public static function buscarUsuario(string $user, string $pass): ?Usuario {
    // Sentencia SQL se pone el marcador ? para evitar inyecciones sql
    $sql = "select * from Usuarios where usuario=? and password=?";
    // Se llama a la base de datos
    $db = ConnectDB::connect();
    // Se prepara la sentencia
    $stmt = $db->prepare($sql);
    // Se le pasan los datos que no se pusieron en la sentencia, primero va el tipo de dato y despues el dato(variable)
    $stmt->bind_param("ss", $user, $pass);
    // Se ejecuta la query, si sale bien devuelve el resultado, si no devuelve falso
    $result = $stmt->execute() ? $stmt->get_result() : false;
    // Desconecta la base de datos
    ConnectDB::disconnect();
    $usuario = null;
    // Verifica si hay resultado
    if ($result) {
      // Verifica que encontro un usuario
      if ($result->num_rows == 1) {
        // Se convierte el resultado en un objeto Usuario
        $usuario = $result->fetch_object('Usuario', [$user, $pass]);
      }
    }
    return $usuario;
  }
}
