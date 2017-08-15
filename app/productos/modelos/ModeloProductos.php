<?php

require_once "app/core/HelperDatos.php";

class ModeloProductos
{
  public function obtenerTodos()
  {
    $miConexion=HelperDatos::obtenerConexion();
    $resultado=$miConexion->query("call obtener_productos()");
    return $resultado;
  }
   public function obtenerUno()
  {
    $miConexion=HelperDatos::obtenerConexion();
    $id=$_REQUEST['id'];
    $resultado=$miConexion->query("call obtener_producto($id)");
    $registro= mysqli_fetch_array($resultado);
    return $registro;
  }
  public function eliminar()
  {
      //compruebo si existe la variable
    if (isset ($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $miConexion=HelperDatos::obtenerConexion();
        $resultado=$miConexion->query("call eliminar_producto($id)");
    }
  }
   public function guardar() {
      $miConexion=HelperDatos::obtenerConexion();

      $id=$_REQUEST['txtProductosId'];
      $des=$_REQUEST['txtProductosdescripcion'];
      $pre=$_REQUEST['txtProductosprecio'];    
      $rubid=$_REQUEST['cboRubro'];
      
     
      if($id>0)
      {
        $parametros="'$des','$pre',$rubid,";
        $resultado=$miConexion->query("call modificar_producto($parametros)");
      }
      else
      {
        $parametros="'$des','$pre',$rubid,";
        $resultado=$miConexion->query("call insertar_producto($parametros)");
      }


      //$resultado=$miConexio->query("call insertar_cliente('$dni','$fechanac','$fot',$locid,'$nom','$tel')");
    }
}

