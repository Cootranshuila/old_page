<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("location:https://cootranshuila.com/dashboard-design/login.php");
	exit();
}
?>