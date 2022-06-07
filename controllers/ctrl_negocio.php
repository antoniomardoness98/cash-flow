<?php
  session_start();
  require_once("../config/conexion.php");
  require_once("../models/Negocio.php");
  $negocio = new Negocio();

  switch ($_GET["opcion"]) {
    
    case 'listar_negocios_activos':
      $datos = $negocio->listar_negocios_activos();
      $data = Array();
      foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["negocio_nombre"]; //en esta parte mostramos los datos en el orden de la tabla
        $sub_array[] = '<button type="button" onClick="editar('.$row["negocio_id"].');"  id="'.$row["negocio_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="material-icons">edit</i></div></button>';
        $sub_array[] = '<button type="button" onClick="eliminar('.$row["negocio_id"].');"  id="'.$row["negocio_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="material-icons">delete</i></div></button>';
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
      $datos=$negocio->get_negocio_x_id($_POST["negocio_id"]);
        if(empty($_POST["negocio_id"])){
            if(is_array($datos)==true and count($datos)==0){
                $negocio->crear_negocio($_POST["negocio_nombre"]);
            }
        }else{
            $negocio->editar_negocio($_POST["negocio_id"], $_POST["negocio_nombre"]);
        }
      break;

    case "mostrar_informacion_editar": //trae todos los datos para poder usarlos con un json los output deben escribirse tal cual estan en la BD
      $datos=$negocio->get_negocio_x_id($_POST["negocio_id"]);
      if(is_array($datos)==true and count($datos)>0){
          foreach($datos as $row){
              $output["negocio_id"] = $row["negocio_id"];
              $output["negocio_nombre"] = $row["negocio_nombre"];
          }
         echo json_encode($output);
      }
      break;

      case 'eliminar_negocio':
        $negocio->eliminar_negocio($_POST["negocio_id"]);
        break;
  }
?>