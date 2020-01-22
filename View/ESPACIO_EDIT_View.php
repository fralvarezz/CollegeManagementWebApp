<?php
/*
Vista de EDIT de ESPACIO
Hecho por: xa8678
04/10/2019
*/

//Vista de EDIT de ESPACIO
	class ESPACIO_EDIT{

//Constructor de la clase
		function __construct($tupla,$codigosEdificio, $codigosCentro){
			$this->tupla = $tupla; //tupla con todos los valores de un espacio concreto
			$this->codigosEdificio = $codigosEdificio; //array de codigos de edificio que se encuentran en la base de datos
			$this->codigosCentro = $codigosCentro; //array de codigos de centro que se encuentran en la base de datos
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">EDIT</div> <div class="trn">ESPACIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobarEspacio()">

				<label class="trn" for = 'CODESPACIO' >CODESPACIO</label><input type = 'text' name = 'CODESPACIO' id = 'codespacio' placeholder = '' size = '10' value = '<?php echo $this->tupla['CODESPACIO']; ?>' onblur="comprobarVacio('codespacio'); comprobarTexto('codespacio',10)" readonly ><br>

				<label class="trn" for = 'CODEDIFICIO' >CODEDIFICIO</label>
				<select name='CODEDIFICIO' id='codedificio' onblur = "comprobarVacio('codedificio')">
				<?php 
				foreach($this->codigosEdificio as $coded){ //para cada codigo de espacio recibido creo una opcion con ese valor
				?> 	<option value = '<?php echo $coded;?>'
					<?php
					if($coded == $this->tupla['CODEDIFICIO']) //si el codigo de espacio recibido por el modelo es igual al que encuentro en el array de codigos, esa opcion queda seleccionada por defecto
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
				
				<label class="trn" for = 'CODCENTRO' >CODCENTRO</label>
				<select name='CODCENTRO' id='codcentro' onblur = "comprobarVacio('codcentro')">
				<?php 
				foreach($this->codigosCentro as $codcen){ //para cada codigo de centro recibido creo una opcion con ese valor
				?> 	<option value = '<?php echo $codcen;?>'
					<?php
					if($codcen == $this->tupla['CODCENTRO']) //si el codigo de centro recibido por el modelo es igual al que encuentro en el array de codigos, esa opcion queda seleccionada por defecto
					{
					?> 
						selected = 'selected' 
					<?php 
					} 
					?>
					> <?php echo ($codcen); ?></option>
					 
				<?php
				}
				?>
				</select> <br>

				<label class="trn" for = 'TIPO' >TIPO</label>
				<select name="TIPO" id='tipo' onblur = "comprobarVacio('tipo')">
					<option class="trn" value="despacho"
					<?php
					if('DESPACHO' == $this->tupla['TIPO']) //si tipo coincide con despacho queda marcada por defecto
					{
					?> 
						selected = 'selected' 
					<?php 
					} 
					?> >Despacho</option>

					<option class="trn" value="laboratorio"
					<?php
					if('LABORATORIO' == $this->tupla['TIPO']) //si tipo coincide con laboratorio queda marcada por defecto
					{
					?> 
						selected = 'selected' 
					<?php 
					} 
					?> >Laboratorio</option>

					<option class="trn" value="PAS"
					<?php
					if('PAS' == $this->tupla['TIPO']) //si tipo coincide con PAS queda marcada por defecto
					{
					?> 
						selected = 'selected' 
					<?php 
					} 
					?> >PAS</option>
				</select> <br>

				<label class="trn" for = 'SUPERFICIEESPACIO' >SUPERFICIEESPACIO</label> <input type = 'text' name = 'SUPERFICIEESPACIO' id = 'superficieespacio' placeholder = 'Solo numeros' size = '4' value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' onblur="comprobarVacio('superficieespacio'); comprobarEntero('superficieespacio',0,9999)"><br>

				<label class="trn" for = 'NUMINVENTARIOESPACIO' >NUMINVENTARIOESPACIO</label> <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'numinventarioespacio' placeholder = 'Solo numeros' size = '10' value = '<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' onblur="comprobarVacio('numinventarioespacio'); comprobarEntero('numinventarioespacio',0,999999999)"><br>

					<input type='submit' name='action' value='EDIT'>

			</form>


			<a href='../Controller/ESPACIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin

?>
