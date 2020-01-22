<?php

/*
Controlador de EDIFICIO, gestiona todas las acciones relacionadas con EDIFICIO
Hecho por: xa8678
05/10/19
*/

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	//incluimos los ficheros necesarios
	include '../Model/EDIFICIO_Model.php';
	include '../View/EDIFICIO_SHOWALL_View.php';
	include '../View/EDIFICIO_SEARCH_View.php';
	include '../View/EDIFICIO_ADD_View.php';
	include '../View/EDIFICIO_EDIT_View.php';
	include '../View/EDIFICIO_DELETE_View.php';
	include '../View/EDIFICIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia EDIFICIO y la devuelve
	function get_data_form(){

		$codedificio = $_POST['CODEDIFICIO']; //guarda los datos recibidos por el post
		$nombreedificio = $_POST['NOMBREEDIFICIO']; //guarda los datos recibidos por el post
		$direccionedificio = $_POST['DIRECCIONEDIFICIO']; //guarda los datos recibidos por el post
		$campusedificio = $_POST['CAMPUSEDIFICIO'];  //guarda los datos recibidos por el post

		$EDIFICIO = new EDIFICIO_Model($codedificio,$nombreedificio,$direccionedificio,$campusedificio); //modelo del edificio
		return $EDIFICIO;
	}


// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de EDIFICIO
					new EDIFICIO_ADD();
				}
				else{
					$EDIFICIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $EDIFICIO->ADD();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['codedificio'],'','','');
					$valores = $EDIFICIO->RellenaDatos(); //guardo todos los atributos de este usuario
					new EDIFICIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$EDIFICIO = get_data_form();
					$respuesta = $EDIFICIO->DELETE();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['codedificio'],'','',''); // Creo el objeto
					$valores = $EDIFICIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new EDIFICIO_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php');
					}
				}
				else{

					$EDIFICIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $EDIFICIO->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new EDIFICIO_SEARCH(); //invoco la vista de busqueda de EDIFICIO
				}
				else{
					$EDIFICIO = get_data_form(); //guardo los valores para buscar
					$datos = $EDIFICIO->SEARCH(); //busco EDIFICIO con esos parametros de busqueda

					$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO', 'CAMPUSEDIFICIO'); //parametros a mostrar

					new EDIFICIO_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos EDIFICIO
				}
				break;
			case 'SHOWCURRENT':
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['codedificio'],'','',''); //creo un modelo de usuario con el codedificio proporcionado
				$valores = $EDIFICIO->RellenaDatos(); //busco sus atributos en la bd
				new EDIFICIO_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){
					$EDIFICIO = new EDIFICIO_Model('','','',''); //creo un modelo de usuario con datos vacios
				}
				else{
					$EDIFICIO = get_data_form(); //recojo datos del formulario
				}
				$datos = $EDIFICIO->SEARCH(); //busco todos los EDIFICIO con todos los atributos
				$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO', 'CAMPUSEDIFICIO');
				new EDIFICIO_SHOWALL($lista, $datos); //muestro todos los atributos de todos los EDIFICIO
		}

?>
