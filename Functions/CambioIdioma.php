<?php
/*
Fichero que contiene la implementación del cambio de idioma
Hecho por: xa8678
04/10/2019
*/

session_start();
$idioma = $_POST['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>