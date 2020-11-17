
<div class="content-wrapper">

  <div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Reporte Gráfico <?php echo ' de Tanque '.$this->input->post('tanque').' y Fecha '.$this->input->post('date1'); ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('Reportes/index')?>">Reportes</a></li>
      <li><a href="#">Grafico</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" id="areaimprimir">
    <!-- Small boxes (Stat box) -->

    <div class="row">


    <div class="col-md-4">
      <!--
      <div class="box box-default">
          <div class="box-footer no-padding">
            <img src="<?php echo base_url(); ?>/image/logo.png" width="100%">
          </div>
      </div>
    -->


      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Resumen</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <ul class="nav nav-pills nav-stacked">

          <?php

              $nivel2 = 0; // variable de segundo combustible
              $agua1 = 0;
              $agua2 = 0;
              $subio = 1; //mirar si ya empeiza subir o bajar
              $bajacomb = 0; // por cada ciclo deja variable de combustible parte de bajar
              $subocomb = 0; // por cada ciclo deja variable de combustible parte de subir
              $principio = 0; // principio de combustible
              $i = 0; // para iniciar si es primero
              $hora1 = "error";
              $hora2 = "error2";
              $resumen = 0; // sumar todos los resumen
              $resumensub = 0; // sumar todos los subida
              $resumenbaj = 0; // sumar todos los bajado
              foreach ($data as $value)
              {
                //obtiene valor de combustible
                $nivel1 = $value['combustible'];

                //si es principio
                if ($principio==0)
                {
                  $principio = 1;
                  $nivel2 = $value['combustible'];
                  $subocomb = $value['combustible'];
                  $agua1 = $value['agua'];
                  $agua2 = $value['agua'];
                }

                // parte de subirrrrrrrrrrrrrrrrrrr
                if ($nivel2>$nivel1)
                {
                  if ($subio==0)
                  {
                    $subio = 1;
                    //$validarcomb =  0;
                    $validarcomb = $nivel2-$subocomb;

                    // si es mayor mas de 5 nivel de combustible
                    if ($validarcomb>=5)
                    {
                      $subio = 1;
                      // primer galon
                      $buscar1['combustible'] = $nivel2;
                      $buscar1['tanque'] = $this->input->post('tanque');
                      $galon1 = $this->model_aforo->calculate_gallon($buscar1);
                      // segundo galon
                      $buscar1['combustible'] = $subocomb;
                      $galon2 = $this->model_aforo->calculate_gallon($buscar1);

                      if ($galon2>$galon1)
                      { $operacion = $galon2 - $galon1; }
                      else
                      { $operacion = $galon1 - $galon2; }

                      $buscar1['combustible'] = $agua1;
                      $galonagua1 = $this->model_aforo->calculate_gallon($buscar1);
                      $buscar1['combustible'] = $agua2;
                      $galonagua2 = $this->model_aforo->calculate_gallon($buscar1);

                      $operacion = $operacion - ($galonagua1+$galonagua2);
                      $operacion = round($operacion, 2);
                      $resumen = $resumen + $operacion;
                      $resumensub = $resumensub + $operacion;

                      echo '<li> <a href="#"><i class="ion ion-ios-analytics" style="color:#e6e600;"></i>'.$subocomb.'  <i class="ion ion-ios-water" style="color:#0080ff;"></i> '.$agua1.' ==> <i class="ion ion-ios-analytics" style="color:#e6e600;"></i>'.$nivel2.' <i class="ion ion-ios-water" style="color:#0080ff;"></i>'.$agua2.'  <span class="pull-right text-green"><i class="fa fa-angle-up"></i> '.$operacion.' G. </span></a></li>';
                      $subocomb = $nivel2;
                    }
                  }
                  $nivel2 = $value['combustible'];
                  $agua1 = $value['agua'];
                }
                // parte de bajaaaaaaaaaar
                elseif ($nivel2<$nivel1)
                {
                  if ($subio==1)
                  {
                    $subio = 0;

                    if ($subocomb>=1)
                    {
                      $validarcomb = 0;
                      $validarcomb = $subocomb-$nivel2;

                      // si es mayor mas de 5 nivel de combustible
                      if ($validarcomb>=5)
                      {
                        $galon1 = 0; $galon2 = 0;
                        // nivel 1
                        $buscar1['combustible'] = $nivel2;
                        $buscar1['tanque'] = $this->input->post('tanque');
                        $galon1 = $this->model_aforo->calculate_gallon($buscar1);
                        // nivel 2
                        $buscar2['combustible'] = $subocomb;
                        $buscar2['tanque'] = $this->input->post('tanque');
                        $galon2 = $this->model_aforo->calculate_gallon($buscar2);

                        //operacion agua
                        $buscar1['combustible'] = $agua1;
                        $galonagua1 = $this->model_aforo->calculate_gallon($buscar1);
                        $buscar1['combustible'] = $agua2;
                        $galonagua2 = $this->model_aforo->calculate_gallon($buscar1);

                        $operacion = $galon2 - $galon1;
                        $operacion = $operacion - ($galonagua1+$galonagua2);
                        $operacion = round($operacion, 2);
                        $resumen = $resumen + $operacion;
                        $resumenbaj = $resumenbaj + $operacion;

                        echo '<li> <a href="#"> <i class="ion ion-ios-analytics"  style="color:#e6e600;"></i>'.$subocomb.' <i class="ion ion-ios-water" style="color:#0080ff;"></i>'.$agua2.' ==> <i class="ion ion-ios-analytics" style="color:#e6e600;"></i>'.$nivel2.' <i class="ion ion-ios-water" style="color:#0080ff;"></i>'.$agua1.' <span class="pull-right text-red"><i class="fa fa-angle-down"></i> '.$operacion.' G. </span></a></li>';
                        $bajacomb = $nivel2;
                        $subocomb = $nivel2;

                      }
                    }
                  }
                  $nivel2 = $value['combustible'];
                  $hora2 = $value['fecha'];
                  //$agua1 = $value['agua'];
                }
                $i++;
              }


              if ($subio==1)
              {
                $galon1 = 0;
                $galon2 = 0;
                // nivel 1
                $buscar1['combustible'] = $nivel2;
                $buscar1['tanque'] = $this->input->post('tanque');
                $galon1 = $this->model_aforo->calculate_gallon($buscar1);
                // nivel 2
                $buscar2['combustible'] = $subocomb;
                $buscar2['tanque'] = $this->input->post('tanque');
                $galon2 = $this->model_aforo->calculate_gallon($buscar2);

                $buscar1['combustible'] = $agua1;
                $galonagua1 = $this->model_aforo->calculate_gallon($buscar1);
                $buscar1['combustible'] = $agua2;
                $galonagua2 = $this->model_aforo->calculate_gallon($buscar1);

                $operacion = $galon2 - $galon1;
                $operacion = $operacion - ($galonagua1+$galonagua2);
                $operacion = round($operacion, 2);
                $resumen = $resumen + $operacion;
                $resumenbaj = $resumenbaj + $operacion;

                //echo '<li> <a href="#"> '.$subocomb.' - '.$nivel2.' <span class="pull-right text-red"><i class="fa fa-angle-down"></i> '.$operacion.' G. </span></a></li>';
                //echo '<li> <a href="#"> '.$agua1.'- '.$subocomb.' - '.$nivel2.' - '.$agua2.' <span class="pull-right text-red"><i class="fa fa-angle-down"></i> '.$operacion.' G. </span></a></li>';
                echo '<li> <a href="#"> <i class="ion ion-ios-analytics"  style="color:#e6e600;"></i>'.$subocomb.' <i class="ion ion-ios-water" style="color:#0080ff;"></i>'.$agua2.' ==> <i class="ion ion-ios-analytics" style="color:#e6e600;"></i>'.$nivel2.' <i class="ion ion-ios-water" style="color:#0080ff;"></i>'.$agua1.' <span class="pull-right text-red"><i class="fa fa-angle-down"></i> '.$operacion.' G. </span></a></li>';
              }
              else
              {
                $galon1 = 0;
                $galon2 = 0;
                // nivel 1
                $buscar1['combustible'] = $nivel1;
                $buscar1['tanque'] = $this->input->post('tanque');
                $galon1 = $this->model_aforo->calculate_gallon($buscar1);
                // nivel 2
                $buscar2['combustible'] = $bajacomb;
                $buscar2['tanque'] = $this->input->post('tanque');
                $galon2 = $this->model_aforo->calculate_gallon($buscar2);

                //operacion agua
                $buscar1['combustible'] = $agua1;
                $galonagua1 = $this->model_aforo->calculate_gallon($buscar1);
                $buscar1['combustible'] = $agua2;
                $galonagua2 = $this->model_aforo->calculate_gallon($buscar1);

                $operacion = $galon1 - $galon2;
                $operacion = $operacion - ($galonagua1+$galonagua2);
                $operacion = round($operacion, 2);
                $resumen = $resumen + $operacion;
                $resumensub = $resumensub + $operacion;

                //echo '<li> <a href="#"> '.$subocomb.' - '.$nivel2.' <span class="pull-right text-green"><i class="fa fa-angle-up"></i> '.$operacion.' G. </span></a></li>';
                //echo '<li> <a href="#"> '.$agua1.'- '.$subocomb.' - '.$nivel2.' - '.$agua2.' <span class="pull-right text-green"><i class="fa fa-angle-up"></i> '.$operacion.' G. </span></a></li>';
                echo '<li> <a href="#"><i class="ion ion-ios-analytics"  style="color:#e6e600;"></i>'.$subocomb.'  <i class="ion ion-ios-water" style="color:#0080ff;"></i> '.$agua1.' ==> <i class="ion ion-ios-analytics"  style="color:#e6e600;"></i>'.$nivel2.' <i class="ion ion-ios-water" style="color:#0080ff;"></i>'.$agua2.'  <span class="pull-right text-green"><i class="fa fa-angle-up"></i> '.$operacion.' G. </span></a></li>';
              }

              echo '<li> <a href="#"> </a> </li>';
              echo '<li> <a href="#"> Carga <span class="pull-right text-green"><i class="fa fa-angle-up"></i> '.$resumensub.' G.</span></a></li>';
              echo '<li> <a href="#"> Descarga <span class="pull-right text-red"><i class="fa fa-angle-down"></i> '.$resumenbaj.' G.</span></a></li>';
              echo '<li> <a href="#"> Total  <span class="pull-right text-orange"><i class="fa fa-angle-right"></i> '.$resumen.' G.</span></a></li>';

            ?>
        </ul>
      </div>
      <!-- /.footer -->
    </div>


      </div>

      <div class="col-md-8">



        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Combustible</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="areacombustible" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Agua</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="areagua" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <div class="box box-info" id="iframe" >
          <div class="box-header with-border">
            <h3 class="box-title">Presión</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="areapresion" style="height:250px"></canvas>
            </div>
          </div>
        </div>

    </div>

    </div>

    <!-- /.row -->
  </section>

   <button class="btn btn-info" id="printer">Imprimir</button>
  <br><br>


  </div>
