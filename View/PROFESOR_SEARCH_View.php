<?php
/*
Vista de SEARCH de PROFESOR
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de PROFESOR
	class PROFESOR_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">PROFESOR</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobarProfesorSearch()">

				<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '' onblur="comprobarTexto('dni',9)"><br>

				<label class="trn" for = 'NOMBREPROFESOR'>NOMBREPROFESOR</label> <input type = 'text' name = 'NOMBREPROFESOR' id = 'nombreprofesor' placeholder = '' size = '15' value = '' onblur="comprobarTexto('nombreprofesor',15); comprobarSoloLetras('nombreprofesor')" ><br>

				<label class="trn" for = 'APELLIDOSPROFESOR'>APELLIDOSPROFESOR</label> <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'apellidosprofesor' placeholder = '' size = '30' value = '' onblur="comprobarTexto('apellidosprofesor',30); comprobarSoloLetras('apellidosprofesor')"><br>

				<label class="trn" for = 'AREAPROFESOR'>AREAPROFESOR</label> <input type = 'text' name = 'AREAPROFESOR' id = 'areaprofesor' placeholder = '' size = '60' value = '' onblur="comprobarTexto('areaprofesor',60)"><br>

				<label class="trn" for = 'DEPARTAMENTOPROFESOR'>DEPARTAMENTOPROFESOR</label> <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'departamentoprofesor' placeholder = '' size = '60' value = '' onblur="comprobarTexto('departamentoprofesor',60)"><br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/PROFESOR_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
