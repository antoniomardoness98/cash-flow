<?php 

  Class Login extends Conectar{

    public function validar_usuario($email, $contrasena){ //traemos todos los articulos del inventario
        $con = parent::conexion();
        parent::set_names();
        $sql = $con->prepare("SELECT * FROM usuarios WHERE usuario_email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();
        $resultado=$sql->fetchAll();

        if(count($resultado) > 0 && password_verify($contrasena, $resultado[0]['usuario_contrasena'])){
          $usuario_id = $resultado[0]['usuario_id'];
          $usuario_rol = $resultado[0]['usuario_rol'];
          $usuario_estado = $resultado[0]['usuario_estado'];

          if ($usuario_rol == 1 && $usuario_estado == 1) {
            $_SESSION['id_usuario'] = $usuario_id;
            $_SESSION['id_rol'] = $usuario_rol;
            header('Location: ../view/home/'); 
            
          } else if($usuario_rol == 0 && $usuario_estado == 1){
            $_SESSION['id_usuario'] = $usuario_id;
            $_SESSION['id_rol'] = $usuario_rol;
            header('Location: ../view/home/');
          } else {
            echo '<script language="javascript">alert("Error de autentificación");window.location.href="../view/login/"</script>';
          }
        } else {
          echo '<script language="javascript">alert("Error de autentificación");window.location.href="../view/login/"</script>';
        }
    }
  }

?>