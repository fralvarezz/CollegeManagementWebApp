<?php
/*
Página de inicio tras loggearte correctamente
Hecho por: xa8678
04/10/19 
*/
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
	header('Location: ../index.php');
}
//esta autenticado
else{
	include '../View/users_index_View.php';
	new Index();
}

?>