<?php
    
    session_start(); 
    require("../../config/conexion.php"); 
    require("../../models/Usuario.php");
    $usuario = new Usuario();

    if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
      $consulta = $usuario->get_usuario_x_id($_SESSION['id_usuario']);
      $rol_usuario = $consulta[0]['usuario_rol'];
      $resultado = null;

      if (count($consulta)>0) {
        $resultado = $consulta;
      } else {
        header('Location: ../login/');
      }

    } else {
      header('Location: ../login/');
    }
    require_once('../../includes/header.php'); 
?> 
<div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
    <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable">
        <!-- CONTENT BODY -->
        <div class="container-fluid">
            <h2>Transacciones</h2>
            <hr>
            <div class="card">
              <form id="transaccion_form" action="#" method="POST" class="py-4 p-4" onsubmit="return false">
                <div class="form-group">
                    <label for="transaccion_tipo">Tipo de transacción</label>
                    <br>
                    <select name="transaccion_tipo" id="transaccion_tipo" class="custom-select col-md-5">
                        <option value="1">Ingreso de dinero</option>
                        <option value="0">Gasto de dinero</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_negocio">Seleccione negocio</label>
                    <br>
                    <?php
                        require_once("../../models/Negocio.php");
                        $negocio = new Negocio();
                        $datos = $negocio->traer_mis_negocios_asociados($rol_usuario);   
                      ?>
                    <select name="id_negocio" id="id_negocio" class="custom-select col-md-5">
                      <?php 
                      foreach($datos as $negocios): ?>
                        <option value="<?php echo $negocios['negocio_id'] ?>"><?php echo $negocios['negocio_nombre'] ?></option>
                      <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transaccion_monto">Ingrese monto de dinero</label>
                    <br>
                    <input class="form-control col-md-5" type="number" placeholder="sin puntos" id="transaccion_monto" name="transaccion_monto"> 
                </div>
                
                <button id="btn_transaccion" type="submit" class="btn btn-primary">Realizar transacción</button>
              </form>

            </div>
        </div>
    </div>

    <?php
        if ($rol_usuario == 1){
            require_once('../../includes/navbar.php'); 
        } else {
            require_once('../../includes/navbar-user.php'); 
        }
    ?>

    <script src="../../assets/vendor/jquery.dataTables.js"></script>
    <script src="../../assets/vendor/dataTables.bootstrap4.js"></script>

    <script>
        $('#data-table').dataTable();
    </script>

    <script src="mnt_transaccion"></script>;


    </body>

    </html>