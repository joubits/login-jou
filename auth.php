<?php
session_start();
$usuario = $_SESSION["usuario"];
//autenticacion
if(!isset($usuario)){
	header("Location: login.php");
	exit(); 
}
?>