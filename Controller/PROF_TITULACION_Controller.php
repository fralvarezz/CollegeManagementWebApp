<?php

/*
Controlador de PROF_TITULACION, gestiona todas las acciones relacionadas con PROF_TITULACION
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
	include '../Model/PROF_TITULACION_Model.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SEARCH_View.php';
	include '../View/PROF_TITULACION_ADD_View.php';
	include '../View/PROF_TITULACION_EDIT_View.php';
	include '../View/PROF_TITULACION_DELETE_View.php';
	include '../View/PROF_TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_TITULACION y la devuelve
	function get_data_form(){

		$dni = $_POST['DNI'];
		$codtitulacion = $_POST['CODTITULACION']; //guarda los datos recibidos por el post
		$anhoacademico = $_POST['ANHOACADEMICO']; //guarda los datos recibidos por el post

		$PROF_TITULACION = new PROF_TITULACION_Model($dni,$codtitulacion,$anhoacademico); //modelo de profesor titulacion
		return $PROF_TITULACION;
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
				if (!$_POST){ // se incoca la vista de add de PROF_TITULACION
					new PROF_TITULACION_ADD($Integridad->DNIProfesor(),$Integridad->CodigosTitulacion());
				}
				else{
					$PROF_TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_TITULACION->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['dni'],$_REQUEST['codtitulacion'],'');
					$valores = $PROF_TITULACION->RellenaDatos(); //guardo todos los atributos de este usuario
					new PROF_TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_TITULACION = get_data_form();
					$respuesta = $PROF_TITULACION->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['dni'],$_REQUEST['codtitulacion'],''); // Creo el objeto
					$valores = $PROF_TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROF_TITULACION_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/PROF_TITULACION_Controller.php');
					}
				}
				else{

					$PROF_TITULACION = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROF_TITULACION->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROF_TITULACION_SEARCH(); //invoco la vista de busqueda de PROF_TITULACION
				}
				else{
					$PROF_TITULACION = get_data_form(); //guardo los valores para buscar
					$datos = $PROF_TITULACION->SEARCH(); //busco PROF_TITULACION con esos parametros de busqueda

					$lista = array('DNI','CODTITULACION','ANHOACADEMICO'); //parametros a mostrar

					new PROF_TITULACION_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos PROF_TITULACION
				}
				break;
			case 'SHOWCURRENT':
				$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['dni'],$_REQUEST['codtitulacion'],''); //creo un modelo de usuario con el dni y codtitulacion proporcionado
				$valores = $PROF_TITULACION->RellenaDatos(); //busco sus atributos en la bd
				new PROF_TITULACION_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){
					if (isset($_GET['dni'])) //si recibimos un dni para mostrar
					{
					    $PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['dni'],'',''); //crea modelo con dni
					}
					else if(isset($_GET['codtitulacion']))  //si recibimos codtitulacion
					{
						$PROF_TITULACION = new PROF_TITULACION_Model('',$_REQUEST['codtitulacion'],''); //creo un modelo con codtitulacion
					}
					else{
						$PROF_TITULACION = new PROF_TITULACION_Model('','',''); //creo un modelo con datos vacios
					}
				}
				else{
					$PROF_TITULACION = get_data_form(); //recojo datos del formulario
				}
				$datos = $PROF_TITULACION->SEARCH(); //busco todos los PROF_TITULACION con todos los atributos
				$lista = array('DNI','CODTITULACION','ANHOACADEMICO');
				new PROF_TITULACION_SHOWALL($lista, $datos); //muestro todos los atributos de todos los PROF_TITULACION
		}

?>
