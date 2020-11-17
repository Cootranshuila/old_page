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

          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

              <?php if ($this->session->flashdata('correcto'))  { ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> <?php echo  $this->session->flashdata('correcto') ?></h4>
                </div>
              <?php } ?>

              <div id="result"></div>


              <div class="box-body">

                <a href="<?php echo base_url('Tanque/form');?>" class="btn btn-info" >Crear nuevo Tanque</a>

                <hr>

                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Tanque</th>
                      <th>Nombre</th>
                      <th>Tipo Combustible</th>
                      <th>Capacidad</th>
                      <th>Alerta maximo Comb.</th>
                      <th>Alerta minimo Comb</th>
                      <th>Alerta Agua</th>
                    </tr>
                  </thead>
                  <tboby>
                  <?php foreach ($info as $value) { ?>
                    <tr>
                      <td><?php echo $value->tanq_codigo;?></td>
                      <td><?php echo $value->tanq_nombre;?></td>
                      <td><?php echo $value->tc_nombre;?></td>
                      <td><?php echo $value->tanq_capacidad;?></td>
                      <td><?php echo $value->tanq_max_comb;?></td>
                      <td><?php echo $value->tanq_min_comb;?></td>
                      <td><?php echo $value->tanq_alt_agua;?></td>
                      <td>
                        <?php if ($value->tanq_est==1) { ?>
                          <button type="button" class="btn btn-default  changed-status" value="<?php echo  $value->tanq_id; ?>"  data-state="0" >
                            <span class="fa fa-toggle-on"  style="color:green;"></span> Activado
                          </button>
                        <?php }elseif ($value->tanq_est==0) { ?>
                          <button type="button" class="btn btn-default changed-status" value="<?php echo  $value->tanq_id; ?>" data-state="1" >
                            <span class="fa fa-toggle-off"  style="color:red;"></span> Desactivado
                          </button>
                        <?php }else{ ?>
                          Error <?php echo $value->tanq_est ?>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url('Tanque/edit/'.$value->tanq_id); ?>" class="btn btn-defaul"> Editar </button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-default delete-tanque" value="<?php echo $value->tanq_id;?>" > Eliminar </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tboby>
                </table>

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
  <!-- /.content-wrapper -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <script>
  $( ".changed-status" ).click(function() {

    var parametros = { "change" : true, "id" : $(this).val(),"state": $(this).data("state")  };
    $.ajax({ data: parametros, url:'<?php echo base_url('Tanque/change_state/45') ?>',type:  'post',
       beforeSend: function () {$("#result").html("Enviando, espere por favor...");},
       success:  function (response) {

         var response = JSON.parse(response);
         if (response.success==true)
         {
           $("#result").html(response.message);
           location.reload(true);
         }
         else{
           $("#result").html(response.message);
         }
       }
    }).fail( function(error) {
      alert(JSON.stringify(error))
   })
  });


  $(".delete-tanque").click(function() {

    if (confirm('¿Desea eliminar este Tanque ?')) {

      var parametros = { "delete" : true, "id" : $(this).val() };

      $.ajax({ data: parametros, url:'<?= base_url('Tanque/delete/345345')?>',type:  'post',
         beforeSend: function () {$("#result").html("Enviando, espere por favor...");},
         success:  function (response) {

           var response = JSON.parse(response);

           if (response.success==true)
           {
             $("#result").html(response.message);
             location.reload(true);
           }
           else{
             $("#result").html(response.message);
           }

         }
      }).fail( function(error) {
        $("#result").html(JSON.stringify(error));
        //alert(JSON.stringify(error))
     })

    }

  });
  </script>
