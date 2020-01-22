<?php
/*
Vista de SEARCH de USUARIOS
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de USUARIOS
	class USUARIOS_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">USUARIOS</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobarRegistroSearch()">

				<label class="trn" for = 'login'>login</label> <input type = 'text' name = 'login' id = 'login' placeholder = 'Login' size = '15' value = '' onblur="comprobarTexto('login',15)"><br>

				<label class="trn" for = 'password'>password</label> <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = ''  onblur="comprobarTexto('password',20)" ><br>

				<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = ''  onblur="comprobarTexto('dni',9)"><br>

				<label class="trn" for = 'nombre'>nombre</label>  <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '' onblur="comprobarTexto('nombre',30); comprobarSoloLetras('nombre')"><br>

				<label class="trn" for = 'apellidos'>apellidos</label> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '' onblur="comprobarTexto('apellidos',50); comprobarSoloLetras('apellidos')"><br>

				<label class="trn" for = 'email'>email</label> <input type = 'text' name = 'email' id = 'email' placeholder = '' size = '40' value = ''  onblur="comprobarTexto('email',40)"><br>

				<label class="trn" for = 'telefono'>telefono</label> <input type = 'text' name = 'telefono' id = 'telefono' placeholder = '' size = '11' value = '' onblur="comprobarExpresionRegular('telefono',/^[0-9]*$/,11)"><br>

				<label class="trn" for = 'Fecha'>Fecha</label>  <input type = 'date' name = 'FechaNacimiento' id = 'fechanacimiento' placeholder = '' size = '' value = '' onkeydown="return false"><br>

				<label class="trn" for = 'fotopersonal'>fotopersonal</label>  <input type = 'text' name = 'fotopersonal' id = 'fotopersonal' size = '40' value = '' onblur="comprobarTexto('fotopersonal',40)"><br>

				<label class="trn" for = 'sexo'>sexo</label>
				<select name="sexo">
					<option value=""></option>
					<option value="hombre">Hombre</option>
					<option value="mujer">Mujer</option>
				</select> <br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/USUARIOS_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
