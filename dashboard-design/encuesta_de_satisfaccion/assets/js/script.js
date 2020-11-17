

 $(document).ready(function(){

 $('#guardarencuesta').click(function(){
    var formData = new FormData($("#formencuesta")[0]);

    $.ajax({
        url: 'assets/php/addEncuesta.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType:false,
        processData:false,

        success: function(data){
        if(data=='ok') {
              swal({
                  title: "Encuesta realizada",
                  text: "",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonClass: 'btn-success',
                  confirmButtonText: 'Aceptar'
                },
                function(isConfirm){
                if (isConfirm) {
                  location.href = "../../../index.php";
                     }
                });
            // return false;   
         }else{
             $("#resul_encuesta").html(data);
                  // alert("no"); 
              }
        },
        error: function(){
        $("#resul_encuesta").html('<div class="col-lg-12 text-center"><strong class="text-danger"><h4>Fallo el servidor...</h4></strong></div>');
        }
     });  
   });
 });

 $(document).ready(function(){
  load();
});

 function load(page){
    var querydos=$("#area").val();
     var query=$("#fecha").val();
     var parametros = {"action":"ajax","page":page,'querydos':querydos,'query':query};
    $.ajax({
         url:'./datos_encuesta.php',
         data: parametros,
        //   beforeSend: function(objeto){
        //  $("#cargando").html('<div class="col-lg-12 text-center"><strong class="text-danger"><h4>Cargando...</h4></strong></div>');
        // },
        success:function(data){
            $(".tabla_encuesta").html(data).fadeIn('slow');
            $("#cargando").html("");
        }
    });
}

// console.log('hola');