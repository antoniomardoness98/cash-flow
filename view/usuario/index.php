<?php
    
    session_start(); 
    require("../../config/conexion.php"); 
    require("../../models/Usuario.php");
    $usuario = new Usuario();

    if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
      $consulta = $usuario->get_usuario_x_id($_SESSION['id_usuario']);
      $resultado = null;

      if (count($consulta)>0 && $consulta[0]['usuario_rol'] == 1) {
        $resultado = $consulta;
      } else {
        header('Location: ../login/');
      }

    } else {
      header('Location: ../login/');
    }
    require_once('../../includes/header.php'); 
?> 
<div>
    
</div>
<div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
    <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable">
        <!-- CONTENT BODY -->
        <div class="container-fluid">
            <h2>Usuario</h2>
            <p>El siguiente apartado permite la administración de usuarios, como también permite asignar negocios a los mismos</p>
            <hr>
            <div class="card">
                <div class="py-4">
                    <button id="btn_usuario" class="btn btn-block btn-primary py-2">Agregar usuario</button>
                    <div class="table-responsive py-4">
                        <table id="usuario_data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="wd-10p">Nombre</th>
                                    <th class="wd-10p">Apellido</th>
                                    <th class="wd-10p">Email</th>
                                    <th class="wd-10p">Editar </th>
                                    <th class="wd-10p">Asignar </th>
                                    <th class="wd-10p">Eliminar </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="wd-10p">Nombre</th>
                                    <th class="wd-10p">Apellido</th>
                                    <th class="wd-10p">Email</th>
                                    <th class="wd-10p">Editar </th>
                                    <th class="wd-10p">Asignar </th>
                                    <th class="wd-10p">Eliminar </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php require_once("modal_usuario.php");?>
    <?php require_once("modal_asignar_negocio.php"); ?>
    <?php require_once('../../includes/navbar.php'); ?>
    <script src="../../assets/vendor/jquery.dataTables.js"></script>
    <script src="../../assets/vendor/dataTables.bootstrap4.js"></script>
    <script src="mnt_usuario.js"></script>

    <script>
        $('#data-table').dataTable();
    </script>


    </body>

    </html>