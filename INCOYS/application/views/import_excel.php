<html>
<head></head>
<body>
<?php echo validation_errors(); ?>
<h1>import excel</h1>
<hr>
<form role="form" action="<?= base_url()?>Medidas/guardar_horario" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" name="subir">
</form>
</body>
