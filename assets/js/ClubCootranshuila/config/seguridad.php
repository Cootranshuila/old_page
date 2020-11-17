<?php
session_start();
if (!isset($_SESSION['usr'])) {
	header('location:../production/login.php');
}
?> 