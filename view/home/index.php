<?php
    
    session_start(); 
    require("../../config/conexion.php"); 
    require("../../models/Usuario.php");
    $usuario = new Usuario();

    if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
      $consulta = $usuario->get_usuario_x_id($_SESSION['id_usuario']);
      $resultado = null;

      if (count($consulta)>0 && $consulta[0]['usuario_rol'] == 1 || $consulta[0]['usuario_rol'] == 0) {
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
            <div class="card-deck">
                <div class="card p-2 pl-3 pr-3">
                    <div class="media align-items-center">
                        <div class="doughnut-chart-wrapper mr-1">
                            <div class="doughnut-chart-text">
                                <div>
                                    <h3 class="text-danger">12%</h3>
                                    <small>TODAY</small>
                                </div>
                            </div>
                            <canvas class="doughnut-chart" data-percent="12" width="100" height="100"></canvas>
                        </div>
                        <div class="media-body">
                            <h3 class="mb-0">$1,020</h3>
                            <span>Total Sales</span>
                        </div>
                    </div>
                </div>
                <div class="card p-2 pl-3 pr-3">
                    <div class="media align-items-center">
                        <div class="doughnut-chart-wrapper mr-1">
                            <div class="doughnut-chart-text">
                                <div>
                                    <h3 class="text-success">68%</h3>
                                    <small>MONTH</small>
                                </div>
                            </div>
                            <canvas class="doughnut-chart" data-percent="68" width="100" height="100"></canvas>
                        </div>
                        <div class="media-body">
                            <h3 class="mb-0">$6,670</h3>
                            <span>Sales for June</span>
                        </div>
                    </div>
                </div>
                <div class="card p-2 pl-3 pr-3">

                    <div class="media justify-items-center align-items-center h-md-100">
                        <i class="material-icons md-48 text-link-color">account_circle</i>
                        <div class="media-body pl-2">
                            <h3 class="mb-0 text">87%</h3>
                            <span>Sign-Up Percentage</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="card p-2 pl-3 pr-3">
                    <div class="media justify-items-center align-items-center h-md-100">
                        <i class="material-icons text-success md-48">check_circle</i>
                        <div class="media-body pl-2">
                            <h4 class="m-0">Network Stats</h4>
                            <span>All systems working!</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-8">
                    <div class="card card-sales">
                        <div class="card-header bg-faded">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <h4 class="card-title">Sales</h4>
                                </div>
                                <div class="col-lg-10">
                                    <form class="form-inline float-right">
                                        <div class="form-group mr-3">
                                            <label class="control-label mr-1">From:</label>
                                            <input type="text" class="datepicker form-control" value="10/24/2017">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="control-label mr-1">To: </label>
                                            <input type="text" class="datepicker form-control" value="10/25/2017">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="clearfix"></div>
                            <div style="height: 250px; width: 100%;">
                                <canvas id="dashboard-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                History
                            </h4>
                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-between pb-1">
                                <span>January</span>
                                <div>
                                    <strong>$10,000</strong> <span>/ $20,000</span>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 52%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="d-flex justify-content-between pb-1">
                                <span>February</span>
                                <div>
                                    <strong>$8,250</strong> <span>/ $5,230</span>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="d-flex justify-content-between pb-1">
                                <span>March</span>
                                <div>
                                    <strong>$1,150</strong> <span>/ $8,120</span>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 22%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="d-flex justify-content-between pb-1">
                                <span>April</span>
                                <div>
                                    <strong>$4,625</strong> <span>/ $11,450</span>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="d-flex justify-content-between pb-1">
                                <span>May</span>
                                <div>
                                    <strong>$5,875</strong> <span>/ $12,600</span>
                                </div>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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

    <script src="../../assets/vendor/fullcalendar.min.js"></script>
    <script src="../../assets/js/calendars.js"></script>
    <script src="../../assets/js/charts_index.js"></script>


    </body>

    </html>