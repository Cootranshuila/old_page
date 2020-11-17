<script src="<?php echo base_url(); ?>/assets/jquery-1.9.1.js"></script>

<script src="<?php echo base_url(); ?>/assets/jquery-ui.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Importar excel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Importar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <a href="<?= base_url('plantilla.xlsx')?>" class="btn btn-info pull-right"> Descargar Plantilla</a>
              </div>
              <div class="box-body with-border">
                <?php echo validation_errors(); ?>
                <form role="form" action="<?= base_url()?>Aforo/import_excel" method="POST" enctype="multipart/form-data">
                  <div class="form-group col-md-8">
                    <label>Tanque</label>
                    <select class="form-control" name="tanque">
                      <?php foreach ($tanque as $value) { ?>
                        <option value="<?php echo $value->tanq_codigo ?>"><?php echo $value->tanq_nombre ?></option>
                      <?php  } ?>

                    </select>
                  </div>

                  <div class="form-group col-md-8">
                    <label>Inicio Hora:</label>

                    <div class="input-group">
                      <input type="file" class="form-control" name="file" >

                      <div class="input-group-addon">
                        <i class="fa fa-file"></i>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>

                  <div class="form-group col-md-8">
                    <label style="color:white;">.</label><br/>
                    <input type="submit" class="btn btn-primary" value="importar">
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
  </div>
  <!-- /.content-wrapper -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/mdtimepicker.js"></script>
