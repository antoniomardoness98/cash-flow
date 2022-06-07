<?php
  session_start();
  require_once("../config/conexion.php");
  require_once("../models/Usuario.php");
  $usuario = new Usuario();

  switch ($_GET["opcion"]) {
    
    case 'listar_usuarios_activos':
      $datos = $usuario->listar_usuarios_activos();
      $data = Array();
      foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["usuario_nombre"]; //en esta parte mostramos los datos en el orden de la tabla
        $sub_array[] = $row["usuario_apellido"];
        $sub_array[] = $row["usuario_email"];
        $sub_array[] = '<button type="button" onClick="editar('.$row["usuario_id"].');" id="'.$row["usuario_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="material-icons">edit</i></div></button>';
        $sub_array[] = '<button type="button" onClick="asignar('.$row["usuario_id"].');" id="'.$row["usuario_id"].'" class="btn btn-outline-warning btn-icon"><div><i class="material-icons">assignment</i></div></button>';
        $sub_array[] = '<button type="button" onClick="eliminar('.$row["usuario_id"].');" id="'.$row["usuario_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="material-icons">delete</i></div></button>';
        $data[]=$sub_array;
      }

      $results = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);
      echo json_encode($results);
      break;

    case 'crud_crear_y_editar':
      $datos=$usuario->get_usuario_x_id($_POST["usuario_id"]);
        if(empty($_POST["usuario_id"])){
            if(is_array($datos)==true and count($datos)==0){
                $usuario->crear_usuario($_POST["usuario_nombre"], $_POST["usuario_apellido"], $_POST["usuario_email"], $_POST["usuario_contrasena"]);
            }
        }else{
            $usuario->editar_usuario($_POST["usuario_id"], $_POST["usuario_nombre"], $_POST["usuario_apellido"], $_POST["usuario_email"], $_POST["usuario_contrasena"]);
        }
      break;

    case "mostrar_informacion_editar": //trae todos los datos para poder usarlos con un json los output deben escribirse tal cual estan en la BD
      $datos=$usuario->get_usuario_x_id($_POST["usuario_id"]);
      if(is_array($datos)==true and count($datos)>0){
          foreach($datos as $row){
              $output["usuario_id"] = $row["usuario_id"];
              $output["usuario_nombre"] = $row["usuario_nombre"];
              $output["usuario_apellido"] = $row["usuario_apellido"];
              $output["usuario_email"] = $row["usuario_email"];
              $output["usuario_contrasena"] = $row["usuario_contrasena"];
          }
         echo json_encode($output);
      }
      break;

      case 'eliminar_usuario':
        $usuario->eliminar_usuario($_POST["usuario_id"]);
        break;

      case 'asignar_negocio':
        $usuario->asignar_negocio($_POST['usuario_id'], $_POST['id_negocio']);
        break;      
  }
?>