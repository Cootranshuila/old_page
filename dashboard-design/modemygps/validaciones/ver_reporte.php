<?php 

extract($_REQUEST);
extract($_POST);
   
require "../../assets/config/ConexionBaseDatos_PDO.php";
   
require "../../postulados/seg.php";
$objConexion=conectaDb();

$sql = $objConexion->prepare("SELECT * from reporte where id_reporte = ".$_REQUEST['e']);
$sql->execute();
foreach ($sql->fetchAll() as $row) {

?>

<div class="modal-content">
   <div class="modal-header">
      <h4 class="modal-title">Reporte No. <?php echo $_REQUEST['e'] ?></h4>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
   </div>
   <div class="modal-body">
      <div class="row">
         <div class="col-sm-12">
            <div class="card-body">
               <form action="" name="form-ver-reporte" id="form-ver-reporte" method="post">
                  <div class="form-group">
                     <div class="input-group">
                        <input id="placa" type="text" class="form-control" name="placa" placeholder="Placa del Vehiculo" value="<?php echo $row['placa_carro']; ?>" required>
                        <div class="input-group-append">
                           <span class="input-group-text">
                           <i class="fa fa-bus-alt"></i>
                           </span>
                        </div>
                     </div>
                     <div class="text-danger d-none" id="input-placa">Por favor escriba la placa.</div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <select class="form-control" id="tipo" name="tipo" required>
                           <option value="">Selecione tipo de producto</option>
                           <option value="Modem" <?php echo $row['tipo_prod'] == 'Modem' ? "selected" : ""; ?> >Modem</option>
                           <option value="GPS" <?php echo $row['tipo_prod'] == 'GPS' ? "selected" : ""; ?> >GPS</option>
                        </select>
                        <div class="input-group-append">
                           <span class="input-group-text">
                           <i class="fa fa-hdd"></i>
                           </span>
                        </div>
                     </div>
                     <div class="text-danger d-none" id="input-tipo">Por favor seleccione el tipo de producto.</div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <input id="id_p" type="text" class="form-control" name="id_p" placeholder="ID o Serie del producto" value="<?php echo $row['id_prod']; ?>" required>
                        <div class="input-group-append">
                           <span class="input-group-text">
                           <i class="fa fa-qrcode"></i>
                           </span>
                        </div>
                     </div>
                     <div class="text-danger d-none" id="input-id_p">Por favor escriba el ID o serie del producto.</div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <input id="obs" type="text" class="form-control" name="obs" placeholder="Escriba la falla del producto" value="<?php echo $row['observacion']; ?>" required>
                        <div class="input-group-append">
                           <span class="input-group-text">
                           <i class="fa fa-edit"></i>
                           </span>
                        </div>
                     </div>
                     <div class="text-danger d-none" id="input-obs">Por favor escriba la falla del producto.</div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <input id="nom" type="text" class="form-control" name="nom" placeholder="Nombre de quien presenta el producto" value="<?php echo $row['nombre']; ?>" required>
                        <div class="input-group-append">
                           <span class="input-group-text">
                           <i class="fa fa-user"></i>
                           </span>
                        </div>
                     </div>
                     <div class="text-danger d-none" id="input-nom">Por favor escriba el nombre.</div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <input id="con" type="text" class="form-control" name="con" placeholder="Celular de quien presetnta el producto" value="<?php echo $row['contacto']; ?>" required>
                        <div class="input-group-append">
                           <span class="input-group-text">
                           <i class="fa fa-mobile-alt"></i>
                           </span>
                        </div>
                     </div>
                     <div class="text-danger d-none" id="input-con">Por favor escriba el numero de celular.</div>
                  </div>
                  <input type="text" name="id_reporte" id="id_reporte" class="d-none" value="<?php echo $row['id_reporte']; ?>">
               </form>
            </div>
         </div>
      </div>
      <div class="text-center" style="margin-top: -15px;">
         <?php if ($row['resuelto'] == '') { ?>
            <button class="btn btn-info btn-lg" type="button" id="editar-reporte">Editar</button>
            <button class="btn btn-success d-none btn-lg" type="button" id="enviar-editar-reporte">Enviar</button>
         <?php } ?>
      </div>
      <hr>
      <form action="" name="form-terminar-reporte" id="form-terminar-reporte" method="post">
         <div class="row">
            <div class="col-sm-12">
               <div class="text-center">
                  <label class="col-sm-4"><b>Resuelto: </b></label>
                  <div class="form-group" class="col-sm-8">
                     <div class="custom-control custom-radio custom-control-inline">
                       <input type="radio" id="resuelto" <?php echo $row['resuelto'] != '' ? "disabled " : ""; echo $row['resuelto'] == 'si' ? "checked" : ""; ?> name="resuelto" class="custom-control-input" value="Si">
                       <label class="custom-control-label" for="resuelto">Si</label>
                     </div>
                     <div class="custom-control custom-radio custom-control-inline">
                       <input type="radio" id="resuelto2" <?php echo $row['resuelto'] != '' ? "disabled " : ""; echo $row['resuelto'] == 'no' ? "checked" : ""; ?> name="resuelto" class="custom-control-input" value="No">
                       <label class="custom-control-label" for="resuelto2">No</label>
                     </div>
                     <div class="text-danger d-none" id="input-resuelto">Por favor seleccione uno.</div>
                  </div>
               </div>
            </div>
         </div>

         <div class="form-group">
            <div class="input-group">
               <textarea class="form-control" <?php echo $row['resuelto'] != '' ? "disabled" : ""; ?> name="detalle" id="detalle" placeholder="Escriba aqui las observaciones..."><?php echo $row['resuelto'] != '' ? "".$row['detalle']."" : ""; ?></textarea>
               <div class="input-group-append">
                  <span class="input-group-text">
                  <i class="fa fa-edit"></i>
                  </span>
               </div>
            </div>
            <div class="text-danger d-none" id="input-detalle">Por favor escriba las obseervaciones.</div>
         </div>

         <div class="text-center form-inline">
            <div class="col-sm-4"></div>
            <button class="btn btn-success btn-block col-sm-4 <?php echo $row['resuelto'] != '' ? "d-none" : ""; ?>" type="button" id="terminar-reporte">Terminar</button>
         </div>

         <input type="text" name="id_reporte" id="id_reporte" class="d-none" value="<?php echo $row['id_reporte']; ?>">

      </form>
   </div>
   <div class="modal-footer">
      <button class="btn btn-secondary text-center" type="button" data-dismiss="modal">Cerrar</button>
   </div>
</div>

<?php } ?>

