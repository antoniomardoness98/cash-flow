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
                <div class="py-3 mb-3 bg-white border-bottom">
                    <div class="container-fluid container-account">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="media align-items-center">
                                    <div class="media-body lh-1">
                                        <p class="h4 m-0">Nombre Apellido</p>
                                        <p class="text-muted mb-0">Dueño</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <ul class="nav" id="accountTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                                aria-controls="overview">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                                aria-controls="settings">Configuración</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="accountTabsContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card card-account">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group form-row">
                                                    <div class="col-lg-6">
                                                        <label>Nombre</label>
                                                        <div class="input-group input-group--inline">
                                                            <div class="input-group-addon">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                            <input type="text" class="form-control" name="firstname"
                                                                placeholder="Ingrese su nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Apellido</label>
                                                        <div class="input-group input-group--inline">
                                                            <div class="input-group-addon">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                            <input type="text" class="form-control" name="lastname"
                                                                placeholder="Ingrese su apellido">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Correo</label>
                                                    <div class="input-group input-group--inline">
                                                        <div class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </div>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Ingrese su correo">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary">Guardar cambios</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Contraseña Actual</label><br>
                                                <input autocomplete="off" class="form-control" type="password"
                                                    name="password" placeholder="Ingrese su contraseña actual">
                                            </div>
                                            <div class="form-group">
                                                <label>Contraseña Nueva</label><br>
                                                <input autocomplete="off" class="form-control" type="password"
                                                    name="user[password]" placeholder="Ingrese su contraseña nueva">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_password_confirmation">Confirmación Contraseña</label><br>
                                                <input class="form-control" type="password"
                                                    name="password_confirmation" id="user_password_confirmation" placeholder="Confirme su contraseña nueva">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        if ($consulta[0]['usuario_rol'] == 1){
            require_once('../../includes/navbar.php'); 
        } else {
            require_once('../../includes/navbar-user.php'); 
        }
    ?>
</body>

</html>