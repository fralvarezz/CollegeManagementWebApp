<?php
/*
Vista de REGISTER
Hecho por: xa8678
*/

//Vista de REGISTER
	class Register{

//Constructor de la clase
		function __construct(){	
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
		<!--Formulario que recibe los atributos para el registro de un usuario, se envian por post-->
			<h1 class="trn">Registro</h1>
			<form name = 'Form' action='../Controller/Register_Controller.php' method='post' enctype='multipart/form-data' onsubmit="return comprobarRegistro()">
			
				 	<label class="trn" for = 'login'>login</label> <input type = 'text' name = 'login' id = 'login' placeholder = 'Login' size = '15' value = '' onblur="comprobarVacio('login'); comprobarTexto('login',15)" ><br>

					<label class="trn" for = 'password'>password</label> <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '' onblur="comprobarVacio('password'); comprobarTexto('password',15)" ><br>

					<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '' onblur="comprobarDNI('dni')" ><br>

					<label class="trn" for = 'nombre'>nombre</label> <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '' onblur="comprobarVacio('nombre'); comprobarTexto('nombre',30)" ><br>

					<label class="trn" for = 'apellidos'>apellidos</label> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '' onblur="comprobarVacio('apellidos'); comprobarTexto('apellidos',50)" ><br>

					<label class="trn" for = 'email'>email</label> <input type = 'text' name = 'email' id = 'email' placeholder = '' size = '60' value = '' onblur="comprobarVacio('email'); comprobarTexto('email',60); comprobarEmail('email')" ><br>

					<label class="trn" for = 'telefono'>telefono</label> <input type = 'text' name = 'telefono' id = 'telefono' placeholder = '' size = '9' value = '' onblur="comprobarTelf('telefono')" ><br>

					<label class="trn" for = 'Fecha'>Fecha</label>  <input type = 'date' name = 'FechaNacimiento' id = 'fechanacimiento' placeholder = '' size = '' value = '' onkeydown="return false" onblur="comprobarVacio('fechanacimiento') " ><br>

                    <label class="trn" for = 'fotopersonal'>fotopersonal</label> <input type = 'file' name = 'fotopersonal' id = 'fotopersonal' size = '40' value = '' onblur="comprobarVacio('fotopersonal')" ><br>

                    <label class="trn" for = 'sexo'>sexo</label> <input type="radio" class="trn" name="sexo" id="sexo" value="hombre" checked> Hombre
                    <input type="radio" class="trn" name="sexo" id="sexo" value="mujer"> Mujer<br>

					<input type='submit' name='action' value='REGISTRAR'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><i class="fas fa-step-backward"></i></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	