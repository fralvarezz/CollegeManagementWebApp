<?php
/*
Funcion de desconexión
Hecho por: xa8678
04/10/2019
*/


session_start();
session_destroy();//Termina la sesion
header('Location:../index.php');//Vuelve a index

?>
