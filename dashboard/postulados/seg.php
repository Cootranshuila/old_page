<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("location:../Administrador.php?x=1");
	exit();
}
?>