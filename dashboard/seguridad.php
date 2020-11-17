<?php
session_start();
if (!isset($_SESSION['user'])) {
	$x = 3;
}
?> 