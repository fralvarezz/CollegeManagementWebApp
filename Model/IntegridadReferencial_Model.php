<?php

/*
Modelo que consulta BD para obtener identificadores necesarios para preservar integridad referencial DB en View
Hecho por: xa8678
04/10/2019
*/

//-------------------------------------------------------
//Clase con metodos para obtener codigos identificadores de cualquier entidad
class Integridad {

	//Constructor de la clase
	function __construct(){
		include_once '../Model/Access_DB.php';
		$this->mysqli = ConnectDB();
	}

	//destructor de la clase
	function __destruct(){

	}

	// funcion CodigosEdificio: devuelve los codigos de todos edificios que hay en la bd
	function CodigosEdificio(){
		//query sql
		$sql = "SELECT CODEDIFICIO
				FROM EDIFICIO";
		if (!$resultado = $this->mysqli->query($sql)) //error base de datos
		{
			return 'Error de gestor de base de datos';
		}
		else //query ok, 
		{
			$toret = array(); //array de codedificio a devolver
			while ($row=$resultado->fetch_array()) {  //recorro todas las filas que ha devuelto fetcharray
				array_push($toret,$row[0]);
			}
		}
		return $toret;
	}

	// funcion CodigosCentro: devuelve los codigos de todos centros que hay en la bd
	function CodigosCentro(){
		//query sql
		$sql = "SELECT CODCENTRO
				FROM CENTRO";
		if (!$resultado = $this->mysqli->query($sql)) //error base de datos
		{
			return 'Error de gestor de base de datos';
		}
		else //query ok, 
		{
			$toret = array(); //array de codedificio a devolver
			while ($row=$resultado->fetch_array()) {  //recorro todas las filas que ha devuelto fetcharray
				array_push($toret,$row[0]);
			}
		}
		return $toret;
	}

	// funcion CodigosEspacio: devuelve los codigos de todos espacios que hay en la bd
	function CodigosEspacio(){
		//query sql
		$sql = "SELECT CODESPACIO
				FROM ESPACIO";
		if (!$resultado = $this->mysqli->query($sql)) //error base de datos
		{
			return 'Error de gestor de base de datos';
		}
		else //query ok, 
		{
			$toret = array(); //array de codedificio a devolver
			while ($row=$resultado->fetch_array()) {  //recorro todas las filas que ha devuelto fetcharray
				array_push($toret,$row[0]);
			}
		}
		return $toret;
	}

	// funcion DNIProfesor: devuelve los codigos de todos profesores que hay en la bd
	function DNIProfesor(){
		//query sql
		$sql = "SELECT DNI
				FROM PROFESOR";
		if (!$resultado = $this->mysqli->query($sql)) //error base de datos
		{
			return 'Error de gestor de base de datos';
		}
		else //query ok, 
		{
			$toret = array(); //array de codedificio a devolver
			while ($row=$resultado->fetch_array()) {  //recorro todas las filas que ha devuelto fetcharray
				array_push($toret,$row[0]);
			}
		}
		return $toret;
	}

	// funcion CodigosTitulacion: devuelve los codigos de todos titulaciones que hay en la bd
	function CodigosTitulacion(){
		//query sql
		$sql = "SELECT CODTITULACION
				FROM TITULACION";
		if (!$resultado = $this->mysqli->query($sql)) //error base de datos
		{
			return 'Error de gestor de base de datos';
		}
		else //query ok, 
		{
			$toret = array(); //array de codedificio a devolver
			while ($row=$resultado->fetch_array()) {  //recorro todas las filas que ha devuelto fetcharray
				array_push($toret,$row[0]);
			}
		}
		return $toret;
	}

}

?>