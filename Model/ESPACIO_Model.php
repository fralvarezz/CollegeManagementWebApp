<?php

/*
Modelo del Espacio
Hecho por: xa8678
04/10/2019
*/

//-------------------------------------------------------
//Modelo del Espacio
class ESPACIO_Model {
  //parametros de la clase
  var $codespacio; //almacena el codespacio
  var $codedificio; //almacena el codedificio
  var $codcentro; //almacena el codcentro
  var $tipo; //almacena el tipo
  var $mysqli; //variable util para conectar a BD y realizar querys

//Constructor de la clase
function __construct($codespacio,$codedificio,$codcentro,$tipo,$superficieespacio,$numinventarioespacio){
  $this->codespacio = $codespacio;
  $this->codedificio = $codedificio;
  $this->codcentro = $codcentro;
  $this->tipo = $tipo;
  $this->superficieespacio = $superficieespacio;
  $this->numinventarioespacio = $numinventarioespacio;
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
        $resultadoAtr = $this->comprobar_CODESPACIO(); //resultado de la comprobacion de codespacio
        if(gettype($resultadoAtr)=='array'){  //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_CODEDIFICIO(); //resultado de la comprobacion de codedificio
        if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_CODCENTRO(); //resultado de la comprobacion de codcentro
        if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_TIPO(); //resultado de la comprobacion de tipo
        if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_SUPERFICIEESPACIO(); //resultado de la comprobacion de superficieespacio
        if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_NUMINVENTARIOESPACIO(); //resultado de la comprobacion de numinventarioespacio
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

//funcion comprobar_CODESPACIO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_CODESPACIO(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->codespacio) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"CODESPACIO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(strlen($this->codespacio) >10){ //si su longitud es mayor que 10
            array_push($toret, array("nombreatributo"=>"CODESPACIO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
        }
        if(strlen($this->codespacio) < 3){ //si su longitud es menor que 3
            array_push($toret, array("nombreatributo"=>"CODESPACIO","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
        }
        if(!preg_match('/^[-A-Za-z0-9]+$/', $this->codespacio)){ //si no coincide con el patron
            array_push($toret, array("nombreatributo"=>"CODESPACIO","codigoincidencia"=>"00040","mensaje"=>"Solo están permitidas alfabéticos, números y el “-”")); //introduce el error en el array
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

//funcion comprobar_TIPO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_TIPO(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->tipo) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"TIPO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(!preg_match('/^(despacho|laboratorio|pas)$/', $this->tipo)){ //si el valor es distinto de despacho, laboratorio o pas
            array_push($toret, array("nombreatributo"=>"TIPO","codigoincidencia"=>"00080","mensaje"=>"Solo se permiten los valores 'DESPACHO','LABORATORIO','PAS'")); //introduce el error en el array
        }
        if(empty($toret)){ //si el array de errores esta vacio devuelve true
            return true;
        }
        else{
            return $toret;
        } //si hay algun error, devuelve el array con los errores
    }

    //funcion comprobar_SUPERFICIEESPACIO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_SUPERFICIEESPACIO(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->superficieespacio) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"SUPERFICIEESPACIO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(strlen($this->superficieespacio) >4){ //si su longitud es mayor que 4
            array_push($toret, array("nombreatributo"=>"SUPERFICIEESPACIO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
        }
        if(strlen($this->superficieespacio) < 1){ //si su longitud es menor que 3
            array_push($toret, array("nombreatributo"=>"SUPERFICIEESPACIO","codigoincidencia"=>"00004","mensaje"=>"Valor de atributo numérico demasiado corto")); //introduce el error en el array
        }
        if(!preg_match('/^[0-9]+$/', $this->superficieespacio)){
            array_push($toret, array("nombreatributo"=>"SUPERFICIEESPACIO","codigoincidencia"=>"00070","mensaje"=>"Solo se permiten números")); //introduce el error en el array
        }
        if(empty($toret)){ //si el array de errores esta vacio devuelve true
            return true;
        }
        else{
            return $toret;
        } //si hay algun error, devuelve el array con los errores
    }

    //funcion comprobar_NUMINVENTARIOESPACIO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_NUMINVENTARIOESPACIO(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->numinventarioespacio) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"NUMINVENTARIOESPACIO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(strlen($this->numinventarioespacio) >8){ //si su longitud es mayor que
            array_push($toret, array("nombreatributo"=>"NUMINVENTARIOESPACIO","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
        }
        if(strlen($this->numinventarioespacio) < 1){ //si su longitud es menor que 3
            array_push($toret, array("nombreatributo"=>"NUMINVENTARIOESPACIO","codigoincidencia"=>"00004","mensaje"=>"Valor de atributo numérico demasiado corto")); //introduce el error en el array
        }
        if(!preg_match('/^[0-9]+$/', $this->numinventarioespacio)){
            array_push($toret, array("nombreatributo"=>"NUMINVENTARIOESPACIO","codigoincidencia"=>"00070","mensaje"=>"Solo se permiten números")); //introduce el error en el array
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

    $sql = "select * from ESPACIO where codespacio = '".$this->codespacio."'";

    if (!$result = $this->mysqli->query($sql)) //error base de datos
    {
      return 'Error de gestor de base de datos';
    }

    if ($result->num_rows == 1){  // existe el usuario
        return 'Inserción fallida: el elemento ya existe';
      }

    $sql = "INSERT INTO ESPACIO (
      CODESPACIO,
      CODEDIFICIO,
      CODCENTRO,
      TIPO,
      SUPERFICIEESPACIO,
      NUMINVENTARIOESPACIO
      ) 
        VALUES (
          '".$this->codespacio."',
          '".$this->codedificio."',
          '".$this->codcentro."',
          '".$this->tipo."',
          '".$this->superficieespacio."',
          '".$this->numinventarioespacio."'
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

  $sql = "SELECT *
      FROM ESPACIO
      WHERE (
        CODESPACIO LIKE '%".$this->codespacio."%' AND
        CODEDIFICIO LIKE '%".$this->codedificio."%' AND
        CODCENTRO LIKE '%".$this->codcentro."%'AND
        TIPO LIKE '%".$this->tipo."%' AND
        SUPERFICIEESPACIO LIKE '%".$this->superficieespacio."%'AND
        NUMINVENTARIOESPACIO LIKE '%".$this->numinventarioespacio."%'
      )
  ";
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

    $comprobar_codespacio = $this->comprobar_CODESPACIO(); //errores
    if(is_array($comprobar_codespacio)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_codespacio);
    }

    if(!empty($toret)){ //si hubieron errores se devuelven
        return $toret;
    }

    $sql = "SELECT CODESPACIO
      FROM PROF_ESPACIO
      WHERE PROF_ESPACIO.CODESPACIO = '".$this->codespacio."'";
      //resultado query
    if (!$result = $this->mysqli->query($sql)) //si base de datos devuelve error
    {
      return 'Error de gestor de base de datos';
    }

    if ($result->num_rows != 0){  // existe el usuario
      return 'Borrado fallido: otra entidad tiene una referencia a esta';
    }

    $sql = " DELETE FROM 
    ESPACIO
    WHERE(
    CODESPACIO = '$this->codespacio'
    )
    ";

  if ($this->mysqli->query($sql)) //delete ok
  {
    $resultado = 'Borrado realizado con éxito';
  }
  else //error base de datos
  {
    $resultado = 'Error de gestor de base de datos';
  }
  return $resultado;
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
    $toret = array(); //array de errores

    $comprobar_codespacio = $this->comprobar_CODESPACIO(); //errores
    if(is_array($comprobar_codespacio)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_codespacio);
    }

    if(!empty($toret)){ //si hubieron errores se devuelven
        return $toret;
    }
    $sql = "SELECT *
      FROM ESPACIO
      WHERE (
        (CODESPACIO = '$this->codespacio') 
      )";

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

  $sql = "UPDATE ESPACIO
      SET 
        CODEDIFICIO = '$this->codedificio',
        CODCENTRO = '$this->codcentro',
        TIPO = '$this->tipo',
        SUPERFICIEESPACIO = '$this->superficieespacio',
        NUMINVENTARIOESPACIO = '$this->numinventarioespacio'
      WHERE (
        CODESPACIO = '$this->codespacio'
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