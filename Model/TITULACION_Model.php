<?php

/*
Modelo de la Titulacion
Hecho por: xa8678
04/10/2019
*/

//-------------------------------------------------------

class TITULACION_Model {
  //parametros de la clase
  var $codtitulacion; //almacena codtitulacion
  var $codcentro; //almacena codcentro
  var $nombretitulacion; //almacena nombretitulacion
  var $responsabletitulacion; //almacena responsabletitulacion
  var $mysqli; //variable util para conectar a BD y realizar querys

//Constructor de la clase
function __construct($codtitulacion,$codcentro,$nombretitulacion,$responsabletitulacion){
  $this->codtitulacion = $codtitulacion;
  $this->codcentro = $codcentro;
  $this->nombretitulacion = $nombretitulacion;
  $this->responsabletitulacion = $responsabletitulacion;
  $this->erroresdatos = $this->comprobar_atributos();

  include_once '../Model/Access_DB.php';
  $this->mysqli = ConnectDB();
}

//funcion comprobar_atributos
//comprueba que todos los atributos tengan las características necesarias
//devuelve true en caso de que todos los atributos pasen las validaciones
//devuelve un array con todos los errores que han sucedido si hubiera habido alguni
    function comprobar_atributos(){
        $toret = array(); //array de errores a devolver si los hubiera
        $resultadoAtr = $this->comprobar_CODTITULACION(); //resultado de la comprobacion de codtitulacion
        if(gettype($resultadoAtr)=='array'){  //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_CODCENTRO(); //resultado de la comprobacion de codcentro
        if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_NOMBRETITULACION(); //resultado de la comprobacion de nombretitulacion
        if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_RESPONSABLETITULACION(); //resultado de la comprobacion de responsabletitulacion
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


//funcion comprobar_CODTITULACION
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_CODTITULACION(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->codtitulacion) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"CODTITULACION","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(strlen($this->codtitulacion) >10){ //si su longitud es mayor que 10
            array_push($toret, array("nombreatributo"=>"CODTITULACION","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
        }
        if(strlen($this->codtitulacion) < 3){ //si su longitud es menor que 3
            array_push($toret, array("nombreatributo"=>"CODTITULACION","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
        }
        if(!preg_match('/^[A-Za-z0-9]+$/', $this->codtitulacion)){ //si no coincide con el patron
            array_push($toret, array("nombreatributo"=>"CODTITULACION","codigoincidencia"=>"00060","mensaje"=>"Solo se permiten alfabéticos y números")); //introduce el error en el array
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

//funcion comprobar_NOMBRETITULACION
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_NOMBRETITULACION(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->nombretitulacion) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"NOMBRETITULACION","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(strlen($this->nombretitulacion) >50){ //si su longitud es mayor que 50
            array_push($toret, array("nombreatributo"=>"NOMBRETITULACION","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
        }
        if(strlen($this->nombretitulacion) < 3){ //si su longitud es menor que 3
            array_push($toret, array("nombreatributo"=>"NOMBRETITULACION","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
        }
        if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->nombretitulacion)){
            array_push($toret, array("nombreatributo"=>"NOMBRETITULACION","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
        }
        if(empty($toret)){ //si el array de errores esta vacio devuelve true
            return true;
        }
        else{
            return $toret;
        } //si hay algun error, devuelve el array con los errores
    }

//funcion comprobar_RESPONSABLETITULACION
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_RESPONSABLETITULACION(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->responsabletitulacion) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"RESPONSABLETITULACION","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(strlen($this->responsabletitulacion) >60){ //si su longitud es mayor que 60
            array_push($toret, array("nombreatributo"=>"RESPONSABLETITULACION","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
        }
        if(strlen($this->responsabletitulacion) < 3){ //si su longitud es menor que 3
            array_push($toret, array("nombreatributo"=>"RESPONSABLETITULACION","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
        }
        if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->responsabletitulacion)){
            array_push($toret, array("nombreatributo"=>"RESPONSABLETITULACION","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
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

    $sql = "select * from TITULACION where codtitulacion = '".$this->codtitulacion."'";

    if (!$result = $this->mysqli->query($sql)) //error base de datos
    {
      return 'Error de gestor de base de datos';
    }

    if ($result->num_rows == 1){  // existe el usuario
        return 'Inserción fallida: el elemento ya existe';
      }

    $sql = "INSERT INTO TITULACION (
      CODTITULACION,
      CODCENTRO,
      NOMBRETITULACION,
      RESPONSABLETITULACION
      ) 
        VALUES (
          '".$this->codtitulacion."',
          '".$this->codcentro."',
          '".$this->nombretitulacion."',
          '".$this->responsabletitulacion."'
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
      FROM TITULACION
      WHERE (
        CODTITULACION LIKE '%".$this->codtitulacion."%' AND
        CODCENTRO LIKE '%".$this->codcentro."%' AND
        NOMBRETITULACION LIKE '%".$this->nombretitulacion."%'AND
        RESPONSABLETITULACION LIKE '%".$this->responsabletitulacion."%'
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

    $comprobar_codtit = $this->comprobar_CODTITULACION(); //errores
    if(is_array($comprobar_codtit)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_codtit);
    }

    if(!empty($toret)){ //si hubieron errores se devuelven
        return $toret;
    }

  //query sql
  $sql = "SELECT CODTITULACION
      FROM PROF_TITULACION
      WHERE PROF_TITULACION.CODTITULACION = '".$this->codtitulacion."'";
  //resultado query
  if (!$result = $this->mysqli->query($sql)) //si base de datos devuelve error
    {
      return 'Error de gestor de base de datos';
    }

  if ($result->num_rows != 0){  // existe la entidad
        return 'Borrado fallido: otra entidad tiene una referencia a esta';
  }


   $sql = " DELETE FROM 
          TITULACION
        WHERE(
          CODTITULACION = '$this->codtitulacion'
        )
        ";

    if ($this->mysqli->query($sql)) //query ok
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

    $comprobar_codtit = $this->comprobar_CODTITULACION(); //errores
    if(is_array($comprobar_codtit)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_codtit);
    }

    if(!empty($toret)){ //si hubieron errores se devuelven
        return $toret;
    }
    $sql = "SELECT *
      FROM TITULACION
      WHERE (
        (CODTITULACION = '$this->codtitulacion') 
      )";

  if (!$resultado = $this->mysqli->query($sql)) //query ok
  {
      return 'Error de gestor de base de datos';
  }else //error base de datos
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

  $sql = "UPDATE TITULACION
      SET 
        CODCENTRO = '$this->codcentro',
        NOMBRETITULACION = '$this->nombretitulacion',
        RESPONSABLETITULACION = '$this->responsabletitulacion'
      WHERE (
        CODTITULACION = '$this->codtitulacion'
      )
      ";
  if ($this->mysqli->query($sql)) //query ok
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