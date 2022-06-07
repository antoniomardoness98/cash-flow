<?php 


  class Usuario extends Conectar{

    public function get_usuario_x_id($usuario_id){
      $con = parent::conexion();
      parent::set_names();
      $sql = "SELECT * FROM usuarios WHERE usuario_id = :usuario_id";
      $sql = $con->prepare($sql);
      $sql->bindValue(":usuario_id", $usuario_id);
      $sql->execute();
      return $resultado=$sql->fetchAll();
    }

    public function listar_usuarios_activos(){
      $con = parent::conexion();
      parent::set_names();
      $sql = "SELECT 
                usuario_id,
                usuario_nombre,
                usuario_apellido,
                usuario_email
              FROM usuarios
              WHERE usuario_estado = 1 AND usuario_rol = 0";
      $sql = $con->prepare($sql);
      $sql->execute();
      return $resultado=$sql->fetchAll();
    }

    public function crear_usuario($usuario_nombre, $usuario_apellido, $usuario_email, $usuario_contrasena){
        $con = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                  usuarios (usuario_id, usuario_rol, usuario_nombre, usuario_apellido, usuario_email, usuario_contrasena, usuario_estado) 
                VALUES 
                  (NULL, 0, :usuario_nombre, :usuario_apellido, :usuario_email,:usuario_contrasena, 1)";
        $sql = $con->prepare($sql);
        $sql->bindValue(":usuario_nombre", $usuario_nombre);
        $sql->bindValue(":usuario_apellido", $usuario_apellido);
        $sql->bindValue(":usuario_email", $usuario_email);
        $password = password_hash($usuario_contrasena, PASSWORD_BCRYPT);
        $sql->bindValue(":usuario_contrasena", $password);
        $sql->execute();
        $resultado=$sql->fetchAll();

        $mensaje_registro = 'Se ha registrado el usuario: '.$usuario_nombre.' '.$usuario_apellido;
        $registro_adm = "INSERT INTO registros_usuarios (registro_usuario_descripcion, usuario_id) VALUES (:mensaje_registro, :usuario_session)";
        $registro_adm = $con->prepare($registro_adm);
        $registro_adm -> bindValue(":mensaje_registro", $mensaje_registro);
        $registro_adm -> bindValue(":usuario_session", $_SESSION['id_usuario']);
        $registro_adm -> execute();
    }

    public function editar_usuario($usuario_id, $usuario_nombre, $usuario_apellido, $usuario_email, $usuario_contrasena){
        $con = parent::conexion();
        parent::set_names(); 

        $usuario = new Usuario();
        $get_user = $usuario->get_usuario_x_id($usuario_id);
        $older_nombre = $get_user[0]['usuario_nombre'];
        $older_apellido = $get_user[0]['usuario_apellido'];

        $sql = "UPDATE usuarios
                SET 
                  usuario_nombre = ?,
                  usuario_apellido = ?,
                  usuario_email = ?,
                  usuario_contrasena = ?
                WHERE
                  usuario_id = ?";
        $sql = $con->prepare($sql);
        $sql->bindValue(1, $usuario_nombre);
        $sql->bindValue(2, $usuario_apellido);
        $sql->bindValue(3, $usuario_email);
        $sql->bindValue(4, $usuario_contrasena);
        $sql->bindValue(5, $usuario_id);
        $sql->execute();
        $resultado=$sql->fetchAll();

        $mensaje_registro = 'El usuario: '.$older_nombre.' '.$older_apellido.' se ha modificado a: '.$usuario_nombre.' '.$usuario_apellido;
        $registro_adm = "INSERT INTO registros_usuarios (registro_usuario_descripcion, usuario_id) VALUES (:mensaje_registro, :usuario_session)";
        $registro_adm = $con->prepare($registro_adm);
        $registro_adm -> bindValue(":mensaje_registro", $mensaje_registro);
        $registro_adm -> bindValue(":usuario_session", $_SESSION['id_usuario']);
        $registro_adm -> execute();
    }

    public function eliminar_usuario($usuario_id){
        $con = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuarios SET usuario_estado = 0 WHERE usuario_id = :usuario_id";
        $sql = $con->prepare($sql);
        $sql -> bindValue(":usuario_id", $usuario_id);
        $sql->execute();

        $usuario = new Usuario();
        $get_user = $usuario->get_usuario_x_id($usuario_id);
        $usuario_nombre = $get_user[0]['usuario_nombre'];
        $usuario_apellido = $get_user[0]['usuario_apellido'];
        $mensaje_registro = 'Se ha eliminado el usuario: '.$usuario_nombre.' '.$usuario_apellido;
        $registro_adm = "INSERT INTO registros_usuarios (registro_usuario_descripcion, usuario_id) VALUES (:mensaje_registro, :usuario_session)";
        $registro_adm = $con->prepare($registro_adm);
        $registro_adm -> bindValue(":mensaje_registro", $mensaje_registro);
        $registro_adm -> bindValue(":usuario_session", $_SESSION['id_usuario']);
        $registro_adm -> execute();

    }

    public function asignar_negocio($usuario_id, $negocio_id){
      $con = parent::conexion();
      parent::set_names();

      $sql_validacion = "SELECT * FROM acceso_usuarios WHERE negocio_id = :negocio_id AND usuario_id = :usuario_id";
      $sql_validacion = $con -> prepare($sql_validacion);
      $sql_validacion -> bindValue(":negocio_id", $negocio_id);
      $sql_validacion -> bindValue(":usuario_id", $usuario_id);
      $sql_validacion -> execute(); 
      $validar_negocio = $sql_validacion->fetchAll();

      if(count($validar_negocio)>0){
        echo "imposible asignar negocio...";
      } else {
        $sql = "INSERT INTO acceso_usuarios (acceso_usuarios_id, negocio_id, usuario_id) VALUES (NULL, :negocio_id, :usuario_id)";
        $sql = $con -> prepare($sql);
        $sql -> bindValue(":negocio_id", $negocio_id);
        $sql -> bindValue(":usuario_id", $usuario_id);
        $sql -> execute(); 
        $resultado = $sql->fetchAll();
  
        $usuario = new Usuario();
        $get_usuario = $usuario->get_usuario_x_id($usuario_id);
        $nombre_usuario = $get_usuario[0]['usuario_nombre'];
        $apellido_usuario = $get_usuario[0]['usuario_apellido'];
  
        $mensaje_registro = 'Se ha asignado un negocio a: '.$nombre_usuario.' '.$apellido_usuario;
        $registro_adm = "INSERT INTO registros_usuarios (registro_usuario_descripcion, usuario_id) VALUES (:mensaje_registro, :usuario_session)";
        $registro_adm = $con->prepare($registro_adm);
        $registro_adm -> bindValue(":mensaje_registro", $mensaje_registro);
        $registro_adm -> bindValue(":usuario_session", $_SESSION['id_usuario']);
        $registro_adm -> execute();
      }



    }

  }

?>