</div>

<!-- DONUT CHART -->
<script src="<?php echo base_url(); ?>html2canvas.min.js"></script>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<!-- /.content -->
<script>
$( "#printers" ).click(function() {
  html2canvas(document.body).then(function(canvas) {
    //document.body.appendChild(canvas);

    var a = document.createElement('a');
    // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
    a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
    a.download = 'somefilename.jpg';
    a.click();
  });
});

$('#printer').click(function(){
  html2canvas(document.querySelector("#areaimprimir")).then(canvas => {
    var a = document.createElement('a');
    // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
    a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
    a.download = 'somefilename.jpg';
    a.click();
  });
});
</script>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>/template/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url(); ?>/template/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/template/dist/js/app.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/template/dist/js/app.min.js"></script>



<script>

  $(function () {

    //--------------
    //- AREA CHART -
    //--------------
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areagua").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: [ <?php   if ($cantidad==0) { echo ""; }
      else {

        if ($cantidad>=150) {
          $limite = 5;
        }
        elseif ($cantidad>=100) {
          $limite = 3;
        }
        else{
          $limite = 1;
        }
        $i = 0;
        foreach ($data as $value) {
          $i++;
          if ($i>=$limite) {
            echo '"'.date('H:i', strtotime($value['fecha'])).' ",';
            $i=0;
          }

        }
      } ?>],
      datasets: [
        {
          label: "Electronics",
          fillColor: "#00a5e6",
          strokeColor: "#00a5e6",
          pointColor: "#00a5e6",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [ <?php if ($data==false) { echo ""; }
          else{

            if ($cantidad>=150) {
              $limite = 5;
            }
            elseif ($cantidad>=100) {
              $limite = 3;
            }
            else{
              $limite = 1;
            }
            $i = 0;
            foreach ($data as $value) {
              $i++;
              if ($i>=$limite) {
                $buscar1['combustible'] = $value['agua'];
                $buscar1['tanque'] = $this->input->post('tanque');
                $galon1 = $this->model_aforo->calculate_gallon($buscar1);
                echo "$galon1,";
                //echo $value['agua'].",";
                $i=0;
              }

            }

          } ?> ]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);




    //==============================

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areacombustible").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: [ <?php   if ($cantidad==0) { echo ""; }
      else {

        if ($cantidad>=150) {
          $limite = 5;
        }
        elseif ($cantidad>=100) {
          $limite = 3;
        }
        else{
          $limite = 1;
        }
        $i = 0;
        foreach ($data as $value) {
          $i++;
          if ($i>=$limite) {
            //echo '"'.$value['hora'].'",';
            echo '"'.date('H:i', strtotime($value['fecha'])).' ",';
            $i=0;
          }

        }
      } ?>],
      datasets: [
        {
          label: "Electronics",
          fillColor: "#b5b6b6", //color de area char
          strokeColor: "#b5b6b6",// color de linea
          pointColor: "#b5b6b6", // color de punto
          pointStrokeColor: "#ff00d0",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(255,0,0,1)",

          data: [ <?php if ($data==false) { echo ""; }
          else{

            if ($cantidad>=150) {
              $limite = 5;
            }
            elseif ($cantidad>=100) {
              $limite = 3;
            }
            else{
              $limite = 1;
            }
            $i = 0;
            foreach ($data as $value) {
              $i++;
              if ($i>=$limite) {
                $buscar1['combustible'] = $value['combustible'];
                $buscar1['tanque'] = $this->input->post('tanque');
                $galon1 = $this->model_aforo->calculate_gallon($buscar1);
                echo "$galon1,";
                $i=0;
              }
            }

          } ?> ]
        }
      ]
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);


    //=========================================================================

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areapresion").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: [ <?php   if ($cantidad==0) { echo ""; }
      else {

        if ($cantidad>=150) {
          $limite = 5;
        }
        elseif ($cantidad>=100) {
          $limite = 3;
        }
        else{
          $limite = 1;
        }
        $i = 0;
        foreach ($data as $value) {
          echo '"  ",';
        }
      } ?>],
      datasets: [
        {
          label: "Electronics",
          fillColor: "#16E32B", //color de area char
          strokeColor: "#16E32B",// color de linea
          pointColor: "#16E32B", // color de punto
          pointStrokeColor: "#ff00d0",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(255,0,0,1)",
          data: [ <?php if ($data==false) { echo ""; }
          else{

            if ($cantidad>=150) {
              $limite = 5;
            }
            elseif ($cantidad>=100) {
              $limite = 3;
            }
            else{
              $limite = 1;
            }
            $i = 0;
            foreach ($data as $value) {
              echo $value['presion']." ,";
            }

          } ?> ]
        }
      ]
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);


  });
</script>