var baseurl = "http://localhost/domicilio/app/";
//var baseurl = "https://elbacan.com.mx/app/";

$(".call-online").click(function() {
  var onl = $(this).data("state");
  var urlpost = baseurl+"Restaurante/change-state/";
  var parametros = { "online" : onl, "safety": true};
  $.ajax({ data:  parametros, url: urlpost,type:  'post',
  beforeSend: function () {$("#call-online-state").html("Enviando, espere por favor...");},
  success:  function (response) {$("#call-online-state").html(response); }
  });
});

$(document).on('click', '.llamar', function(){
    alert("success");
});

$(".trvar-toggle").click(function() {
  //var code = $(this).val();
  var row = $(this).data("row");
  $( "#trvaropcion"+row ).toggle("fast");
  $( "#trvartitle"+row ).toggle("fast");
  //alert(cat)
});

$(".sendped").click(function() {
  //var code = $(this).val();
  var cat = $(this).data("cat");
  alert(cat)
});

$(".sendped2").click(function() {
  var code = $(this).val();
  $("#inputpedido").val(code);
  $("#ptransito").text("Pedido No."+code+" transitar por ...");
});

$(document).on('click', '.change-order', function(){
//  alert("HOLA")
  var code = $(this).val();
  var st = $(this).data('state');
  var urlpost = baseurl+"Pedidos/change-state/";
  var parametros = { "pedido" : code, "confirmar": true, "estado":st};
  $.ajax({ data:  parametros, url: urlpost,type:  'post',
  beforeSend: function () {$("#estado"+code).html("Enviando, espere por favor...");},
  success:  function (response) {$("#estado"+code).html(response); }
  });
});

$(document).on('click', '.change-order-2', function(){
//  alert("HOLA")
  var code = $(this).val();
  var st = $(this).data('state');
  var urlpost = baseurl+"Pedidos/change-state/";
  var parametros = { "pedido" : code, "confirmar": true, "estado":st};
  $.ajax({ data:  parametros, url: urlpost,type:  'post',
  beforeSend: function () {$("#estado"+code).html("Enviando, espere por favor...");},
  success:  function (response) {$("#estado"+code).html(response); }
  });
});

$(document).on('click', '.set-canceled', function(){
  var code = $(this).val();
  $("#inputpedidoanceled").val(code);
  $(".textcanceled").text("Anulado Pedido No."+code+" ");
});

$(document).on('click', '.canceled', function(){
  var order = $("#inputpedidoanceled").val();
  var descp = $("#descripcion-canceled").val();
  if (descp=='') {
    alert('Escribe un observación')
  }
  else{
    var div = '<div style="color:#000;font-weight: bold; background-color: #C0C0C0; padding:5px;text-align:center;text-transform: uppercase;"> Anulado </div>';
    var urlpost = baseurl+"Pedidos/canceled-order/";
    var parametros = { "pedido" : order, "confirmar": true, "descp":descp};
    $.ajax({ data:  parametros, url: urlpost,type:  'post',
    beforeSend: function () {$("#resdcanceled").html("Enviando, espere por favor...");},
    success:  function (response) {$("#estado"+order).html(div); $("#resdcanceled").html(response);}
    });
  }
});

$(".transitar").click(function() {

  var urlpost = baseurl+"Pedidos/encargo/";
  var domicilio   = $("#selectdomicilio").val();
  var pedidos   = $("#inputpedido").val();
  //alert("codigo de domicilio "+domicilio+" y el pedido es "+pedidos)
  var div = '<div style="color:#000;font-weight: bold; background-color: #ffa500; padding:5px;text-align:center;text-transform: uppercase;"> Orden confirmada </div>'
  var parametros = {
      "pedido" : pedidos,
      "domiciliario" : domicilio,
      "encargo": true
    };
  $.ajax({ data:  parametros, url: urlpost,type:  'post',
  beforeSend: function () {$("#resdomicilio").html("Enviando, espere por favor...");},
  success:  function (response) {
    $("#resdomicilio").html(response);
  }
  });

});

$(".llamar-tabla").click(function() {
  var urlpost = baseurl+"Pedidos/tabla/";
  var parametros = {
      "tabla" : true,
      "estado" : $(this).data("state")
    };
  $.ajax({ data:  parametros, url: urlpost,type:  'post',
  beforeSend: function () {$("#restable").html("Cargando, espere por favor...");},
  success:  function (response) {
    $("#tableado").html(response);
    $("#restable").html("");
  }
  });
});
