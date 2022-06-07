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
            <h2>Negocios</h2>
            <p>El siguiente apartado permite la administración de negocios</p>
            <hr>
            <div class="card">
                <div class="py-4">
                    <button id="btn_negocio" class="btn btn-block btn-primary py-2">Agregar negocio</button>
                    <div class="table-responsive py-4">
                        <table id="negocio_data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="wd-10p">Nombre</th>
                                    <th class="wd-10p">Editar</th>
                                    <th class="wd-10p">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="wd-10p">Nombre</th>
                                    <th class="wd-10p">Editar</th>
                                    <th class="wd-10p">Eliminar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("modal_negocio.php");?>
    <?php require_once('../../includes/navbar.php'); ?>
    <script src="../../assets/vendor/jquery.dataTables.js"></script>
    <script src="../../assets/vendor/dataTables.bootstrap4.js"></script>
    <script src="mnt_negocio.js"></script>

    <script>
        $('#data-table').dataTable();
    </script>


    </body>

    </html>