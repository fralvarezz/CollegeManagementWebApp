<?php
/*
Vista de EDIT de PROF_ESPACIO
Hecho por: xa8678
04/10/2019
*/

//Vista de EDIT de PROF_ESPACIO
	class PROF_ESPACIO_EDIT{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de un profespacio concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">EDIT</div> <div class="trn">PROF_ESPACIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobarProfEspacio()">

				<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>

				<label class="trn" for = 'CODESPACIO'>CODESPACIO</label> <input type = 'text' name = 'CODESPACIO' id = 'codespacio' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODESPACIO']; ?>' readonly ><br>


				<input type='submit' name='action' value='EDIT'>

			</form>


			<a href='../Controller/PROF_ESPACIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin

?>
