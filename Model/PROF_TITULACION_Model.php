<?php

/*
Modelo de PROF_TITULACION
Hecho por: xa8678
04/10/2019
*/

//-------------------------------------------------------
//Modelo de PROF_TITULACION
class PROF_TITULACION_Model {
  //parametros de la clase
  var $dni; //almacena el dni
  var $codtitulacion; //almacena codtitulacion
  var $anhoacademico; //almacena anhoacademico
  var $mysqli; //variable util para conectar a BD y realizar querys

//Constructor de la clase
function __construct($dni,$codtitulacion,$anhoacademico){
  $this->dni = $dni;
  $this->codtitulacion = $codtitulacion;
  $this->anhoacademico = $anhoacademico;
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
        $resultadoAtr = $this->comprobar_DNI(); //resultado de la comprobacion de dni
        if(gettype($resultadoAtr)=='array'){  //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_CODTITULACION(); //resultado de la comprobacion de codtitulacion
        if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
            array_push($toret, $resultadoAtr);
        }
        $resultadoAtr = $this->comprobar_ANHOACADEMICO(); //resultado de la comprobacion de anhoacademico
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


//funcion comprobar_DNI
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_DNI(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->dni) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"DNI","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        //solo comprueba el FORMATO del DNI, no la letra
        if(!preg_match('/^[0-9]{8}[a-zA-Z]$/', $this->dni)){ //si el formato del dni es incorrecto
            array_push($toret, array("nombreatributo"=>"DNI","codigoincidencia"=>"00011","mensaje"=>"Dni no válido")); //introduce el error en el array
        }
        $letra = strtoupper(substr($this->dni, -1, 1)); //comprueba la letra del dni
        $numero = substr($this->dni, 0, 8); //comprueba el numero del dni

        $modulo = $numero % 23; //ejecuta el modulo 23 del numero del dni
        $letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE"; //array de letras validas
        $letra_correcta = substr($letras_validas, $modulo, 1); //comprueba la letra que deberia tener el dni

        if($letra_correcta!=$letra) { //si la letras no es la correcta se introduce el error
            array_push($toret, array("nombreatributo"=>"DNI","codigoincidencia"=>"00010","mensaje"=>"Formato dni erróneo")); //introduce el error en el array
        }

        if(empty($toret)){ //si el array de errores esta vacio devuelve true
            return true;
        }
        else{
            return $toret;
        } //si hay algun error, devuelve el array con los errores
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

//funcion comprobar_ANHOACADEMICO
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
    function comprobar_ANHOACADEMICO(){
        $toret = array(); //array de errores a devolver
        if(strlen($this->anhoacademico) == 0){ //si esta vacio
            array_push($toret, array("nombreatributo"=>"ANHOACADEMICO","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
        }
        if(!preg_match('/^[0-9]{4}-[0-9]{4}$/', $this->anhoacademico)){ //si no coincide con el patron
            array_push($toret, array("nombreatributo"=>"ANHOACADEMICO","codigoincidencia"=>"00110","mensaje"=>"Solo se permiten dddd-dddd donde d es un dígito")); //introduce el error en el array
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

    $sql = "select * from PROF_TITULACION where dni = '".$this->dni."' and codtitulacion = '".$this->codtitulacion."'";

    if (!$result = $this->mysqli->query($sql)) //error base de datos
    {
      return 'Error de gestor de base de datos';
    }

    if ($result->num_rows == 1){  // existe el usuario
        return 'Inserción fallida: el elemento ya existe';
      }

    $sql = "INSERT INTO PROF_TITULACION (
      DNI,
      CODTITULACION,
      ANHOACADEMICO
      ) 
        VALUES (
          '".$this->dni."',
          '".$this->codtitulacion."',
          '".$this->anhoacademico."'
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
      FROM PROF_TITULACION
      WHERE (
        DNI LIKE '%".$this->dni."%' AND
        CODTITULACION LIKE '%".$this->codtitulacion."%' AND
        ANHOACADEMICO LIKE '%".$this->anhoacademico."%'
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

    $comprobar_dni = $this->comprobar_DNI(); //errores
    if(is_array($comprobar_dni)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_dni);
    }
    $comprobar_codtit = $this->comprobar_CODTITULACION(); //errores
    if(is_array($comprobar_codtit)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_codtit);
    }

    if(!empty($toret)){ //si hubieron errores se devuelven
        return $toret;
    }

   $sql = " DELETE FROM 
          PROF_TITULACION
        WHERE(
          DNI = '$this->dni' AND
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

    $comprobar_dni = $this->comprobar_DNI(); //errores
    if(is_array($comprobar_dni)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_dni);
    }
    $comprobar_codtit = $this->comprobar_CODTITULACION(); //errores
    if(is_array($comprobar_codtit)){ //si hubieron errores se introducen en el array
        array_push($toret, $comprobar_codtit);
    }

    if(!empty($toret)){ //si hubieron errores se devuelven
        return $toret;
    }
    $sql = "SELECT *
      FROM PROF_TITULACION
      WHERE (
        DNI = '$this->dni' AND
        CODTITULACION = '$this->codtitulacion'
      )";

  if (!$resultado = $this->mysqli->query($sql)) //error base de datos
  {
      return 'Error de gestor de base de datos';
  }else //query ok
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

  $sql = "UPDATE PROF_TITULACION
      SET 
        DNI = '$this->dni',
        CODTITULACION = '$this->codtitulacion',
        ANHOACADEMICO = '$this->anhoacademico'
      WHERE (
        DNI = '$this->dni' AND
        CODTITULACION = '$this->codtitulacion'
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