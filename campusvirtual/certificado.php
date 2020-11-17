<?php 

if ($_GET['ano'] == 2017) { ?>
<img src="img/bg-img/cer_2017.png" alt="" width="1254px" heigth="741px" style="position: relative;float: left;margin: 0 auto;z-index: -1;">
<?php } else { ?>
<img src="img/bg-img/cer_2018.png" alt="" width="1254px" heigth="741px" style="position: relative;float: left;margin: 0 auto;z-index: -1;">
<?php }
?>
<p id="nombre" style="width:1254px;height:741px;font-size: 32px;font-weight: 800;position: relative;float: left;justify-content: center;text-align: center;margin-top: -480px;z-index: 1;font-family: cursive;">Leiner Fabian Ortega Ojeda</p>



<!-- jQuery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>

<script>


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

var nombre = getParameterByName('nombre');
var ano = getParameterByName('ano');

document.getElementById('nombre').innerHTML=nombre;

</script>