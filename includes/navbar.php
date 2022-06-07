<!-- drawer -->
<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                <div class="mdk-drawer__content">
                    <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">

                        <nav class="drawer  drawer--dark">
                            <!-- MENU -->
                            <ul class="drawer-menu" id="mainMenu" data-children=".drawer-submenu">
                                <li class="drawer-menu-item ">
                                    <a href="../home/">
                                        <i class="material-icons">home</i>
                                        <span class="drawer-menu-text"> Inicio</span>
                                    </a>
                                </li>
                                <li class="drawer-menu-item ">
                                    <a href="../transaccion/">
                                        <i class="material-icons">receipt_long</i>
                                        <span class="drawer-menu-text"> Transacciones</span>
                                    </a>
                                </li>
                                <li class="drawer-menu-item ">
                                    <a href="../negocio/">
                                        <i class="material-icons">store</i>
                                        <span class="drawer-menu-text"> Negocios</span>
                                    </a>
                                </li>
                                <li class="drawer-menu-item ">
                                    <a href="../usuario/">
                                        <i class="material-icons">people_alt</i>
                                        <span class="drawer-menu-text"> Usuarios</span>
                                    </a>
                                </li>
                                <li class="drawer-menu-item ">
                                    <a href="../perfil/">
                                        <i class="material-icons">people_alt</i>
                                        <span class="drawer-menu-text"> Perfil</span>
                                    </a>
                                </li>
                                <li class="drawer-menu-item ">
                                    <a href="../cerrar_session.php">
                                        <i class="material-icons">exit_to_app</i>
                                        <span class="drawer-menu-text"> Cerrar Sesión</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- HEADING -->
                        </nav>

                    </div>
                </div>
            </div>

        </div>
        <!-- // END drawer-layout -->
    </div>

    <!-- jQuery -->
    <script src="../../assets/vendor/jquery.js"></script>
    <script src="../../assets/vendor/jquery-ui.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/vendor/popper.js"></script>
    <script src="../../assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <!-- Used for adding a custom scrollbar to the drawer -->
    <script src="../../assets/vendor/simplebar.js"></script>

    <script src="../../assets/vendor/Chart.min.js"></script>
    <script src="../../assets/vendor/moment.min.js"></script>
    <script src="../../assets/vendor/dateformat.js"></script>
    <script src="../../assets/vendor/bootstrap-datepicker.min.js"></script>
    
    <script>
        window.theme = "default";
    </script>
    <script src="../../assets/js/color_variables.js"></script>
    <script src="../../assets/js/app.js"></script>

    <script src="../../assets/vendor/dom-factory.js"></script>
    <!-- DOM Factory -->
    <script src="../../assets/vendor/material-design-kit.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- MDK -->

    <script>
        (function () {
            'use strict';

            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit()

            // Connect button(s) to drawer(s)
            var sidebarToggle = Array.prototype.slice.call(document.querySelectorAll('[data-toggle="sidebar"]'))

            sidebarToggle.forEach(function (toggle) {
                toggle.addEventListener('click', function (e) {
                    var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                    var drawer = document.querySelector(selector)
                    if (drawer) {
                        drawer.mdkDrawer.toggle()
                    }
                })
            })
        })();
    </script>