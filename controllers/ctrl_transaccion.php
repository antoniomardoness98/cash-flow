<?php
  session_start();
  require_once("../config/conexion.php");
  require_once("../models/Transaccion.php");
  $transaccion = new Transaccion();

  switch ($_GET["opcion"]) {

    case 'realizar_transaccion':
      $resultado = $transaccion->realizar_transaccion($_POST['transaccion_tipo'], $_POST["id_negocio"], $_POST['transaccion_monto']);
      if($resultado == 1){
        echo "<script text=javascript>alert('La transaccion ha sido realizada con exito')</script>";
      }
      
      break;
  }
?>