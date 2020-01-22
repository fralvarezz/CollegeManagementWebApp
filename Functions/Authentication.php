<?php
/*
Contiene la funcion de comprobacion de autenticación
Hecho por: xa8678
04/10/2019
*/

/*
function IsAuthenticated()
Hecho por: xa8678
04/10/2019
Esta función valida si existe la variable de session login
Si no existe redirige a la pagina de login
Si existe comprueba si el usuario tiene permisos para ejecutar la accion de ese controlador
*/
function IsAuthenticated(){
	if (!isset($_SESSION['login'])){ //Si no existe variable de session login devuelve falso
		return false;
	}
	else{ //si no devuelve verdadero
		return true;
	}
}
?>

