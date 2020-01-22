<?php
/*
Vista de DELETE de PROF_TITULACION
Hecho por: xa8678
04/10/2019
*/

//Vista de DELETE de PROF_TITULACION
	class PROF_TITULACION_DELETE{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de un proftitulacion concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">DELETE</div> <div class="trn">PROF_TITULACION</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>

				<label class="trn" for='DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>

				<label class="trn" for='CODTITULACION'>CODTITULACION</label> <input type = 'text' name = 'CODTITULACION' id = 'codtitulacion' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODTITULACION'];?>'readonly><br>

				<label class="trn" for='ANHOACADEMICO'>ANHOACADEMICO</label> <input type = 'text' name = 'ANHOACADEMICO' id = 'anhoacademico' placeholder = '' size = '9' value = '<?php echo $this->tupla['ANHOACADEMICO'];?>' readonly><br>

				<input type='submit' name='action' value='DELETE'>

			</form>


			<a href='../Controller/PROF_TITULACION_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin

?>
