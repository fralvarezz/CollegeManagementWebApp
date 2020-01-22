<?php

/*
Controlador de ESPACIO, gestiona todas las acciones relacionadas con ESPACIO
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
	include '../Model/ESPACIO_Model.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/ESPACIO_SEARCH_View.php';
	include '../View/ESPACIO_ADD_View.php';
	include '../View/ESPACIO_EDIT_View.php';
	include '../View/ESPACIO_DELETE_View.php';
	include '../View/ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia ESPACIO y la devuelve
	function get_data_form(){

		$codespacio = $_POST['CODESPACIO']; //guarda los datos recibidos por el post
		$codedificio = $_POST['CODEDIFICIO']; //guarda los datos recibidos por el post
		$codcentro = $_POST['CODCENTRO']; //guarda los datos recibidos por el post
		$tipo = $_POST['TIPO'];  //guarda los datos recibidos por el post
		$superficieespacio = $_POST['SUPERFICIEESPACIO']; //guarda los datos recibidos por el post
		$numinventarioespacio = $_POST['NUMINVENTARIOESPACIO']; //guarda los datos recibidos por el post

		$ESPACIO = new ESPACIO_Model($codespacio,$codedificio,$codcentro,$tipo,$superficieespacio, $numinventarioespacio); //modelo del espacio con los datos anteriores
		return $ESPACIO;
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
				if (!$_POST){ // se incoca la vista de add de ESPACIO
					new ESPACIO_ADD($Integridad->CodigosEdificio(), $Integridad->CodigosCentro());
				}
				else{
					$ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['codespacio'],'','','','','');
					$valores = $ESPACIO->RellenaDatos(); //guardo todos los atributos de este usuario
					new ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$ESPACIO = get_data_form();
					$respuesta = $ESPACIO->DELETE();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['codespacio'],'','','','',''); // Creo el objeto
					$valores = $ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new ESPACIO_EDIT($valores, $Integridad->CodigosEdificio(), $Integridad->CodigosCentro()); //invoco la vista de edit con los datos precargados
					}
					else
					{
						new MESSAGE($valores, '../Controller/ESPACIO_Controller.php');
					}
				}
				else{

					$ESPACIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $ESPACIO->EDIT(); // update en la bd
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new ESPACIO_SEARCH(); //invoco la vista de busqueda de ESPACIO
				}
				else{
					$ESPACIO = get_data_form(); //guardo los valores para buscar
					$datos = $ESPACIO->SEARCH(); //busco ESPACIO con esos parametros de busqueda

					$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO', 'TIPO', 'SUPERFICIEESPACIO','NUMINVENTARIOESPACIO'); //parametros a mostrar

					new ESPACIO_SHOWALL($lista, $datos, '../index.php'); //muestro los datos de esos ESPACIO
				}
				break;
			case 'SHOWCURRENT':
				$ESPACIO = new ESPACIO_Model($_REQUEST['codespacio'],'','','','',''); //creo un modelo de usuario con el codespacio proporcionado
				$valores = $ESPACIO->RellenaDatos(); //busco sus atributos en la bd
				new ESPACIO_SHOWCURRENT($valores); //los muestro
				break;
			default:
				if (!$_POST){ //si no recibimos formulario por POST
					if (isset($_GET['codcentro'])) //si no recibimos un codcentro para mostrar
					{
					    $ESPACIO = new ESPACIO_Model('','',$_REQUEST['codcentro'],'','',''); //crea modelo con codcentro
					}
					else if (isset($_GET['codedificio'])) //si tampoco recibimos un codedificio para mostrar
					{
						$ESPACIO = new ESPACIO_Model('',$_REQUEST['codedificio'],'','','',''); //crea modelo con codedificio
					}
					else{ //si no recibimos ningun get
						$ESPACIO = new ESPACIO_Model('','','','','',''); //creo un modelo de usuario con datos vacios
					}
				}
				else{
					$ESPACIO = get_data_form(); //recojo datos del formulario
				}
				$datos = $ESPACIO->SEARCH(); //busco todos los ESPACIO con todos los atributos
				$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO', 'TIPO', 'SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');
				new ESPACIO_SHOWALL($lista, $datos); //muestro todos los atributos de todos los ESPACIO
		}

?>
