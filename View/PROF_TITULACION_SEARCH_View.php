<?php
/*
Vista de SEARCH de PROF_TITULACION
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de PROF_TITULACION
	class PROF_TITULACION_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">PROF_TITULACION</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobarProfTitulacionSearch()">

				<label class="trn" for='DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '' onsubmit="comprobarTexto('dni',9)"><br>

				<label class="trn" for='CODTITULACION'>CODTITULACION</label> <input type = 'text' name = 'CODTITULACION' id = 'codtitulacion' placeholder = '' size = '10' value ='' onsubmit="comprobarTexto('codtitulacion',10)"><br>

				<label class="trn" for='ANHOACADEMICO'>ANHOACADEMICO</label> <input type = 'text' name = 'ANHOACADEMICO' id = 'anhoacademico' placeholder = '' size = '9' value = '' onsubmit="comprobarTexto('anhoacademico',9)"><br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/PROF_TITULACION_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin

?>
