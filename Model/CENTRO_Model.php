<?php

/*
Modelo del Centro
Hecho por: xa8678
04/10/2019
*/

//-------------------------------------------------------
//Modelo del Centro
class CENTRO_Model {
	//parametros de la clase
	var $codcentro; //almacena codcentro
	var $codedificio; //almacena codedificio
	var $nombrecentro; //almacena nombrecentro
	var $direccioncentro; //almacena direccioncentro
	var $responsablecentro; //almacena responsablecentro
	var $mysqli; //variable util para conectar a BD y realizar querys

//Constructor de la clase
function __construct($codcentro,$codedificio,$nombrecentro,$direccioncentro,$responsablecentro){
	$this->codcentro = $codcentro;
	$this->codedificio = $codedificio;
	$this->nombrecentro = $nombrecentro;
	$this->direccioncentro = $direccioncentro;
	$this->responsablecentro = $responsablecentro;
	$this->erroresdatos = $this->comprobar_atributos(); //errores de los datos

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//funcion comprobar_atributos
//comprueba que todos los atributos tengan las características necesarias
//devuelve true en caso de que todos los atributos pasen las validaciones
//devuelve un array con todos los errores que han sucedido si hubiera habido alguni
function comprobar_atributos(){
	$toret = array(); //array de errores a devolver si los hubiera
	$resultadoAtr = $this->comprobar_CODCENTRO(); //resultado de la comprobacion de codcentro
	if(gettype($resultadoAtr)=='array'){  //si hubieron errores se introducen en el array
		array_push($toret, $resultadoAtr);
	}
	$resultadoAtr = $this->comprobar_CODEDIFICIO(); //resultado de la comprobacion de codedificio
	if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
		array_push($toret, $resultadoAtr);
	}
	$resultadoAtr = $this->comprobar_NOMBRECENTRO(); //resultado de la comprobacion de nombrecentro
	if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
		array_push($toret, $resultadoAtr);
	}
	$resultadoAtr = $this->comprobar_DIRECCIONCENTRO(); //resultado de la comprobacion de direccioncentro
	if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
		array_push($toret, $resultadoAtr);
	}
	$resultadoAtr = $this->comprobar_RESPONSABLECENTRO(); //resultado de la comprobacion de responsablecentro
	if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
		array_push($toret, $resultadoAtr);
	}

	if(empty($toret)){ //si no hubieron errores se devuelve true
		return true;
	}
	else{ //si no se devuelven los errores
		return $toret;
	}

}


