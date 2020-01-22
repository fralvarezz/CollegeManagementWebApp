<?php

/*
Controlador de TITULACION, gestiona todas las acciones relacionadas con TITULACION
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
	include '../Model/TITULACION_Model.php';
	include '../View/TITULACION_SHOWALL_View.php';
	include '../View/TITULACION_SEARCH_View.php';
	include '../View/TITULACION_ADD_View.php';
	include '../View/TITULACION_EDIT_View.php';
	include '../View/TITULACION_DELETE_View.php';
	include '../View/TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia TITULACION y la devuelve
	function get_data_form(){

		$codtitulacion = $_POST['CODTITULACION']; //guarda los datos recibidos por el post
		$codcentro = $_POST['CODCENTRO']; //guarda los datos recibidos por el post
		$nombretitulacion = $_POST['NOMBRETITULACION']; //guarda los datos recibidos por el post
		$responsabletitulacion = $_POST['RESPONSABLETITULACION']; //guarda los datos recibidos por el post

		$TITULACION = new TITULACION_Model($codtitulacion,$codcentro,$nombretitulacion,$responsabletitulacion); //modelo de titulacion
		return $TITULACION;
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
				if (!$_POST){ // se incoca la vista de add de TITULACION
					new TITULACION_ADD($Integridad->CodigosCentro());
				}
				else{
					$TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $TITULACION->ADD();
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$TITULACION = new TITULACION_Model($_REQUEST['codtitulacion'],'','','');
					$valores = $TITULACION->RellenaDatos(); //guardo todos los atributos de este usuario
					new TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$TITULACION = get_data_form();
					$respuesta = $TITULACION->DELETE();
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$TITULACION = new TITULACION_Model($_REQUEST['codtitulacion'],'','',''); // Creo el objeto
					$valores = $TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new TITULACION_EDIT($valores, $Integridad->CodigosCentro()); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/TITULACION_Controller.php');
					}
				}
				else{

					$TITULACION = get_data_form(); //recojo los valores del formulario

					$respuesta = $TITULACION->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new TITULACION_SEARCH(); //invoco la vista de busqueda de TITULACION
				}
				else{
					$TITULACION = get_data_form(); //guardo los valores para buscar
					$datos = $TITULACION->SEARCH(); //busco TITULACION con esos parametros de busqueda

					$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION', 'RESPONSABLETITULACION'); //parametros a mostrar

					new TITULACION_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos TITULACION
				}
				break;
			case 'SHOWCURRENT':
				$TITULACION = new TITULACION_Model($_REQUEST['codtitulacion'],'','',''); //creo un modelo de usuario con el codtitulacion proporcionado
				$valores = $TITULACION->RellenaDatos(); //busco sus atributos en la bd
				new TITULACION_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){
					if (isset($_GET['codcentro'])) //si no recibimos un codcentro para mostrar
					{
					    $TITULACION = new TITULACION_Model('',$_REQUEST['codcentro'],'',''); //crea modelo con codcentro
					}
					else{ //si no recibimos ningun get
						$TITULACION = new TITULACION_Model('','','',''); //creo un modelo de usuario con datos vacios
					}
				}
				else{
					$TITULACION = get_data_form(); //recojo datos del formulario
				}
				$datos = $TITULACION->SEARCH(); //busco todos los TITULACION con todos los atributos
				$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION', 'RESPONSABLETITULACION');
				new TITULACION_SHOWALL($lista, $datos); //muestro todos los atributos de todos los TITULACION
		}

?>
