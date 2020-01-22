<?php
/*
Vista de ADD de PROFESOR
Hecho por: xa8678
04/10/2019
*/

//Vista de ADD de PROFESOR
	class PROFESOR_ADD{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">ADD</div> <div class="trn">PROFESOR</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobarProfesor()">

				<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '' onblur="comprobarDNI('dni')"><br>

				<label class="trn" for = 'NOMBREPROFESOR'>NOMBREPROFESOR</label> <input type = 'text' name = 'NOMBREPROFESOR' id = 'nombreprofesor' placeholder = '' size = '15' value = '' onblur="comprobarVacio('nombreprofesor'); comprobarTexto('nombreprofesor',15); comprobarSoloLetras('nombreprofesor')" ><br>

				<label class="trn" for = 'APELLIDOSPROFESOR'>APELLIDOSPROFESOR</label> <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'apellidosprofesor' placeholder = '' size = '30' value = '' onblur="comprobarVacio('apellidosprofesor'); comprobarTexto('apellidosprofesor',30); comprobarSoloLetras('apellidosprofesor')"><br>

				<label class="trn" for = 'AREAPROFESOR'>AREAPROFESOR</label> <input type = 'text' name = 'AREAPROFESOR' id = 'areaprofesor' placeholder = '' size = '60' value = '' onblur="comprobarVacio('areaprofesor'); comprobarTexto('areaprofesor',60)"><br>

				<label class="trn" for = 'DEPARTAMENTOPROFESOR'>DEPARTAMENTOPROFESOR</label> <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'departamentoprofesor' placeholder = '' size = '60' value = '' onblur="comprobarVacio('departamentoprofesor'); comprobarTexto('departamentoprofesor',60)"><br>

				<input type='submit' name='action' value='ADD'>

			</form>

			<a href='../Controller/PROFESOR_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin

?>
