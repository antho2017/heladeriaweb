<?php

require_once "app/core/HelperDatos.php";

class ModeloLocalidades
{
  public function obtenerTodos()
  {
    $miConexion=HelperDatos::obtenerConexion();
    $resultado=$miConexion->query("call obtener_localidades");
    return $resultado;
  }
}
