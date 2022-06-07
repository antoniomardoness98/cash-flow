<?php 
  session_start(); 
  require("../config/conexion.php");
  require("../models/Login.php");
  $login = new Login();
  if (isset($_POST)) {

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $datos = $login->validar_usuario($email, $contrasena);

    /* if($datos == 1){

      $usuario_id = $datos[0]['usuario_id'];
      $usuario_rol = $datos[0]['usuario_rol'];
      $usuario_estado = $datos[0]['usuario_estado'];

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
      
    } else{
      echo '<script language="javascript">alert("Error de autentificación");window.location.href="../view/login/"</script>';
    } */
  } else{
    echo '<h1>No puedes entrar sin acceso</h1>';
  }
?>