<script>
   $('#form-ver-reporte').find('input, textarea, button, select').attr('disabled', true);

   $("#editar-reporte").click(function() {
      $("#editar-reporte").addClass('d-none');
      $("#enviar-editar-reporte").removeClass('d-none');
      $('#form-ver-reporte').find('input, textarea, button, select').attr('disabled', false);
   });

   $("#enviar-editar-reporte").click(function() {
      // var id = $("#id_reporte").val();
      $.ajax({
         type: 'POST',
         url: 'validaciones/editar-reporte.php',
         data: $('#form-ver-reporte').serialize(),
         success: function(data){
            ver_reporte(data);
            // console.log(data);
            tabla();
            Command: toastr["success"]("Reporte editado correctamente.", "Correcto!");
         }
      });
   });

   $("#terminar-reporte").click(function() {
      var id = $("#id_reporte").val();
      var resuelto = $("input[name=resuelto]:checked").val();
      var detalle = $("#detalle").val();
      var id = $("#id_reporte").val();
      // alert(resuelto);

      if (resuelto == undefined) { $("#resuelto").addClass('is-invalid'); $("#resuelto2").addClass('is-invalid'); $("#input-resuelto").removeClass('d-none'); } else { $("#resuelto").removeClass('is-invalid'); $("#resuelto2").removeClass('is-invalid'); $("#input-resuelto").addClass('d-none'); }
      if (detalle == '') { $("#detalle").addClass('is-invalid'); $("#input-detalle").removeClass('d-none'); } else { $("#detalle").removeClass('is-invalid'); $("#input-detalle").addClass('d-none'); }
      if (resuelto != undefined && detalle != '') {
         $.ajax({
            type: 'POST',
            url: 'validaciones/terminar-reporte.php',
            data: { resuelto:resuelto, detalle:detalle, id:id },
            success: function(data){
               if (data == 'Ok') {
                  Command: toastr["success"]("Reporte terminado correctamente.", "Correcto!");
                  setTimeout(function(){ window.location.href = 'terminados.php?p=1'; }, 5000);
               }
            }
         });
      }
   });
</script>