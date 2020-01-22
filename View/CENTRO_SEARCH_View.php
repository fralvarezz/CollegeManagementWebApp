<?php
/*
Vista de SEARCH de CENTRO
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de CENTRO
	class CENTRO_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">CENTRO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobarCentroSearch()">

				<label class="trn" for='CODCENTRO'>CODCENTRO</label>
				<input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codcentro', 10)"><br>

				<label class="trn" for='CODEDIFICIO'>CODEDIFICIO</label> <input type = 'text' name = 'CODEDIFICIO' id = 'codedificio' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codedificio',10)"><br>

				<label class="trn" for='NOMBRECENTRO'>NOMBRECENTRO</label> <input type = 'text' name = 'NOMBRECENTRO' id = 'nombrecentro' placeholder = '' size = '50' value = '' onblur="comprobarTexto('nombrecentro', 50); comprobarSoloLetras('nombrecentro')"><br>

				<label class="trn" for='DIRECCIONCENTRO'>DIRECCIONCENTRO</label> <input type = 'text' name = 'DIRECCIONCENTRO' id = 'direccioncentro' placeholder = '' size = '150' value = ''onblur="comprobarTexto('direccioncentro', 150)"><br>

				<label class="trn" for='RESPONSABLECENTRO'>RESPONSABLECENTRO</label> <input type = 'text' name = 'RESPONSABLECENTRO' id = 'responsablecentro' placeholder = '' size = '60' value = '' onblur="comprobarTexto('responsablecentro', 60); comprobarSoloLetras('responsablecentro')"><br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/CENTRO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
