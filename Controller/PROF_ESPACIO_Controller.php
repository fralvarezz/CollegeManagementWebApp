<?php

/*
Controlador de PROF_ESPACIO, gestiona todas las acciones relacionadas con PROF_ESPACIO
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
	include '../Model/PROF_ESPACIO_Model.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SEARCH_View.php';
	include '../View/PROF_ESPACIO_ADD_View.php';
	include '../View/PROF_ESPACIO_EDIT_View.php';
	include '../View/PROF_ESPACIO_DELETE_View.php';
	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_ESPACIO y la devuelve
	function get_data_form(){

		$DNI = $_POST['DNI']; //guarda los datos recibidos por el post
		$CODESPACIO = $_POST['CODESPACIO']; //guarda los datos recibidos por el post

		$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO); //modelo de profespacio
		return $PROF_ESPACIO;
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
				if (!$_POST){ // se incoca la vista de add de PROF_ESPACIO
					new PROF_ESPACIO_ADD($Integridad->DNIProfesor(),$Integridad->CodigosEspacio());
				}
				else{
					$PROF_ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['dni'],$_REQUEST['codespacio']);
					$valores = $PROF_ESPACIO->RellenaDatos(); //guardo todos los atributos de este usuario
					new PROF_ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_ESPACIO = get_data_form();
					$respuesta = $PROF_ESPACIO->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['dni'],$_REQUEST['codespacio']); // Creo el objeto
					$valores = $PROF_ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROF_ESPACIO_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php');
					}
				}
				else{

					$PROF_ESPACIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROF_ESPACIO->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROF_ESPACIO_SEARCH(); //invoco la vista de busqueda de PROF_ESPACIO
				}
				else{
					$PROF_ESPACIO = get_data_form(); //guardo los valores para buscar
					$datos = $PROF_ESPACIO->SEARCH(); //busco PROF_ESPACIO con esos parametros de busqueda

					$lista = array('DNI','CODESPACIO'); //parametros a mostrar

					new PROF_ESPACIO_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos PROF_ESPACIO
				}
				break;
			case 'SHOWCURRENT':
				$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['dni'],$_REQUEST['codespacio']); //creo un modelo de usuario con el DNI proporcionado
				$valores = $PROF_ESPACIO->RellenaDatos(); //busco sus atributos en la bd
				new PROF_ESPACIO_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){
					if (isset($_GET['dni'])) //si recibimos un dni para mostrar
					{
					    $PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['dni'],''); //crea modelo con dni
					}
					else if(isset($_GET['codespacio']))  //si recibimos codespacio
					{
						$PROF_ESPACIO = new PROF_ESPACIO_Model('',$_REQUEST['codespacio']); //creo un modelo con codespacio
					}
					else{
						$PROF_ESPACIO = new PROF_ESPACIO_Model('',''); //creo un modelo con datos vacios
					}
				}
				else{
					$PROF_ESPACIO = get_data_form(); //recojo datos del formulario
				}
				$datos = $PROF_ESPACIO->SEARCH(); //busco todos los PROF_ESPACIO con todos los atributos
				$lista = array('DNI','CODESPACIO');
				new PROF_ESPACIO_SHOWALL($lista, $datos); //muestro todos los atributos de todos los PROF_ESPACIO
		}

?>
