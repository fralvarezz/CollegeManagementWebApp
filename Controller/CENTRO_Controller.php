<?php

/*
Controlador de CENTRO, gestiona todas las acciones relacionadas con CENTRO
Hecho por: xa8678
05/10/19
*/

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	//incluimos los ficheros necesarios
	include '../Model/IntegridadReferencial_Model.php'; 
	include '../Model/CENTRO_Model.php';
	include '../Model/EDIFICIO_Model.php';
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/CENTRO_SEARCH_View.php';
	include '../View/CENTRO_ADD_View.php';
	include '../View/CENTRO_EDIT_View.php';
	include '../View/CENTRO_DELETE_View.php';
	include '../View/CENTRO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){

		$codcentro = $_POST['CODCENTRO']; //guarda los datos recibidos por el post
		$codedificio = $_POST['CODEDIFICIO']; //guarda los datos recibidos por el post
		$nombrecentro = $_POST['NOMBRECENTRO']; //guarda los datos recibidos por el post
		$direccioncentro = $_POST['DIRECCIONCENTRO'];  //guarda los datos recibidos por el post
		$responsablecentro = $_POST['RESPONSABLECENTRO']; //guarda los datos recibidos por el post

		$CENTRO = new CENTRO_Model($codcentro,$codedificio,$nombrecentro,$direccioncentro,$responsablecentro); //modelo del Centro
		return $CENTRO;

	}


// sino existe la variable action la crea vacia para no tener error de undefined index
	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}
// util para obtener id de entidades ajenas
	$Integridad = new Integridad(); 

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de CENTRO
					$CENTRO = new CENTRO_Model('','','','',''); //modelo de centro vacio
					new CENTRO_ADD($Integridad->CodigosEdificio());
				}
				else{
					$CENTRO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $CENTRO->ADD();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$CENTRO = new CENTRO_Model($_REQUEST['codcentro'],'','','','');
					$valores = $CENTRO->RellenaDatos(); //guardo todos los atributos de este usuario
					new CENTRO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$CENTRO = get_data_form();
					$respuesta = $CENTRO->DELETE();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$CENTRO = new CENTRO_Model($_REQUEST['codcentro'],'','','',''); // Creo el objeto
					$valores = $CENTRO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new CENTRO_EDIT($valores,$Integridad->CodigosEdificio()); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/CENTRO_Controller.php');
					}
				}
				else{

					$CENTRO = get_data_form(); //recojo los valores del formulario

					$respuesta = $CENTRO->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new CENTRO_SEARCH(); //invoco la vista de busqueda de CENTRO
				}
				else{
					$CENTRO = get_data_form(); //guardo los valores para buscar
					$datos = $CENTRO->SEARCH(); //busco CENTRO con esos parametros de busqueda

					$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO', 'DIRECCIONCENTRO', 'RESPONSABLECENTRO'); //parametros a mostrar

					new CENTRO_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos CENTRO
				}
				break;
			case 'SHOWCURRENT':
				$CENTRO = new CENTRO_Model($_REQUEST['codcentro'],'','','',''); //creo un modelo de usuario con el codcentro proporcionado
				$valores = $CENTRO->RellenaDatos(); //busco sus atributos en la bd
				new CENTRO_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){
					if (isset($_GET['codedificio'])) //si no recibimos un codedificio para mostrar
					{
					    $CENTRO = new CENTRO_Model('',$_REQUEST['codedificio'],'','',''); //crea modelo con codedificio
					}
					else{ //si no recibimos ningun get
						$CENTRO = new CENTRO_Model('','','','',''); //creo un modelo de usuario con datos vacios
					}
				}
				else{
					$CENTRO = get_data_form(); //recojo datos del formulario
				}
				$datos = $CENTRO->SEARCH(); //busco todos los CENTRO con todos los atributos
				$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO', 'DIRECCIONCENTRO', 'RESPONSABLECENTRO');
				new CENTRO_SHOWALL($lista, $datos); //muestro todos los atributos de todos los CENTRO
		}

?>
