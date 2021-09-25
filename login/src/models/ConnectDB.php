<?php

include_once '../../config.php';

/**
 * Clase para la conexion con la base de datos, se utiliza mysli con poo
 */
class ConnectDB {
  private const DB_HOST = DB_HOST;
  private const DB_USER = DB_USER;
  private const DB_PASS = DB_PASS;
  private const DB_NAME = DB_NAME;
  private const DB_PORT = DB_PORT;

  // Variable estatica para la conexion
  private static ?mysqli $conn = null;

  private function __construct() {
  }

  /**
   * Realiza la conexion con la base de datos
   * @return mysqli|null retorna la conexion o null en caso de fallo
   */
  public static function connect(): ?mysqli {
    // Intenta realizar la conexion
    try {
      // Antes se fija si no existe ya la conexion
      if (is_null(self::$conn)) {
        // Inicia la conexion
        self::$conn = new mysqli(
          self::DB_HOST,
          self::DB_USER,
          self::DB_PASS,
          self::DB_NAME,
          self::DB_PORT
        );
        // Revisa que la conexion no de error
        if (self::$conn->connect_errno) {
          throw new RuntimeException('Error myslqi conexion: ', self::$conn->connect_errno);
        }
      }
      // Este bloque es para cuando da error la conexion
    } catch (mysqli_sql_exception $e) {
      echo '<p>Error: </p> <br> <p>' . $e . '</p> <br>';
    }
    // Retorna la conexion
    return self::$conn;
  }

  /**
   * Termina la conexion con la base de datos
   */
  public static function disconnect() {
    self::$conn->close();
  }
}
