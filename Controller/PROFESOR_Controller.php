<?php

/*
Controlador de PROFESOR, gestiona todas las acciones relacionadas con PROFESOR
Hecho por: xa8678
05/10/19
*/

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos los ficheros necesarios
	include '../Model/PROFESOR_Model.php';
	include '../View/PROFESOR_SHOWALL_View.php';
	include '../View/PROFESOR_SEARCH_View.php';
	include '../View/PROFESOR_ADD_View.php';
	include '../View/PROFESOR_EDIT_View.php';
	include '../View/PROFESOR_DELETE_View.php';
	include '../View/PROFESOR_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROFESOR y la devuelve
	function get_data_form(){

		$dni = $_POST['DNI']; //guarda los datos recibidos por el post
		$nombreprofesor = $_POST['NOMBREPROFESOR']; //guarda los datos recibidos por el post
		$apellidosprofesor = $_POST['APELLIDOSPROFESOR']; //guarda los datos recibidos por el post
		$areaprofesor = $_POST['AREAPROFESOR'];  //guarda los datos recibidos por el post
		$departamentoprofesor = $_POST['DEPARTAMENTOPROFESOR']; //guarda los datos recibidos por el post

		$PROFESOR = new PROFESOR_Model($dni,$nombreprofesor,$apellidosprofesor,$areaprofesor,$departamentoprofesor); //modelo de profesor
		return $PROFESOR;
	}


// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de PROFESOR
					new PROFESOR_ADD();
				}
				else{
					$PROFESOR = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR->ADD();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','','');
					$valores = $PROFESOR->RellenaDatos(); //guardo todos los atributos de este usuario
					new PROFESOR_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR = get_data_form();
					$respuesta = $PROFESOR->DELETE();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','',''); // Creo el objeto
					$valores = $PROFESOR->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROFESOR_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/PROFESOR_Controller.php');
					}
				}
				else{

					$PROFESOR = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROFESOR->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROFESOR_SEARCH(); //invoco la vista de busqueda de PROFESOR
				}
				else{
					$PROFESOR = get_data_form(); //guardo los valores para buscar
					$datos = $PROFESOR->SEARCH(); //busco PROFESOR con esos parametros de busqueda

					$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR', 'AREAPROFESOR', 'DEPARTAMENTOPROFESOR'); //parametros a mostrar

					new PROFESOR_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos PROFESOR
				}
				break;
			case 'SHOWCURRENT':
				$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','',''); //creo un modelo de usuario con el dni proporcionado
				$valores = $PROFESOR->RellenaDatos(); //busco sus atributos en la bd
				new PROFESOR_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){
					$PROFESOR = new PROFESOR_Model('','','','',''); //creo un modelo de usuario con datos vacios
				}
				else{
					$PROFESOR = get_data_form(); //recojo datos del formulario
				}
				$datos = $PROFESOR->SEARCH(); //busco todos los PROFESOR con todos los atributos
				$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR', 'AREAPROFESOR', 'DEPARTAMENTOPROFESOR');
				new PROFESOR_SHOWALL($lista, $datos); //muestro todos los atributos de todos los PROFESOR
		}

?>
