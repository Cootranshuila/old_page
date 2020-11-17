<script src="<?php echo base_url(); ?>/assets/jquery-1.9.1.js"></script>
<script src="<?php echo base_url(); ?>/assets/jquery-ui.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 882px;">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tanque
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tanque</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <form action="<?php echo base_url('Tanque/create') ?>" method="post">

              <div class="box-body">
                <a href="<?php echo base_url('Tanque/index');?>" class="btn btn-info" >Volver atras</a>
                <hr>
                <?php echo validation_errors(); ?>
                <div class="form-group col-md-8">
                  <label>Codigo de Tanque</label>
                  <input type="text" class="form-control" name="codigo">
                </div>

                <div class="form-group col-md-8">
                  <label>Nombre de Tanque</label>
                  <input type="text" class="form-control" name="nombre">
                </div>

                <div class="form-group col-md-8">
                  <label>Alerta maximo de Combustible</label>
                  <input type="text" class="form-control" name="max_comb">
                </div>

                <div class="form-group col-md-8">
                  <label>Alerta minimo de Combustible</label>
                  <input type="text" class="form-control" name="min_comb">
                </div>

                <div class="form-group col-md-8">
                  <label>Alerta de Agua</label>
                  <input type="text" class="form-control" name="alt_agua">
                </div>

                <div class="form-group col-md-8">
                  <label>Capacidad de Tanque</label>
                  <input type="text" class="form-control" name="capacidad">
                </div>

                <div class="form-group col-md-8">
                  <label>Color de Tanque</label>
                  <input type="color" class="form-control" name="color">
                </div>

                <div class="form-group col-md-8">
                  <label>Tipo Combustible</label>

                  <select class="form-control" name="tipo">
                    <option value=""></option>
                    <?php foreach ($oil as $value) { ?>
                      <option value="<?php echo $value->tc_id;?>"><?php echo $value->tc_nombre;?></option>
                    <?php } ?>
                  </select>
                  <!-- /.input group -->
                </div>

                <hr>

                <div class="form-group col-md-8">
                  <button type="submit" class="btn btn-info btn-block">Guardar</button>
                </div>




              </div>
            </form>
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
