<?php
/*
Vista de DELETE de CENTRO
Hecho por: xa8678
04/10/2019
*/
//Vista de DELETE de CENTRO

	class CENTRO_DELETE{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de un centro concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">DELETE</div> <div class="trn">CENTRO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post'>

				<label class="trn" for='CODCENTRO'>CODCENTRO</label> <input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>

				<label class="trn" for='CODEDIFICIO'>CODEDIFICIO</label> <input type = 'text' name = 'CODEDIFICIO' id = 'codedificio' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly ><br>

				<label class="trn" for='NOMBRECENTRO'>NOMBRECENTRO</label> <input type = 'text' name = 'NOMBRECENTRO' id = 'nombrecentro' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>' readonly><br>

				<label class="trn" for='DIRECCIONCENTRO'>DIRECCIONCENTRO</label> <input type = 'text' name = 'DIRECCIONCENTRO' id = 'direccioncentro' placeholder = '' size = '150' value = '<?php echo $this->tupla['DIRECCIONCENTRO']; ?>' readonly><br>

				<label class="trn" for='RESPONSABLECENTRO'>RESPONSABLECENTRO</label> <input type = 'text' name = 'RESPONSABLECENTRO' id = 'responsablecentro' placeholder = '' size = '60' value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' readonly><br>

				<input type='submit' name='action' value='DELETE'>

			</form>


			<a href='../Controller/CENTRO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
