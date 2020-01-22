<?php

/*
Controlador de USUARIOS, gestiona todas las acciones relacionadas con USUARIOS
Hecho por: xa8678
05/10/19
*/

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos los ficheros necesarios
	include '../Model/USUARIOS_Model.php';
	include '../View/USUARIOS_SHOWALL_View.php';
	include '../View/USUARIOS_SEARCH_View.php';
	include '../View/USUARIOS_ADD_View.php';
	include '../View/USUARIOS_EDIT_View.php';
	include '../View/USUARIOS_DELETE_View.php';
	include '../View/USUARIOS_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	function get_data_form(){

		$login = $_POST['login']; //guarda los datos recibidos por el post
		$password = $_POST['password']; //guarda los datos recibidos por el post
		$DNI = $_POST['DNI']; //guarda los datos recibidos por el post
		$nombre = $_POST['nombre']; //guarda los datos recibidos por el post
		$apellidos = $_POST['apellidos']; //guarda los datos recibidos por el post
		$telefono = $_POST['telefono']; //guarda los datos recibidos por el post
		$email = $_POST['email']; //guarda los datos recibidos por el post
		$FechaNacimiento = $_POST['FechaNacimiento']; //guarda los datos recibidos por el post
		$fotopersonal = ""; //guarda la foto, se recibira mas adelante
		$sexo = $_POST['sexo']; //guarda los datos recibidos por el post
		$action = $_POST['action']; //guarda los datos recibidos por el post


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
		else{//si no hacemos un edit
			if(isset($_FILES['fotopersonalcambio']) && $_FILES['fotopersonalcambio']['name'] != ''){ //si tenemos fotopersonalnueva y no esta vacia
				if (is_uploaded_file($_FILES['fotopersonalcambio']['tmp_name'])) //si esta subida la foto
				{
					$directorio = "../Files/"; //se asigna el directorio donde se va a almacenar
					$aux = explode(".",$_FILES['fotopersonalcambio']['name']);//aux para escoger la extension
					$extension = end($aux); //seleccionamos la extension del fichero
					$fichero = $login . "." . $extension; //asignamos el nombre del fichero como login.extension
					move_uploaded_file($_FILES['fotopersonalcambio']['tmp_name'], $directorio . $fichero); //movemos el fichero al directorio
					$fotopersonal = $directorio . $fichero; //damos valor a fotopersonal
				}
				else{//si no foto personal esta vacia
					$fotopersonal = ""; //si no foto personal esta vacia
				}
			}
		}

		$usuario = new Usuarios_Model ($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo);

		return $usuario;
	}


// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new USUARIOS_ADD();
				}
				else{
					$USUARIOS = get_data_form(); //se recogen los datos del formulario
					$respuesta = $USUARIOS->ADD();
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','');
					$valores = $USUARIOS->RellenaDatos(); //guardo todos los atributos de este usuario
					new USUARIOS_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$USUARIOS = get_data_form();
					$respuesta = $USUARIOS->DELETE();
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); // Creo el objeto
					$valores = $USUARIOS->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new USUARIOS_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/USUARIOS_Controller.php');
					}
				}
				else{

					$USUARIOS = get_data_form(); //recojo los valores del formulario

					$respuesta = $USUARIOS->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new USUARIOS_SEARCH(); //invoco la vista de busqueda de usuarios
				}
				else{
					$USUARIOS = get_data_form(); //guardo los valores para buscar
					$datos = $USUARIOS->SEARCH(); //busco usuarios con esos parametros de busqueda

					$lista = array('login','password','DNI', 'nombre', 'apellidos', 'telefono', 'email', 'FechaNacimiento', 'fotopersonal', 'sexo'); //parametros a mostrar

					new USUARIOS_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos usuarios
				}
				break;
			case 'SHOWCURRENT':
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); //creo un modelo de usuario con el login proporcionado
				$valores = $USUARIOS->RellenaDatos(); //busco sus atributos en la bd
				new USUARIOS_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){
					$USUARIOS = new USUARIOS_Model('','','','','','','','','',''); //creo un modelo de usuario con datos vacios
				}
				else{
					$USUARIOS = get_data_form(); //recojo datos del formulario
				}
				$datos = $USUARIOS->SEARCH(); //busco todos los usuarios con todos los atributos
				$lista = array('login','password','DNI', 'nombre', 'apellidos', 'telefono', 'email', 'FechaNacimiento', 'fotopersonal', 'sexo');
				new USUARIOS_SHOWALL($lista, $datos); //muestro todos los atributos de todos los usuarios
		}

?>
