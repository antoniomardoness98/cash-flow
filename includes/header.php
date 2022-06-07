<!DOCTYPE html>
<html lang="es" dir="ltr" class="theme-default">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CashFlow</title>

    <link type="text/css" href="../../assets/css/themes/default/vendor-bootstrap-datatables.css" rel="stylesheet">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Simplebar -->
    <link type="text/css" href="../../assets/vendor/simplebar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="../../assets/css/themes/default/app.css" rel="stylesheet">

</head>

<body>
    <div class="d-flex flex-column position-relative h-100">

        <nav class="navbar navbar-expand-md navbar-light d-print-none">
            <a class="navbar-brand" href="../home/">
                <!-- SVG Logo -->
                <svg width="24px" height="24px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMaxYMin meet">
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <path
                            d="M3,-3.15936513e-15 L20,-2.74650094e-15 L20,-2.66453526e-15 C21.6568542,-2.96889791e-15 23,1.34314575 23,3 L23,20 L23,20 C23,21.6568542 21.6568542,23 20,23 L6,23 L3,23 L3,23 C1.34314575,23 1.09108455e-15,21.6568542 8.8817842e-16,20 L0,3 L0,3 C-2.02906125e-16,1.34314575 1.34314575,-3.24835102e-15 3,-3.55271368e-15 Z"
                            id="logoBackground"></path>
                        <rect id="Rectangle-6" fill="#FFFFFF" x="1.0952381" y="12.0960631" width="9.96553315"
                            height="9.76943696"></rect>
                        <rect id="Rectangle-6-Copy" fill="#FFFFFF" x="11.9533428" y="1.05597629" width="9.96553315"
                            height="9.76943696"></rect>
                    </g>
                </svg>
                <!-- //End SVG Logo -->

                <span class="navbar-brand-text">CashFlow</span>
                <small class="text-muted"></small>
            </a>
            <button class="navbar-toggler navbar-toggler-right d-md-none d-lg-none" type="button" data-toggle="sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown nav-dropdown">
                        <a href="#" class="nav-link dropdown-toggle dropdown-clear-caret" data-toggle="dropdown"
                            aria-expanded="false">
                            <?php  
                                require_once("../../config/conexion.php"); 
                                require_once("../../models/Usuario.php");
                                $usuario = new Usuario();
                                $datos = $usuario->get_usuario_x_id($_SESSION['id_usuario']);
                            ?>
                            <?php foreach($datos as $datos_usuario): ?>
                                <span class="logged-name hidden-md-down"><?php echo $datos_usuario['usuario_nombre']." ". $datos_usuario['usuario_apellido']; ?></span>
                            <?php endforeach ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-account">
                            <div class="account-info">
                                <div class="lh-12">
                                    <a href="#"><strong><?php echo $datos_usuario['usuario_nombre']." ". $datos_usuario['usuario_apellido']; ?></strong></a>
                                    <div class="text-light">Bienvenido</div>
                                </div>
                            </div>
                            <ul class="list-unstyled account-menu">
                                <li><a href="../perfil/" class="dropdown-item "><i
                                            class="material-icons md-18 align-middle mr-1">account_circle</i> <span
                                            class="align-middle">Perfil</span></a></li>
                                <li><a href="../cerrar_session.php" class="dropdown-item"><i
                                            class="material-icons md-18 align-middle mr-1">exit_to_app</i> <span
                                            class="align-middle">Cerrar Sesión</span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>