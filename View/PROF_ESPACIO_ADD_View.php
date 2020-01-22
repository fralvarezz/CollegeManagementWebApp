<?php
/*
Vista de ADD de PROF_ESPACIO
Hecho por: xa8678
04/10/2019
*/

//Vista de ADD de PROF_ESPACIO
	class PROF_ESPACIO_ADD{

//Constructor de la clase
		function __construct($DNISProfesor, $codigosEspacio){
			$this->codigosEspacio = $codigosEspacio; //array de codigos de espacio que se encuentran en la base de datos
			$this->DNISProfesor = $DNISProfesor; //array de dnis de profesor que se encuentran en la base de datos
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">ADD</div> <div class="trn">PROF_ESPACIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobarProfEspacio()">

				<label class="trn" for = 'DNI'>DNI</label>
				<select name='DNI' id='dni' onblur="comprobarVacio('dni')">
					<?php
                    if(empty($this->DNISProfesor)){ //si no hay dnis se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }else {
					foreach($this->DNISProfesor as $dni){ //para cada dni recibido creo una opcion con ese valor
					?> 
						<option value = '<?php echo $dni; ?>' > <?php echo ($dni); ?> </option> 
					<?php
					}
                    }
					?>
				</select> <br>

				<label class="trn" for = 'CODESPACIO'>CODESPACIO</label>
				<select name='CODESPACIO' id='codespacio' onblur="comprobarVacio('codespacio')">
					<?php
                    if(empty($this->codigosEspacio)){ //si no hay espacios se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }else {
					foreach($this->codigosEspacio as $codes){ //para cada codigo de espacio recibido creo una opcion con ese valor
					?> 
						<option value = '<?php echo $codes; ?>' > <?php echo ($codes); ?> </option> 
					<?php
					}
                    }
					?>
				</select> <br>

				<input type='submit' name='action' value='ADD'>

			</form>


			<a href='../Controller/PROF_ESPACIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
