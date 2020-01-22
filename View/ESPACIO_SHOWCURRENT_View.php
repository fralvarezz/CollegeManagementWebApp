<?php
/*
Vista de SHOWCURRENT de ESPACIO
Hecho por: xa8678
04/10/2019
*/

//Vista de SHOWCURRENT de ESPACIO
	class ESPACIO_SHOWCURRENT{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de un edificio concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SHOWCURRENT</div> <div class="trn">ESPACIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post'>

				<label class="trn" for = 'CODESPACIO' >CODESPACIO</label> <input type = 'text' name = 'CODESPACIO' id = 'codespacio' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODESPACIO']; ?>' readonly ><br>

				<label class="trn" for = 'CODEDIFICIO' >CODEDIFICIO</label> <input type = 'text' name = 'CODEDIFICIO' id = 'codedificio' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly ><br>

				<label class="trn" for = 'CODCENTRO' >CODCENTRO</label><input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>

				<label class="trn" for = 'TIPO' >TIPO</label> <input type = 'text' name = 'TIPO' id = 'tipo' placeholder = 'Despacho, Laboratorio, PAS' size = '15' value = '<?php echo $this->tupla['TIPO']; ?>' readonly><br>

				<label class="trn" for = 'SUPERFICIEESPACIO' >SUPERFICIEESPACIO</label> <input type = 'text' name = 'SUPERFICIEESPACIO' id = 'superficieespacio' placeholder = '' size = '4' value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' readonly><br>

				<label class="trn" for = 'NUMINVENTARIOESPACIO' >NUMINVENTARIOESPACIO</label> <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'numinventarioespacio' placeholder = '' size = '10' value = '<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' readonly><br>
			</form>


			<a href='../Controller/ESPACIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
