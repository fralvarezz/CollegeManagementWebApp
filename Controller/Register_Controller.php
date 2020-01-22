<?php
/*
Controlador que gestiona el proceso de registro de un usuario
Hecho por: xa8678
04/10/19
*/
session_start();
include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';

//si no ha recibido los datos del usuario muestra el formulario
if(!isset($_POST['login'])){
	include '../View/Register_View.php';
	$register = new Register();
}
//si los he recibido intenta registrarlo
else{
	//crea un modelo de usuario con los datos
	include '../Model/USUARIOS_Model.php';
	$login = $_REQUEST['login']; //guarda los datos recibidos por el request
	$password = $_REQUEST['password']; //guarda los datos recibidos por el request
	$DNI = $_REQUEST['DNI']; //guarda los datos recibidos por el request
	$nombre = $_REQUEST['nombre']; //guarda los datos recibidos por el request
	$apellidos = $_REQUEST['apellidos']; //guarda los datos recibidos por el request
	$telefono = $_REQUEST['telefono']; //guarda los datos recibidos por el request
	$email = $_REQUEST['email']; //guarda los datos recibidos por el request
	$FechaNacimiento = $_REQUEST['FechaNacimiento']; //guarda los datos recibidos por el request
	$fotopersonal = ""; //guarda la foto, se recibira mas adelante
	$sexo = $_REQUEST['sexo']; //guarda los datos recibidos por el request
	$action = $_REQUEST['action']; //guarda los datos recibidos por el request


	$usuario = new Usuarios_Model ($login,$password,'','','','','','','','');
	//comprueba que no exista un usuario con esos datos
	$respuesta = $usuario->Register();

	//si no existe lo crea
	if ($respuesta == 'true'){
		if(isset($_FILES['fotopersonal'])){ //si esta set la fotopersonal de la variable FILES
			if (is_uploaded_file($_FILES['fotopersonal']['tmp_name'])) //si se ha subido una foto
			{
				$directorio = "../Files/"; //se asigna el directorio donde se va a almacenar
				$aux = explode(".",$_FILES['fotopersonal']['name']);//aux para escoger la extension
				$extension = end($aux); //seleccionamos la extension del fichero
				$fichero = $login . "." . $extension; //asignamos el nombre del fichero como login.extension
				move_uploaded_file($_FILES['fotopersonal']['tmp_name'], $directorio . $fichero); //movemos la foto al directorio
				$fotopersonal = $directorio . $fichero; //damos un valor a $fotopersonal
			}
			else{
				$fotopersonal=""; //si no, foto personal es vacio
			}
		}
		$usuario = new Usuarios_Model ($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);
		$respuesta = $usuario->registrar();

		Include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}
	//si no muestra un mensaje de error
	else{
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}

?>

