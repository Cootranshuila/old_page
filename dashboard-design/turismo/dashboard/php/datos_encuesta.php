<?php

extract($_REQUEST);
// require "../../../assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

function datos_total(){ ?>
    
    <div class="row">
        <div class="col-sm-4">
          <div class="callout callout-info">
            <small class="text-muted">Encuestas realizadas</small>
            <br>
            <strong class="h4">9</strong>
            <div class="chart-wrapper">
              <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-4">
          <div class="callout callout-danger">
            <small class="text-muted">Recomendaciones</small>
            <br>
            <strong class="h4">22</strong>
            <div class="chart-wrapper">
              <canvas id="sparkline-chart-2" width="100" height="30"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-4">
          <div class="callout callout-success">
            <small class="text-muted">Promedio de satisfaccion</small>
            <br>
            <strong class="h4">49</strong>
            <div class="chart-wrapper">
              <canvas id="sparkline-chart-4" width="100" height="30"></canvas>
            </div>
          </div>
        </div>
        <!-- /.row-->
    </div>

<?php }

?>