<?php
/*
Vista de DELETE de EDIFICIO
Hecho por: xa8678
04/10/2019
*/
//Vista de DELETE de EDIFICIO
	class EDIFICIO_DELETE{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de un edificio concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">DELETE</div> <div class="trn">EDIFICIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post'>

				<label class="trn" for = 'CODEDIFICIO'>CODEDIFICIO</label><input type = 'text' name = 'CODEDIFICIO' id = 'codedificio' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly ><br>

				<label class="trn" for = 'NOMBREEDIFICIO'>NOMBREEDIFICIO</label> <input type = 'text' name = 'NOMBREEDIFICIO' id = 'nombreedificio' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBREEDIFICIO']; ?>'readonly><br>

				<label class="trn" for = 'DIRECCIONEDIFICIO'>DIRECCIONEDIFICIO</label> <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'direccionedificio' placeholder = '' size = '150' value = '<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>' readonly><br>

				<label class="trn" for = 'CAMPUSEDIFICIO'>CAMPUSEDIFICIO</label> <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'campusedificio' placeholder = '' size = '10' value = '<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' readonly><br>

				<input type='submit' name='action' value='DELETE'>

			</form>

			<a href='../Controller/EDIFICIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
