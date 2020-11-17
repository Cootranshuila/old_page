<script src="<?php echo base_url(); ?>/assets/jquery-1.9.1.js"></script>

<script src="<?php echo base_url(); ?>/assets/jquery-ui.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reportes
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reportes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">

          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Consulta</h3>
                <?php echo validation_errors(); ?>
              </div>

              <div class="box-body">

                <form method="post" action="<?= base_url('Medidas/search')?>" >


                <div class="form-group col-md-3">
                  <label>Tipo de Reporte</label>
                  <select class="form-control" name="reporte">
                    <option value="1">Grafico</option>
                    <option value="2">Detallado</option>
                    <option value="3">Excel</option>
                    <option value="4">PDF</option>
                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label>Tanque</label>
                  <select class="form-control" name="tanque">
                    <?php foreach ($tanque as $value) { ?>
                      <option value="<?php echo $value->tanq_codigo ?>"><?php echo $value->tanq_nombre ?></option>
                    <?php  } ?>
                  </select>
                </div>
    
                <div class="form-group col-md-3">

                  <label for="exampleInputEmail1">Seleccionar Fecha Inicial </label>
                  <div class="input-group">
                    <input type="time" class="form-control" name="hora1" >
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>

                  <div class="input-group">
                    <input type="text" name="date1" class="form-control pull-right" id="datepicker1" autocomplete="off" value="">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar-check-o"></i>
                    </div>
                  </div>
                  
                </div>

                

                <div class="form-group col-md-3">

                  <label for="exampleInputEmail1">Seleccionar Fecha Final </label>

                  <div class="input-group">
                    <input type="time" class="form-control" name="hora2" >
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>

                  <div class="input-group">
                    <input type="text" name="date2" class="form-control pull-right" id="datepicker2" autocomplete="off" value="">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar-check-o"></i>
                    </div>
                  </div>

                </div>



                <div class="form-group col-md-3">
                  <label style="color:white;">.</label><br/>
                  <input type="submit" class="btn btn-primary" value="Consultar">
                </div>

              </form>

              </div>
            </div>
        </div>

        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/mdtimepicker.js"></script>
  <script>
    $(document).ready(function(){
      $('#timepicker1').mdtimepicker(); //Initializes the time picker
      $('#timepicker2').mdtimepicker(); //Initializes the time picker
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
        //Date picker
        $('#datepicker1').datepicker({
          autoclose: true
        });
        $('#datepicker2').datepicker({
          autoclose: true
        });

    });
  </script>
