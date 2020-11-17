<?php 

session_start();

unset($_SESSION['usr']);
unset($_SESSION['semana']);

header("location:../production/login.php");

?>