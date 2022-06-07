<?php 

class Transaccion extends Conectar{

  public function realizar_transaccion($transaccion_tipo, $negocio_id, $transaccion_monto){
    $transaccion_descripcion = "Se ha realizado una transferencia de: ".$transaccion_monto;
    $con = parent::conexion();
    parent::set_names();
    $sql = "INSERT INTO 
              transacciones (transaccion_id, transaccion_fecha, transaccion_creacion, transaccion_descripcion, transaccion_monto, transaccion_tipo, negocio_id, usuario_id) 
            VALUES 
              (NULL, NOW(), NOW(), :transaccion_descripcion, :transaccion_monto, :transaccion_tipo, :negocio_id, :usuario_id)";
    $sql = $con->prepare($sql);
    $sql->bindValue(":transaccion_descripcion", $transaccion_descripcion);
    $sql->bindValue(":transaccion_monto", $transaccion_monto);
    $sql->bindValue(":transaccion_tipo", $transaccion_tipo);
    $sql->bindValue(":negocio_id", $negocio_id);
    $sql->bindValue(":usuario_id", $_SESSION['id_usuario']);
    $sql->execute();
    $resultado=$sql->fetchAll();
    return 1;
  }

}

?>