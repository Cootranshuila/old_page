<script src="<?php echo base_url(); ?>/assets/jquery-1.9.1.js"></script>

<script src="<?php echo base_url(); ?>/assets/jquery-ui.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aforo
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Aforo</li>
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
                <h3 class="box-title">Consulta </h3>
                <?php echo validation_errors(); ?>
              </div>

              <div class="box-body">

                <form method="post" action="<?= base_url('Aforo/result')?>" >

                <div class="form-group col-md-3">
                  <label>Tanque</label>
                  <select class="form-control" name="tanque">
                    <?php foreach ($tanque as $value) { ?>
                      <option value="<?php echo $value->tanq_codigo ?>"><?php echo $value->tanq_nombre ?></option>
                    <?php  } ?>
                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label style="color:white;">.</label><br/>
                  <input type="submit" class="btn btn-primary" value="Consultar">
                </div>

              </form>

              </div>
            </div>
        </div>


      <?php if (!$result==null): ?>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <h1>Tanque de <?php echo  $this->input->post('tanque'); ?></h1>
              <hr>
              <table id="example1s" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Altura</th>
                    <th>Galones</th>
                  </tr>
                </thead>
                <tboby>
                  <?php if ($result['cantidad']==0): ?>
                    <tr>
                      <td colspan="2">No hay datos.</td>
                    </tr>
                  <?php else : ?>
                    <?php foreach ($result['query'] as $val) { ?>
                      <tr>
                        <td><?php echo $val->altura;?></td>
                        <td><?php echo $val->galones;?></td>
                      </tr>
                    <?php } ?>
                  <?php endif; ?>
                </tboby>
              </table>
            </div>
          </div>
        </div>
      <?php endif; ?>

        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
