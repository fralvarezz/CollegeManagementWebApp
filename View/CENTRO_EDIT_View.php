<?php
/*
Vista de EDIT de CENTRO
Hecho por: xa8678
04/10/2019
*/
//Vista de EDIT de CENTRO
	class CENTRO_EDIT{

//Constructor de la clase
		function __construct($tupla,$codigosEdificio){
			$this->codigosEdificio = $codigosEdificio; //array de codigos de edificio que se encuentran en la base de datos
			$this->tupla = $tupla; //tupla con todos los valores de un centro concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">EDIT</div> <div class="trn">CENTRO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobarCentro()">

				<label class="trn" for='CODCENTRO'>CODCENTRO</label>
				<input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODCENTRO']; ?>' onblur="comprobarVacio('codcentro'); comprobarTexto('codcentro', 10)" readonly><br>

				<label class="trn" for='CODEDIFICIO'>CODEDIFICIO</label>
				<select name='CODEDIFICIO' id ='codedificio' onblur="comprobarVacio('codedificio')">
				<?php
				foreach($this->codigosEdificio as $coded){ //para cada codigo de edificio recibido creo una opcion con ese valor
				?> 	<option value = '<?php echo $coded;?>'
					<?php
					if($coded == $this->tupla['CODEDIFICIO']) //si el codigo de edificio recibido por el modelo es igual al que encuentro en el array de codigos, esa opcion queda seleccionada por defecto
					{
					?>
						selected = 'selected'
					<?php
					}
					?>
					> <?php echo ($coded); ?></option>

				<?php
				}
				?>
				</select> <br>

				<label class="trn" for='NOMBRECENTRO'>NOMBRECENTRO</label> <input type = 'text' name = 'NOMBRECENTRO' id = 'nombrecentro' placeholder = '' size = '50' value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>' onblur="comprobarVacio('nombrecentro'); comprobarTexto('nombrecentro', 50); comprobarSoloLetras('nombrecentro')" ><br>

				<label class="trn" for='DIRECCIONCENTRO'>DIRECCIONCENTRO</label> <input type = 'text' name = 'DIRECCIONCENTRO' id = 'direccioncentro' placeholder = '' size = '150' value = '<?php echo $this->tupla['DIRECCIONCENTRO']; ?>' onblur="comprobarVacio('direccioncentro'); comprobarTexto('direccioncentro', 150)" ><br>

				<label class="trn" for='RESPONSABLECENTRO'>RESPONSABLECENTRO</label> <input type = 'text' name = 'RESPONSABLECENTRO' id = 'responsablecentro' placeholder = '' size = '60' value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' onblur="comprobarVacio('responsablecentro'); comprobarTexto('responsablecentro', 60); comprobarSoloLetras('responsablecentro')" ><br>

					<input type='submit' name='action' value='EDIT'>

			</form>


			<a href='../Controller/CENTRO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
