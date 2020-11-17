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

        <?php foreach ($info as $value) { ?>

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <form action="<?php echo base_url('Tanque/update') ?>" method="post">

              <div class="box-body">
                <a href="<?php echo base_url('Tanque/index');?>" class="btn btn-info" >Volver atras</a>
                <hr>
                <?php echo validation_errors(); ?>
                <div class="form-group col-md-8">
                  <label>Codigo de Tanque</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $value->tanq_id; ?>">
                    <input type="hidden" class="form-control" name="update" value="true">
                    <input type="text" class="form-control" name="codigo" value="<?php echo $value->tanq_codigo; ?>">
                  <!-- /.input group -->
                </div>

                <div class="form-group col-md-8">
                  <label>Nombre de Tanque</label>
                  <input type="text" class="form-control" name="nombre" value="<?php echo $value->tanq_nombre; ?>">
                  <!-- /.input group -->
                </div>

                <div class="form-group col-md-8">
                  <label>Capacidad de Tanque</label>
                  <input type="text" class="form-control" name="capacidad" value="<?php echo $value->tanq_capacidad; ?>">
                  <!-- /.input group -->
                </div>

                <div class="form-group col-md-8">
                  <label>Alerta maximo de Combustible</label>
                  <input type="text" class="form-control" name="max_comb" value="<?php echo $value->tanq_max_comb; ?>">
                </div>

                <div class="form-group col-md-8">
                  <label>Alerta minimo de Combustible</label>
                  <input type="text" class="form-control" name="min_comb" value="<?php echo $value->tanq_min_comb; ?>">
                </div>

                <div class="form-group col-md-8">
                  <label>Alerta de Agua</label>
                  <input type="text" class="form-control" name="alt_agua" value="<?php echo $value->tanq_alt_agua; ?>">
                </div>

                <div class="form-group col-md-8">
                  <label>Color de Tanque</label>
                  <input type="color" class="form-control" name="color" value="<?php echo $value->tanq_color; ?>">
                </div>

                <div class="form-group col-md-8">
                  <label>Tipo Combustible</label>

                  <select class="form-control" name="tipo">
                    <option value="<?php echo $value->tanq_tipo_combustible; ?>"><?php echo $value->tc_nombre; ?></option>
                    <option value="1">Corriente</option>
                    <option value="2">Extra</option>
                    <option value="3">Diesel</option>
                  </select>
                  <!-- /.input group -->
                </div>
                <hr>
                <div class="form-group col-md-8">
                  <button type="submit" class="btn btn-info btn-block">Actualizar</button>
                </div>
              </div>
            </form>
            </div>
        </div>
        <?php } ?>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
