<?php

/**
 * Clase usuario
 */
class Usuario {
  private string $nombre;
  private string $password;

  function __construct(string $nombre, string $password) {
    $this->nombre = $nombre;
    $this->password = $password;
  }

  function setNombre(string $nombre) {
    $this->nombre = $nombre;
  }

  function setPassword(string $password) {
    $this->password = $password;
  }

  function getNombre(): string {
    return $this->nombre;
  }

  function getPassword(): string {
    return $this->password;
  }
}
