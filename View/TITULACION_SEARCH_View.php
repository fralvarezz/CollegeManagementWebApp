<?php
/*
Vista de SEARCH de TITULACION
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de TITULACION
	class TITULACION_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">TITULACION</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobarTitulacionSearch()">

				<label class="trn" for = 'CODTITULACION'>CODTITULACION</label>  <input type = 'text' name = 'CODTITULACION' id = 'codtitulacion' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codtitulacion',10)"><br>

				<label class="trn" for = 'CODCENTRO'>CODCENTRO</label>  <input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codcentro',10)" ><br>

				<label class="trn" for = 'NOMBRETITULACION'>NOMBRETITULACION</label>  <input type = 'text' name = 'NOMBRETITULACION' id = 'nombretitulacion' placeholder = '' size = '50' value = '' onblur="comprobarTexto('nombretitulacion',50); comprobarSoloLetras('nombretitulacion')"><br>

				<label class="trn" for = 'RESPONSABLETITULACION'>RESPONSABLETITULACION</label> <input type = 'text' name = 'RESPONSABLETITULACION' id = 'responsabletitulacion' placeholder = '' size = '60' value = '' onblur="comprobarTexto('responsabletitulacion',60); comprobarSoloLetras('responsabletitulacion')"><br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/TITULACION_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
