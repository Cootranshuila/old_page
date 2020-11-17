<div class="content-wrapper">

  <div class="container">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Listados completo de Usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Listado</a></li>
      <li class="active">Usuario</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- form start -->
          <div class="box-body">
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Crear nuevo Usuario</button>
            <div id="result"></div>
            <hr>
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Role</th>
                <th>correo</th>
                <th>Estacion</th>
              </tr>
              </thead>
              <tbody>
              </tr>
                <?php foreach($info as $datos) { ?>
                <tr class="row<?= $datos->user_id; ?>">
                  <td><?php echo $datos->user_identificacion;?></td>
                  <td><?php echo $datos->user_nombre;?></td>
                  <td><?php echo $datos->user_tipo;?> </td>
                  <td><?php echo $datos->user_correo;?> </td>
                  <td><?php echo $datos->user_estacion;?> </td>
                  <?php if ($datos->user_estado==1) { ?>
                    <td>
                      <button class="btn btn-block btn-success updatesate" value="<?= $datos->user_id; ?>" data-state="0">Activado</button>
                    </td>
                  <?php }elseif ($datos->user_estado==0) { ?>
                    <td>
                      <button class="btn btn-block btn-danger updatesate" value="<?= $datos->user_id; ?>" data-state="1">Desactivado</button>
                    </td>
                  <?php } ?>
                  <td><button type="button" class="btn btn-danger delete-user" value="<?php echo $datos->user_id; ?>" >Eliminar</button> </td>
                </tr>
                <?php  }  ?>
              </tbody>
            </table>
            </div>
          </div>
          <!-- /.box -->

        </div>
      </div>
    </div>
    <!-- /.row -->

  </section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulario</h4>
      </div>
      <div class="modal-body">

      <div id="message-user"></div>
      <form id="formregister">

        <div class="form-group">
          <label>Nombre </label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre del Usuario" value="<?php echo set_value('nombre'); ?>">
        </div>
        </div>

        <div class="form-group">
          <label > Identificación </label>
            <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
          <input type="number" class="form-control" name="identificacion" placeholder="Escribe la identificación del Usuario" value="<?php echo set_value('celular'); ?>">
        </div>
        </div>

        <div class="form-group">
          <label>Correo electronico</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" name="email" class="form-control"  placeholder="Escribe el correo del Usuario" value="<?php echo set_value('email'); ?>">
          </div>
        </div>

        <div class="form-group">
          <label>Contraseña</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" name="key" class="form-control"  placeholder="Escribe la contraseña" value="<?php echo set_value('key'); ?>">
          </div>
        </div>

        <div class="form-group">
          <label>Confirmar Contraseña</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" name="key2" class="form-control" placeholder="Vuelve a escribir la contraseña" value="<?php echo set_value('key2'); ?>">
          </div>
        </div>
        <br>

        <div class="form-group">
          <label>Tipo de Usuario</label>
          <div class="input-group">
            <select class="form-control" name="tipo" >
              <option value="2">Supervisor</option>
              <option value="1">Administrador</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label>Estación</label>
          <div class="input-group">
            <select class="form-control" name="estacion" >
              <option value="1">Cootranshuila EDS Calle 26</option>
              <option value="2">Cootranshuila EDS La toma</option>
            </select>
          </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-info btn-block senduser" >Guardar</button>

      <form >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  <!-- /.content -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <!-- /.content -->
  <script>
  $( ".delete-user" ).click(function() {
    var id = $(this).val();

    var r = confirm("Esta seguro desea eliminar este registro?");
     if (r == true) {

       var parametros = { "safety" : true,   "id" : id};
       $.ajax({ data:  parametros, url:' <?= base_url('Usuario/delete')?>',type:  'post',
          beforeSend: function () {$("#result").html("Enviando, espere por favor...");},
          success:  function (response) {
            var json = JSON.parse(response)
            if (json.success==true) {
              $("#result").html("<h2 style='color:green' class='jidemessahe'>"+json.message+"</h2>");
              $( ".row"+id).hide();
              $( ".jidemessahe" ).hide(1000);
            }
            else{
              $("#result").html("<h2 style='color:red'>"+json.message+"</h2>");
            }

          }
       }).fail( function(error) {
         alert(JSON.stringify(error))
      })

     }
  });
  $( ".updatesate" ).click(function() {
    var id = $(this).val();
    var state = $(this).data('state');
    var parametros = { "safety" : true, "id" : id, "state" : state};
    $.ajax({ data:  parametros, url:' <?= base_url('Usuario/change_state')?>',type:  'post',
       beforeSend: function () {$("#result").html("Enviando, espere por favor...");},
       success:  function (response) {
         var json = JSON.parse(response)
         if (json.success==true) {
           $("#result").html("<h2 style='color:green' class='jidemessahe'>"+json.message+"</h2>");
           location.reload();
         }
         else{
           $("#result").html("<h2 style='color:red'>"+json.message+"</h2>");
         }
       }
    }).fail( function(error) {
      alert(JSON.stringify(error))
   })

  });
  </script>


  <script>
  $(document).ready(function(){

      $( "#formregister" ).on( "submit", function( event ) {
        event.preventDefault();
        console.log( $( this ).serialize() );
        $.ajax({ data:  $( this ).serialize(), url:' <?= base_url('Usuario/register')?>',type:  'post',
           beforeSend: function () {$("#message-user").html("Enviando, espere por favor...");},
           success:  function (response) {
             var json = JSON.parse(response)
             if (json.success==true) {
               $("#message-user").html("<h2 style='color:green'>"+json.message+"</h2>");
             }
             else{
               $("#message-user").html("<h2 style='color:red'>"+json.message+"</h2>");
             }

           }
        }).fail( function(error) {
          alert(JSON.stringify(error))
       })
      });


  });
</script>

 </div>

</div>
<!-- /.content-wrapper -->
