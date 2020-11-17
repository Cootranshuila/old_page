
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 882px;">

    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cootranshuila
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> INCOYS</a></li>
        <li class="active">Nivel de Tanques </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="areaimprimir">
      <!-- Small boxes (Stat box) -->
      <div class="row">



        <script src="<?php echo base_url(); ?>assets/jqmeter.min.js"></script>

        <?php  foreach ($tanque as $tanq) { ?>

        <?php

        $temperatura = 0; $combustible =0; $agua = 0;
        $presion = 0; $filtro = 0;
        $alerta = false;
        $codegas = $this->model_medidas->load_day_tanque($tanq->tanq_codigo);

        foreach ($codegas as $value) {

          $temperatura = $value->med_temperatura;
          $combustible = $value->med_nivel_combustible;
          $agua = $value->med_nivel_agua;
          $presion = $value->med_presion;
          $bate1 = $value->med_nivel_bat1;
          $bate2 = $value->med_nivel_bat2;
          $filtro = $value->med_filtro;
          $alerta = true;

        }

        $buscar1['combustible'] = $combustible;
        $buscar1['tanque'] = $tanq->tanq_codigo;
        $galones = 0;
        $galones = $this->model_aforo->calculate_gallon($buscar1);

        $buscar2['combustible'] = $agua;
        $buscar2['tanque'] = $tanq->tanq_codigo;
        $galonesagua = 0;
        $galonesagua = $this->model_aforo->calculate_gallon($buscar2);

        ?>

        <div class="col-md-12" style="background:white;padding:0px;margin:20px;">

          <div class="col-md-12" style="background:#fbfbfb;text-align:center;">
            <h2><?php echo $tanq->tanq_nombre; ?></h2>
          </div>

          <div class="col-md-6" >
            <div class="therm-container" id="jqmeter-vertical<?php echo $tanq->tanq_codigo ?>"></div>
          </div>
          <div class="col-md-6"  style="background:white;font-size:20px;">

            <!--<br>-->
            <dl class="dl-horizontal">
              <!-- echo <dt>Combustible: </dt> -->
              <!-- <dd > <h2><?php echo $tanq->tc_nombre; ?> </h2></dd> -->
              <hr>
              <dt>Cantidad: </dt>
              <dd><i class="ion ion-ios-analytics"></i>  <?php echo $combustible; ?> Milimetros - <?php echo $galones;?> Galones</dd>
              <hr>
              <dt>Cantidad Agua: </dt>
              <dd><i class="ion ion-ios-water"></i>  <?php echo $agua; ?> Milimetros - <?php echo $galonesagua;?> Galones</dd>
              <hr>
              <dt>Temperatura: </dt>
              <dd> <i class="ion ion-md-thermometer"></i> <?php echo $temperatura; ?></dd>
            </dl>
          </div>

          <div class="col-md-12" style="background:#fbfbfb;text-align:center;">
            <?php

              $pocentraje = ($combustible*100)/$tanq->tanq_capacidad;

              //echo "Operacion minimo = $pocentraje >= $tanq->tanq_min_comb";

              if ($pocentraje<=$tanq->tanq_min_comb&&$alerta==true)
              {
                $variable = $tanq->tanq_min_comb;
                $alert = '<div class="alert alert-danger alert-dismissible">';
                $alert = $alert.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                $alert = $alert.'<h4><i class="icon fa fa-ban"></i> Alerta Combustible!</h4> Muy bajo nivel de Combustible. </div>';
                echo $alert;
              }

              if ($pocentraje>=$tanq->tanq_max_comb) {
                $variable = $tanq->tanq_max_comb;
                $alert = '<div class="alert alert-danger alert-dismissible">';
                $alert = $alert.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                $alert = $alert.'<h4><i class="icon fa fa-ban"></i> Alerta Combustible!</h4> Muy alta nivel de combustible.  </div>';
                echo $alert;
              }

              if ($agua>=$tanq->tanq_alt_agua) {
                $variable = $tanq->tanq_alt_agua;
                $alert = '<div class="alert alert-danger alert-dismissible">';
                $alert = $alert.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                $alert = $alert.'<h4><i class="icon fa fa-ban"></i> Alerta agua!</h4> Pasó limite de nivel de agua. maximo '.$variable.' </div>';
                echo $alert;
              }

              if ($filtro==1) {
                $alert = '<div class="alert alert-danger alert-dismissible">';
                $alert = $alert.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                $alert = $alert.'<h4><i class="icon fa fa-ban"></i> Alerta Filtro!</h4> </div>';
                echo $alert;
              }


            ?>
          </div>

        </div>

        <script>
        $(document).ready(function(e) {
          var goal = 10000;
          goal = goal.toString();
          $('#jqmeter-vertical<?php echo $tanq->tanq_codigo ?>').jQMeter({goal:'<?php echo $tanq->tanq_capacidad; ?>',raised:'<?php echo $combustible; ?>',meterOrientation:'vertical',width:'100%',height:'200px',barColor:'<?php echo $tanq->tanq_color; ?>',bgColor:'#e1e1e1',displayTotal:true,animationSpeed:2500});
        });
        </script>
        <?php  } ?>

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
</div>
