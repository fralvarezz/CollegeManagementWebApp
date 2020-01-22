<?php

/*
Modelo del Usuario
Hecho por: xa8678
04/10/2019
*/

//-------------------------------------------------------
//Modelo del Usuario
class USUARIOS_Model {
	//parametros de la clase
	var $login; //almacena el login
	var $password; //almacena la password
	var $dni; //almacena el dni
	var $nombre; //almacena el nombre
	var $apellidos; //almacena apellidos
	var $telefono; //almacena el telefono
	var $email; //almacena el email
	var $FechaNacimiento; //almacena la fechanacimiento
	var $fotopersonal; //almacena el enlace de la fotopersonal
	var $sexo; //almacena el sexo
	var $mysqli; //variable util para conectar a BD y realizar querys

//Constructor de la clase
function __construct($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo){
	$this->login = $login;
	$this->password = $password;
	$this->dni = $DNI;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->telefono = $telefono;
	$this->email = $email;
	$this->FechaNacimiento = $FechaNacimiento;
	$this->fotopersonal = $fotopersonal;
	$this->sexo = $sexo;
	$this->erroresdatos = $this->comprobar_atributos(); //array donde guardamos los errores encontrados en los datos

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//funcion comprobar_atributos
//comprueba que todos los atributos tengan las características necesarias
//devuelve true en caso de que todos los atributos pasen las validaciones
//devuelve un array con todos los errores que han sucedido si hubiera habido alguni
	function comprobar_atributos(){
		$toret = array(); //array de errores a devolver si los hubiera
		$resultadoAtr = $this->comprobar_login(); //resultado de la comprobacion de login
		if(gettype($resultadoAtr)=='array'){  //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_password(); //resultado de la comprobacion de password
		if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_DNI(); //resultado de la comprobacion de dni
		if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_nombre(); //resultado de la comprobacion de nombre
		if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_apellidos(); //resultado de la comprobacion de apellidos
		if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_telefono(); //resultado de la comprobacion de telefono
		if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_email(); //resultado de la comprobacion de email
		if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_FechaNacimiento(); //resultado de la comprobacion de FechaNacimiento
		if(gettype($resultadoAtr)=='array'){ //si hubieron errores se introducen en el array
			array_push($toret, $resultadoAtr);
		}
		$resultadoAtr = $this->comprobar_sexo(); //resultado de la comprobacion de sexo
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


//funcion comprobar_login
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_login(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->login) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"login","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->login) >15){ //si su longitud es mayor que 15
			array_push($toret, array("nombreatributo"=>"login","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->login) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"login","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[a-zA-Z]+$/', $this->login)){
			array_push($toret, array("nombreatributo"=>"login","codigoincidencia"=>"00090","mensaje"=>"Solo se permiten alfabéticos")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

//funcion comprobar_password
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_password(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->password) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"password","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->password) >15){ //si su longitud es mayor que 15
			array_push($toret, array("nombreatributo"=>"password","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->password) >15){ //si su longitud es mayor que 15
			array_push($toret, array("nombreatributo"=>"password","codigoincidencia"=>"00005","mensaje"=>"Password demasiado larga (no puede tener más de 15 caracteres)")); //introduce el error en el array
		}
		if(strlen($this->password) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"password","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[a-zA-Z]+$/', $this->password)){
			array_push($toret, array("nombreatributo"=>"password","codigoincidencia"=>"00090","mensaje"=>"Solo se permiten alfabéticos")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
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

	//funcion comprobar_nombre
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_nombre(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->nombre) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"nombre","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->nombre) >30){ //si su longitud es mayor que 30
			array_push($toret, array("nombreatributo"=>"nombre","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->nombre) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"nombre","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->nombre)){
			array_push($toret, array("nombreatributo"=>"nombre","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

	//funcion comprobar_apellidos
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_apellidos(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->apellidos) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"apellidos","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->apellidos) >50){ //si su longitud es mayor que 50
			array_push($toret, array("nombreatributo"=>"apellidos","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->apellidos) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"apellidos","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $this->apellidos)){
			array_push($toret, array("nombreatributo"=>"apellidos","codigoincidencia"=>"00030","mensaje"=>"Solo están permitidas alfabéticos (y espacios entre letras)")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

	//funcion comprobar_telefono
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_telefono(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->telefono) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"telefono","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->telefono) >11){ //si su longitud es mayor que 11
			array_push($toret, array("nombreatributo"=>"telefono","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->telefono) < 1){ //si su longitud es menor que 1
			array_push($toret, array("nombreatributo"=>"telefono","codigoincidencia"=>"00004","mensaje"=>"Valor de atributo numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^(34)?[0-9]{9}$/', $this->telefono)){
			array_push($toret, array("nombreatributo"=>"telefono","codigoincidencia"=>"00006","mensaje"=>"Teléfono no válido (34 y formato de teléfono de españa)")); //introduce el error en el array
		}
		if(!preg_match('/^[0-9]+$/', $this->telefono)){
			array_push($toret, array("nombreatributo"=>"telefono","codigoincidencia"=>"00070","mensaje"=>"Solo se permiten números")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

	//funcion comprobar_email
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_email(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->email) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"email","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(strlen($this->email) >60){ //si su longitud es mayor que 60
			array_push($toret, array("nombreatributo"=>"email","codigoincidencia"=>"00002","mensaje"=>"Valor de atributo demasiado largo")); //introduce el error en el array
		}
		if(strlen($this->email) < 3){ //si su longitud es menor que 3
			array_push($toret, array("nombreatributo"=>"email","codigoincidencia"=>"00003","mensaje"=>"Valor de atributo no numérico demasiado corto")); //introduce el error en el array
		}
		if(!preg_match('/^[a-zA-Z0-9_.-]+@[a-zA-Z]+.[a-zA-Z]+(.[a-zA-Z]+)$/', $this->email)){
			array_push($toret, array("nombreatributo"=>"email","codigoincidencia"=>"00120","mensaje"=>"Formato email erroneo")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

	//funcion comprobar_FechaNacimiento
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_FechaNacimiento(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->FechaNacimiento) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"FechaNacimiento","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(!preg_match('/^([0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|1[1-9]|2[1-9]|30|31))$/', $this->FechaNacimiento)){
			array_push($toret, array("nombreatributo"=>"FechaNacimiento","codigoincidencia"=>"00020","mensaje"=>"Formato fecha erróneo")); //introduce el error en el array
		}
		if(empty($toret)){ //si el array de errores esta vacio devuelve true
			return true;
		}
		else{
			return $toret;
		} //si hay algun error, devuelve el array con los errores
	}

	//funcion comprobar_sexo
//comprueba que el atributo codcentro tenga las características necesarias
//devuelve true en caso de que pase las comprobaciones
//devuelve un array de errores si no pasa la validacion
	function comprobar_sexo(){
		$toret = array(); //array de errores a devolver
		if(strlen($this->sexo) == 0){ //si esta vacio
			array_push($toret, array("nombreatributo"=>"sexo","codigoincidencia"=>"00001","mensaje"=>"Atributo vacío")); //introduce el error en el array
		}
		if(!preg_match('/^(hombre|mujer)$/', $this->sexo)){ //si el valor es distinto de despacho, laboratorio o pas
			array_push($toret, array("nombreatributo"=>"sexo","codigoincidencia"=>"00100","mensaje"=>"Solo se permiten los valores 'hombre','mujer'")); //introduce el error en el array
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

		$sql = "select * from USUARIOS where login = '".$this->login."'";

		if (!$result = $this->mysqli->query($sql)) //error base de datos
		{
			return 'Error de gestor de base de datos';
		}

		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
		}

		$sql = "INSERT INTO USUARIOS (
			login,
			password,
			DNI,
			nombre,
			apellidos,
			telefono,
			email,
			FechaNacimiento,
			fotopersonal,
			sexo) 
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->dni."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->telefono."',
					'".$this->email."',
					'".$this->FechaNacimiento."',
					'".$this->fotopersonal."',
					'".$this->sexo."'
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
			FROM USUARIOS
			WHERE (
				login LIKE '%".$this->login."%' AND
				password LIKE '%".$this->password."%' AND
				DNI LIKE '%".$this->dni."%'AND
				nombre LIKE '%".$this->nombre."%' AND
				apellidos LIKE '%".$this->apellidos."%' AND
				telefono LIKE '%".$this->telefono."%' AND
				email LIKE '%".$this->email."%' AND
				FechaNacimiento LIKE '%".$this->FechaNacimiento."%' AND
				fotopersonal LIKE '%".$this->fotopersonal."%' AND
				sexo LIKE '%".$this->sexo."%'
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
	$comprobar_login = $this->comprobar_login(); //resultado de comprobacion de login
	if(is_array($comprobar_login)){ //si hubieron errores se introducen en el array
		array_push($toret,$this->comprobar_login());
	}

	if(!empty($toret)){ //si hubieron errores se devuelven
		return $toret;
	}

   $sql = "	DELETE FROM 
   				USUARIOS
   			WHERE(
   				login = '$this->login'
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
	$comprobar_login = $this->comprobar_login(); //resultado de comprobacion de login
	if(is_array($comprobar_login)){ //si hubieron errores se introducen en el array
		array_push($toret,$this->comprobar_login());
	}

	if(!empty($toret)){ //si hubieron errores se devuelven
		return $toret;
	}
    $sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
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

	$sql = "UPDATE USUARIOS
			SET 
				password = '$this->password',
				DNI = '$this->dni',
				nombre = '$this->nombre',
				apellidos = '$this->apellidos',
				telefono = '$this->telefono',
				email = '$this->email',
				FechaNacimiento = '$this->FechaNacimiento',
				fotopersonal = '$this->fotopersonal',
				sexo = '$this->sexo'
			WHERE (
				login = '$this->login'
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

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){
	$toret = array(); //array a devolver
	$comprobar_login = $this->comprobar_login(); //comprobacion del login
	$comprobar_pass = $this->comprobar_password(); //comprobacion de pass
	if(is_array($comprobar_login)){ //si hubieron errores de login se insertan
		array_push($toret,$comprobar_login);
	}
	if(is_array($comprobar_pass)){ //si hubieron errores de pass se insertan
		array_push($toret,$comprobar_pass);
	}

	if(!empty($toret)){ //si hubieron errores se devuelven
		return $toret;
	}
	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql); //resultado de la query
	if ($resultado->num_rows == 0){ //no se encuentra login en la base de datos
		return 'El login no existe';
	}
	else{  //se encuentra el login en la base de datos
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){ //la password coincide con la obtenida de la base de datos
			return true;
		}
		else{ //la password no coincide
			return 'La password para este usuario no es correcta';
		}
	}
}//fin metodo login

// funcion Register: comprueba si el login del usuario a registrar existe ya en la base de datos
function Register(){
	$toret = array(); //array de errores
	$comprobar_login = $this->comprobar_login(); //resultado de comprobacion de login
	if(is_array($comprobar_login)){ //si hubieron errores se introducen en el array
		array_push($toret,$this->comprobar_login());
	}

	if(!empty($toret)){ //si hubieron errores se devuelven
		return $toret;
	}

		$sql = "select * from USUARIOS where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
		}
		else{ //no existe un usuario con ese login
	    		return true; 
		}
}

//funcion registrar: registra al usuario en la base de datos
function registrar(){
	$errores = $this->comprobar_atributos(); //errores encontrados
	if(is_array($errores)){ //si hubieron errores se devuelve
		return $errores;
	}
		$sql = "INSERT INTO USUARIOS (
			login,
			password,
			DNI,
			nombre,
			apellidos,
			telefono,
			email,
			FechaNacimiento,
			fotopersonal,
			sexo) 
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->dni."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->telefono."',
					'".$this->email."',
					'".$this->FechaNacimiento."',
					'".$this->fotopersonal."',
					'".$this->sexo."'
					)";
								
		if (!$this->mysqli->query($sql)) { //error base de datos
			return 'Error en la inserción';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 