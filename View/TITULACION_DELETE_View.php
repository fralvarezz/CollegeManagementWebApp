<?php
/*
Vista de DELETE de TITULACION
Hecho por: xa8678
04/10/2019
*/

//Vista de DELETE de TITULACION
	class TITULACION_DELETE{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de una titulacion concreta
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">DELETE</div> <div class="trn">TITULACION</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' >

				<label class="trn" for = 'CODTITULACION'>CODTITULACION</label>  <input type = 'text' name = 'CODTITULACION' id = 'codtitulacion' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODTITULACION']; ?>'  readonly><br>

				<label class="trn" for = 'CODCENTRO'>CODCENTRO</label> <input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODCENTRO']; ?>'  readonly ><br>

				<label class="trn" for = 'NOMBRETITULACION'>NOMBRETITULACION</label>  <input type = 'text' name = 'NOMBRETITULACION' id = 'nombretitulacion' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>' readonly><br>

				<label class="trn" for = 'RESPONSABLETITULACION'>RESPONSABLETITULACION</label> <input type = 'text' name = 'RESPONSABLETITULACION' id = 'responsabletitulacion' placeholder = '' size = '60' value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>'  readonly><br>

				<input type='submit' name='action' value='DELETE'>

			</form>


			<a href='../Controller/TITULACION_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
