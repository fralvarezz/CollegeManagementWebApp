<?php
/*
Vista de SEARCH de PROF_ESPACIO
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de PROF_ESPACIO
	class PROF_ESPACIO_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">PROF_ESPACIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobarProfEspacioSearch()">

				<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '' onblur="comprobarTexto('dni',9)" ><br>

				<label class="trn" for = 'CODESPACIO'>CODESPACIO</label> <input type = 'text' name = 'CODESPACIO' id = 'codespacio' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codespacio',10)" ><br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/PROF_ESPACIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin

?>
