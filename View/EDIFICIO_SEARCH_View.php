<?php
/*
Vista de SEARCH de EDIFICIO
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de EDIFICIO
	class EDIFICIO_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">EDIFICIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobarEdificioSearch()">

				<label class="trn" for = 'CODEDIFICIO'>CODEDIFICIO</label> <input type = 'text' name = 'CODEDIFICIO' id = 'codedificio' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codedificio',10)" ><br>

				<label class="trn" for = 'NOMBREEDIFICIO'>NOMBREEDIFICIO</label> <input type = 'text' name = 'NOMBREEDIFICIO' id = 'nombreedificio' placeholder = '' size = '50' value = '' onblur="comprobarTexto('nombreedificio',50)"><br>

				<label class="trn" for = 'DIRECCIONEDIFICIO'>DIRECCIONEDIFICIO</label> <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'direccionedificio' placeholder = '' size = '150' value = '' onblur="comprobarTexto('direccionedificio',150)"><br>

				<label class="trn" for = 'CAMPUSEDIFICIO'>CAMPUSEDIFICIO</label> <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'campusedificio' placeholder = '' size = '10' value = '' onblur="comprobarTexto('campusedificio',10)"><br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/EDIFICIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin

?>