//funcion comprobar_CODCENTRO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
function comprobar_CODCENTRO(){
	$toret = array(); //array de errores a devolver
	if(strlen($this->codcentro) == 0){ //si esta vacio
		array_push($toret, array("nombreatributo"=>"CODCENTRO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
	}
	if(strlen($this->codcentro) >10){ //si su longitud es mayor que 10
		array_push($toret, array("nombreatributo"=>"CODCENTRO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
	}
	if(strlen($this->codcentro) < 3){ //si su longitud es menor que 3
		array_push($toret, array("nombreatributo"=>"CODCENTRO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
	}
	if(!preg_match('/^[-A-Za-z0-9]+$/', $this->codcentro)){ //si no coincide con el patron
		array_push($toret, array("nombreatributo"=>"CODCENTRO","codigoincidencia"=>"00040","mensaje"=>"Solo están permitidas alfabéticos, números y el “-”")); //introduce el error en el array
	}
	if(empty($toret)){ //si el array de errores esta vacio devuelve true
		return true;
	}
	else{
		return $toret;
	} //si hay algun error, devuelve el array con los errores
}

//funcion comprobar_CODEDIFICIO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_CODEDIFICIO(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->codedificio) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"CODEDIFICIO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->codedificio) >10){ //si su longitud es mayor que 10
			array_push($toret, array("nombreatributo"=>"CODEDIFICIO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->codedificio) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"CODEDIFICIO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[-A-Za-z0-9]+$/', $this->codedificio)){ //si no coincide con el patron
			array_push($toret, array("nombreatributo"=>"CODEDIFICIO","codigoincidencia"=>"00040","mensaje"=>"Solo están permitidas alfabéticos, números y el “-”")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

//funcion comprobar_NOMBRECENTRO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_NOMBRECENTRO(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->nombrecentro) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"NOMBRECENTRO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->nombrecentro) >50){ //si su longitud es mayor que 50
			array_push($toret, array("nombreatributo"=>"NOMBRECENTRO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->nombrecentro) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"NOMBRECENTRO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->nombrecentro)){
			array_push($toret, array("nombreatributo"=>"NOMBRECENTRO","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

//funcion comprobar_DIRECCIONCENTRO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_DIRECCIONCENTRO(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->direccioncentro) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"DIRECCIONCENTRO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->direccioncentro) >150){ //si su longitud es mayor que 150
			array_push($toret, array("nombreatributo"=>"DIRECCIONCENTRO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->direccioncentro) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"DIRECCIONCENTRO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[-\/ºªA-Za-z0-9]+( [-\/ºªA-Za-z0-9]+)*$/', $this->direccioncentro)){
			array_push($toret, array("nombreatributo"=>"DIRECCIONCENTRO","codigoincidencia"=>"00050","mensaje"=>"Solo están permitidas alfabéticos, números y los símbolos  “- / º ª”")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

//funcion comprobar_RESPONSABLECENTRO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_RESPONSABLECENTRO(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->responsablecentro) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"RESPONSABLECENTRO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->responsablecentro) >60){ //si su longitud es mayor que 60
			array_push($toret, array("nombreatributo"=>"RESPONSABLECENTRO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->responsablecentro) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"RESPONSABLECENTRO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->responsablecentro)){
			array_push($toret, array("nombreatributo"=>"RESPONSABLECENTRO","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}


//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si ya existe ya en la tabla
function ADD()
{
	$errores = $this->comprobar_atributos();
	if(is_array($errores)){ //si hubieron errores se devuelve
		return $errores;
	}

	//query sql
		$sql = "select * from CENTRO where codcentro = '".$this->codcentro."'";
		//resultado de la query
		if (!$result = $this->mysqli->query($sql)) //si base de datos devuelve error
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}
		//query sql
		$sql = "INSERT INTO CENTRO ( 
			CODCENTRO,
			CODEDIFICIO,
			NOMBRECENTRO,
			DIRECCIONCENTRO,
			RESPONSABLECENTRO
			) 
				VALUES (
					'".$this->codcentro."',
					'".$this->codedificio."',
					'".$this->nombrecentro."',
					'".$this->direccioncentro."',
					'".$this->responsablecentro."'
					)";

		if (!$this->mysqli->query($sql)) { //error base de datos
			return 'Error de gestor de base de datos';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
}
    

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
	//query sql
	$sql = "SELECT *
			FROM CENTRO
			WHERE (
				CODCENTRO LIKE '%".$this->codcentro."%' AND
				CODEDIFICIO LIKE '%".$this->codedificio."%' AND
				NOMBRECENTRO LIKE '%".$this->nombrecentro."%'AND
				DIRECCIONCENTRO LIKE '%".$this->direccioncentro."%' AND
				RESPONSABLECENTRO LIKE '%".$this->responsablecentro."%'
			)
	";
	//resultado obtenido del query
	if (!$resultado = $this->mysqli->query($sql))//error base de datos
		{
			return 'Error de gestor de base de datos';
		}
	return $resultado;
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$toret = array(); //array de errores

	$comprobar_codecentro = $this->comprobar_CODCENTRO(); //comprobacion de codcentro
	if(is_array($comprobar_codecentro)){ //si hubieron errores se insertan
		array_push($toret, $comprobar_codecentro);
	}

	if(!empty($toret)){ //si hubieron errores se devuelven
		return $toret;
	}

	//query sql
	$sql = "SELECT CODCENTRO
			FROM ESPACIO
			WHERE ESPACIO.CODCENTRO = '".$this->codcentro."'";
	//resultado query
	if (!$result = $this->mysqli->query($sql)) //si base de datos devuelve error
		{
			return 'Error de gestor de base de datos';
	}

	if ($result->num_rows != 0){  // existe el usuario
				return 'Borrado fallido: otra entidad tiene una referencia a esta';
	}


	//query sql
	$sql = "SELECT CODCENTRO
			FROM TITULACION
			WHERE TITULACION.CODCENTRO = '".$this->codcentro."'";

	if (!$result = $this->mysqli->query($sql)) //si base de datos devuelve error
		{
			return 'Error de gestor de base de datos';
	}

	if ($result->num_rows != 0){  // existe el usuario
				return 'Borrado fallido: otra entidad tiene una referencia a esta';
	}


	//query sql
   	$sql = "DELETE FROM 
   				CENTRO
   			WHERE(
   				CODCENTRO = '$this->codcentro'
   			)
   			";

   	if ($this->mysqli->query($sql)) //borrado ok
	{
		$resultado = 'Borrado realizado con éxito';
	}
	else //error base de datos
	{
		//resultado obtenido del query
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	$toret = array(); //array de errores

	$comprobar_codecentro = $this->comprobar_CODCENTRO(); //errores de codcentro
	if(is_array($comprobar_codecentro)){ //si hubieron errores se introducen
		array_push($toret, $comprobar_codecentro);
	}

	if(!empty($toret)){ //si hubieron errores se devuelven
		return $toret;
	}
	//query sql
    $sql = "SELECT *
			FROM CENTRO
			WHERE (
				(CODCENTRO = '$this->codcentro') 
			)";
			//resultado obtenido del query
	if (!$resultado = $this->mysqli->query($sql)) //error base de datos
	{
			return 'Error de gestor de base de datos';
	}else //devuelve tupla correcta
	{
		$tupla = $resultado->fetch_array();
	}
	return $tupla;
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{
	$errores = $this->comprobar_atributos();
	if(is_array($errores)){ //si hubieron errores se devuelven
		return $errores;
	}
	//query sql
	$sql = "UPDATE CENTRO
			SET 
				CODEDIFICIO = '$this->codedificio',
				NOMBRECENTRO = '$this->nombrecentro',
				DIRECCIONCENTRO = '$this->direccioncentro',
				RESPONSABLECENTRO = '$this->responsablecentro'
			WHERE (
				CODCENTRO = '$this->codcentro'
			)
			";

	if ($this->mysqli->query($sql)) //edit ok
	{	
		//resultado obtenido del query
		$resultado = 'Actualización realizada con éxito';
	}
	else //error base de datos
	{
		$resultado = 'Error de gestor de base de datos';
	}
	return $resultado;
}

}//fin de clase

?> 