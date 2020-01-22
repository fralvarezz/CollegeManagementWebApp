<?php

/*
Modelo del Edificio
Hecho por: xa8678
04/10/2019
*/

//-------------------------------------------------------
//Modelo del Edificio
class EDIFICIO_Model {
  //parametros de la clase
  var $codedificio; //almacena codcentro
  var $nombreedificio; //almacena nombreedificio
  var $direccionedificio; //almacena direccionedificio
  var $campusedificio;  //almacena campuesedificio
  var $mysqli; //variable util para conectar a BD y realizar querys

//Constructor de la clase
function __construct($codedificio,$nombreedificio,$direccionedificio,$campusedificio){
  $this->codedificio = $codedificio;
  $this->nombreedificio = $nombreedificio;
  $this->direccionedificio = $direccionedificio;
  $this->campusedificio = $campusedificio;
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
    $resultadoAtr = $this->comprobar_CODEDIFICIO(); //resultado de la comprobacion de codedificio
    if(gettype($resultadoAtr)=='array'){  //si hubieron errores se introducen en el array
      array_push($toret, $resultadoAtr);
    }
    $resultadoAtr = $this->comprobar_NOMBREEDIFICIO(); //resultado de la comprobacion de nombreedificio
    if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
      array_push($toret, $resultadoAtr);
    }
    $resultadoAtr = $this->comprobar_DIRECCIONEDIFICIO(); //resultado de la comprobacion de direccionedificio
    if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
      array_push($toret, $resultadoAtr);
    }
    $resultadoAtr = $this->comprobar_CAMPUSEDIFICIO(); //resultado de la comprobacion de campusedificio
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

  //funcion comprobar_NOMBREEDIFICIO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
  function comprobar_NOMBREEDIFICIO(){
    $toret = array(); //array de errores a devolver
    if(strlen($this->nombreedificio) == 0){ //si esta vacio
      array_push($toret, array("nombreatributo"=>"NOMBREEDIFICIO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
    }
    if(strlen($this->nombreedificio) >50){ //si su longitud es mayor que 50
      array_push($toret, array("nombreatributo"=>"NOMBREEDIFICIO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
    }
    if(strlen($this->nombreedificio) < 3){ //si su longitud es menor que 3
      array_push($toret, array("nombreatributo"=>"NOMBREEDIFICIO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
    }
    if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->nombreedificio)){
      array_push($toret, array("nombreatributo"=>"NOMBREEDIFICIO","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
    }
    if(empty($toret)){ //si el array de errores esta vacio devuelve true
      return true;
    }
    else{
      return $toret;
    } //si hay algun error, devuelve el array con los errores
  }

  //funcion comprobar_DIRECCIONEDIFICIO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
  function comprobar_DIRECCIONEDIFICIO(){
    $toret = array(); //array de errores a devolver
    if(strlen($this->direccionedificio) == 0){ //si esta vacio
      array_push($toret, array("nombreatributo"=>"DIRECCIONEDIFICIO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
    }
    if(strlen($this->direccionedificio) >150){ //si su longitud es mayor que 150
      array_push($toret, array("nombreatributo"=>"DIRECCIONEDIFICIO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
    }
    if(strlen($this->direccionedificio) < 3){ //si su longitud es menor que 3
      array_push($toret, array("nombreatributo"=>"DIRECCIONEDIFICIO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
    }
    if(!preg_match('/^[-\/ºªA-Za-z0-9]+( [-\/ºªA-Za-z0-9]+)*$/', $this->direccionedificio)){
      array_push($toret, array("nombreatributo"=>"DIRECCIONEDIFICIO","codigoincidencia"=>"00050","mensaje"=>"Solo están permitidas alfabéticos, números y los símbolos  “- / º ª”")); //introduce el error en el array
    }
    if(empty($toret)){ //si el array de errores esta vacio devuelve true
      return true;
    }
    else{
      return $toret;
    } //si hay algun error, devuelve el array con los errores
  }

  //funcion comprobar_CAMPUSEDIFICIO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
  function comprobar_CAMPUSEDIFICIO(){
    $toret = array(); //array de errores a devolver
    if(strlen($this->campusedificio) == 0){ //si esta vacio
      array_push($toret, array("nombreatributo"=>"CAMPUSEDIFICIO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
    }
    if(strlen($this->campusedificio) >10){ //si su longitud es mayor que 10
      array_push($toret, array("nombreatributo"=>"CAMPUSEDIFICIO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
    }
    if(strlen($this->campusedificio) < 3){ //si su longitud es menor que 3
      array_push($toret, array("nombreatributo"=>"CAMPUSEDIFICIO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
    }
    if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->campusedificio)){
      array_push($toret, array("nombreatributo"=>"CAMPUSEDIFICIO","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
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
    $sql = "select * from EDIFICIO where codedificio = '".$this->codedificio."'";
    //resultado de la query
    if (!$result = $this->mysqli->query($sql)) //error base de datos
    {
      return 'Error de gestor de base de datos';
    }

    if ($result->num_rows == 1){  // existe el usuario
        return 'Inserción fallida: el elemento ya existe';
      }
      //query sql
    $sql = "INSERT INTO EDIFICIO (
      CODEDIFICIO,
      NOMBREEDIFICIO,
      DIRECCIONEDIFICIO,
      CAMPUSEDIFICIO
      ) 
        VALUES (
          '".$this->codedificio."',
          '".$this->nombreedificio."',
          '".$this->direccionedificio."',
          '".$this->campusedificio."'
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
      FROM EDIFICIO
      WHERE (
        CODEDIFICIO LIKE '%".$this->codedificio."%' AND
        NOMBREEDIFICIO LIKE '%".$this->nombreedificio."%' AND
        DIRECCIONEDIFICIO LIKE '%".$this->direccionedificio."%'AND
        CAMPUSEDIFICIO LIKE '%".$this->campusedificio."%'
      )
  ";
  //resultado de la query
  if (!$resultado = $this->mysqli->query($sql)) //error base de datos
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

  $comprobar_codedificio = $this->comprobar_CODEDIFICIO(); //errores
  if(is_array($comprobar_codedificio)){ //si hubieron errores se introducen en el array
    array_push($toret, $comprobar_codedificio);
  }

  if(!empty($toret)){ //si hubieron errores se devuelven
    return $toret;
  }

  $sql = "SELECT CODEDIFICIO
      FROM CENTRO
      WHERE CENTRO.CODEDIFICIO = '".$this->codedificio."'";
  //resultado query
  if (!$result = $this->mysqli->query($sql)) //si base de datos devuelve error
    {
      return 'Error de gestor de base de datos';
  }

  if ($result->num_rows != 0){  // existe el usuario
        return 'Borrado fallido: otra entidad tiene una referencia a esta';
  }


  //query sql
  $sql = "SELECT CODEDIFICIO
      FROM ESPACIO
      WHERE ESPACIO.CODEDIFICIO = '".$this->codedificio."'";

  if (!$result = $this->mysqli->query($sql)) //si base de datos devuelve error
    {
      return 'Error de gestor de base de datos';
  }

  if ($result->num_rows != 0){  // existe el usuario
        return 'Borrado fallido: otra entidad tiene una referencia a esta';
  }

  //query sql
   $sql = " DELETE FROM 
          EDIFICIO
        WHERE(
          CODEDIFICIO = '$this->codedificio'
        )
        ";

  if ($this->mysqli->query($sql)) //delete ok
  {
    $resultado = 'Borrado realizado con éxito'; //resultado de la query
  }
  else //error base de datos
  {
    $resultado = 'Error de gestor de base de datos';
  }
  return $resultado;
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{$toret = array(); //array de errores

  $comprobar_codedificio = $this->comprobar_CODEDIFICIO(); //errores
  if(is_array($comprobar_codedificio)){ //si hubieron errores se introducen en el array
    array_push($toret, $comprobar_codedificio);
  }

  if(!empty($toret)){ //si hubieron errores se devuelven
    return $toret;
  }
  //query sql
    $sql = "SELECT *
      FROM EDIFICIO
      WHERE (
        (CODEDIFICIO = '$this->codedificio') 
      )";

      //resultado de la query
  if (!$resultado = $this->mysqli->query($sql)) //error base de datos
  {
      return 'Error de gestor de base de datos';
  }else //tupla ok
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
  $sql = "UPDATE EDIFICIO
      SET 
        NOMBREEDIFICIO = '$this->nombreedificio',
        DIRECCIONEDIFICIO = '$this->direccionedificio',
        CAMPUSEDIFICIO = '$this->campusedificio'
      WHERE (
        CODEDIFICIO = '$this->codedificio'
      )
      ";
  if ($this->mysqli->query($sql)) //edit ok
  {
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