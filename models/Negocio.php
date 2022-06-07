<?php 

  class Negocio extends Conectar{

    public function get_negocio_x_id($negocio_id){
      $con = parent::conexion();
      parent::set_names();
      $sql = "SELECT * FROM negocios WHERE negocio_id = :negocio_id";
      $sql = $con->prepare($sql);
      $sql->bindValue(":negocio_id", $negocio_id);
      $sql->execute();
      return $resultado=$sql->fetchAll();
    }

    public function listar_negocios_activos(){
      $con = parent::conexion();
      parent::set_names();
      $sql = "SELECT 
                negocio_id,
                negocio_nombre
              FROM negocios
              WHERE negocio_estado = 1";
      $sql = $con->prepare($sql);
      $sql->execute();
      return $resultado=$sql->fetchAll();
    }

    public function crear_negocio($negocio_nombre){
        $con = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                  negocios (negocio_id, negocio_nombre, negocio_estado) 
                VALUES 
                  (NULL, :negocio_nombre, 1)";
        $sql = $con->prepare($sql);
        $sql->bindValue(":negocio_nombre", $negocio_nombre);
        $sql->execute();
        $resultado=$sql->fetchAll();

        $mensaje_registro = 'Se ha registrado el negocio:'.$negocio_nombre;
        $registro_adm = "INSERT INTO registros_usuarios (registro_usuario_descripcion, usuario_id) VALUES (:mensaje_registro, :usuario_session)";
        $registro_adm = $con->prepare($registro_adm);
        $registro_adm -> bindValue(":mensaje_registro", $mensaje_registro);
        $registro_adm -> bindValue(":usuario_session", $_SESSION['id_usuario']);
        $registro_adm -> execute();
    }

    public function editar_negocio($negocio_id, $negocio_nombre){
        $con = parent::conexion();
        parent::set_names(); 

        $negocio = new Negocio();
        $get_negocio = $negocio->get_negocio_x_id($negocio_id);
        $older_nombre = $get_negocio[0]['negocio_nombre'];

        $sql = "UPDATE negocios
                SET 
                  negocio_nombre = :negocio_nombre
                WHERE
                  negocio_id = :negocio_id";
        $sql = $con->prepare($sql);
        $sql->bindValue(":negocio_nombre", $negocio_nombre);
        $sql->bindValue(":negocio_id", $negocio_id);
        $sql->execute();
        $resultado=$sql->fetchAll();

        $mensaje_registro = 'El negocio: '.$older_nombre.' se ha modificado a: '.$negocio_nombre;
        $registro_adm = "INSERT INTO registros_usuarios (registro_usuario_descripcion, usuario_id) VALUES (:mensaje_registro, :usuario_session)";
        $registro_adm = $con->prepare($registro_adm);
        $registro_adm -> bindValue(":mensaje_registro", $mensaje_registro);
        $registro_adm -> bindValue(":usuario_session", $_SESSION['id_usuario']);
        $registro_adm -> execute();
    }

    public function eliminar_negocio($negocio_id){
        $con = parent::conexion();
        parent::set_names();
        $sql = "UPDATE negocios SET negocio_estado = 0 WHERE negocio_id = :negocio_id";
        $sql = $con->prepare($sql);
        $sql -> bindValue(":negocio_id", $negocio_id);
        $sql->execute();

        $negocio = new Negocio();
        $get_negocio = $negocio->get_negocio_x_id($negocio_id);
        $negocio_nombre = $get_negocio[0]['negocio_nombre'];

        $mensaje_registro = 'Se ha eliminado el negocio: '.$negocio_nombre;
        $registro_adm = "INSERT INTO registros_usuarios (registro_usuario_descripcion, usuario_id) VALUES (:mensaje_registro, :usuario_session)";
        $registro_adm = $con->prepare($registro_adm);
        $registro_adm -> bindValue(":mensaje_registro", $mensaje_registro);
        $registro_adm -> bindValue(":usuario_session", $_SESSION['id_usuario']);
        $registro_adm -> execute();
    }

    public function traer_mis_negocios_asociados($rol_usuario){
      $con = parent::conexion();
      parent::set_names();

      if ($rol_usuario == 1){
        $sql = "SELECT 
                *
                FROM negocios 
                WHERE negocio_estado = 1";
        $sql = $con -> prepare($sql);
        $sql -> bindValue(":usuario_id", $_SESSION['id_usuario']);
        $sql -> execute(); 
        return $resultado = $sql->fetchAll();
      } else {
        $sql = "SELECT 
                n.negocio_nombre,
                a.negocio_id
                FROM acceso_usuarios a, negocios n
                WHERE a.usuario_id = :usuario_id AND n.negocio_id = a.negocio_id";
        $sql = $con -> prepare($sql);
        $sql -> bindValue(":usuario_id", $_SESSION['id_usuario']);
        $sql -> execute(); 
        return $resultado = $sql->fetchAll();
      }

      
    }

    public function todos_los_negocios(){
      $con = parent::conexion();
      parent::set_names();
      $sql = "SELECT 
                *
              FROM negocios
              WHERE negocio_estado = 1";
      $sql = $con -> prepare($sql);
      $sql -> execute(); 
      return $resultado = $sql->fetchAll();
    }

  }

?>

