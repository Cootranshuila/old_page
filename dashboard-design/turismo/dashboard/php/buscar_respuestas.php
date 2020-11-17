<?php

extract($_REQUEST);
require "../../../assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$id = $_REQUEST['id'];

$sql = $objConexion->prepare("SELECT * from encuesta_turismo where id_encuesta = '$id'");
$sql->execute();

$resultados = $sql->fetchAll();

foreach ($resultados as $row) { ?>

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Datos encuesta No. <?php echo $row['id_encuesta']; ?></h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col">
                    
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Datos personales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Preguntas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Recomendacion</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <p>Datos personales de quien que realizo la encuesta.</p>
                                    <div class="container">
                                        <h4><span class="badge badge-primary">Nombre:</span> <?php echo $row['nombre_cliente']; ?> </h4><hr>
                                        <h4><span class="badge badge-primary">Correo:</span> <?php echo $row['correo_cliente']; ?> </h4><hr>
                                        <h4><span class="badge badge-primary">Telefono:</span> <?php echo $row['telefono_cliente']; ?> </h4>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="container">
                                        <label for="">¿Cómo se entero de la actividad?.</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="¿Cómo se entero de la actividad?.">Pregunta 1:</span> <?php echo $row['pregunta_uno']; ?> </h4><hr>
                                        <label for="">¿Por cual canal recibió atención?.</label>                                        
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="¿Por cual canal recibió atención?.">Pregunta 2:</span> <?php echo $row['pregunta_dos']; ?> </h4><hr>
                                        <label for="">Califique la atención recibida: Venta. (1/5)</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="Califique la atención recibida: Venta. (1/5)">Pregunta 3:</span> <?php echo $row['pregunta_tres']; ?> </h4><hr>
                                        <label for="">Califique la atención recibida: Carro. (1/5)</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="Califique la atención recibida: Carro. (1/5)">Pregunta 4:</span> <?php echo $row['pregunta_cuatro']; ?> </h4><hr>
                                        <label for="">Califique la atención recibida: Hotel. (1/5)</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="Califique la atención recibida: Hotel. (1/5)">Pregunta 5:</span> <?php echo $row['pregunta_cinco']; ?> </h4><hr>
                                        <label for="">Califique su experiencia en el viaje: Viaje en el Bus. (1/5)</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="Califique su experiencia en el viaje: Viaje en el Bus. (1/5)">Pregunta 6:</span> <?php echo $row['pregunta_seix']; ?> </h4><hr>
                                        <label for="">Califique su experiencia en el viaje: Hotel. (1/5)</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="Califique su experiencia en el viaje: Hotel. (1/5)">Pregunta 7:</span> <?php echo $row['pregunta_siete']; ?> </h4><hr>
                                        <label for="">Califique su experiencia en el viaje: Lugar de Destino. (1/5)</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="Califique su experiencia en el viaje: Lugar de Destino. (1/5)">Pregunta 8:</span> <?php echo $row['pregunta_ocho']; ?> </h4><hr>
                                        <label for="">¿Nos recomendarias?.</label>
                                        <h4><span class="badge badge-primary" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-content="¿Nos recomendarias?.">Pregunta 9:</span> <?php echo $row['pregunta_nueve']; ?> </h4>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <p>Datos personales de la persona recomendada.</p>
                                    <div class="container">
                                        <?php if ($row['pregunta_nueve'] == 'si') { ?>
                                            <h4><span class="badge badge-primary">Nombre:</span> <?php echo $row['nombre_recomendado']; ?> </h4><hr>
                                            <h4><span class="badge badge-primary">Correo:</span> <?php echo $row['correo_recomendado']; ?> </h4><hr>
                                            <h4><span class="badge badge-primary">Telefono:</span> <?php echo $row['telefono_recomendado']; ?> </h4>
                                        <?php } else { ?>
                                            <h2 class='text-center'>Sin recomendacion.</h2>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-info" type="button"  data-dismiss="modal">Aceptar</button>
        </div>
    </div>    

<?php } ?>

<script>
  
    $('[data-toggle="popover"]').popover();
    $('.popover-dismiss').popover({
        trigger: 'focus'
    });

</script>
