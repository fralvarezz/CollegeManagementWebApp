 <?php
/*
Vista de ADD de ESPACIO
Hecho por: xa8678
04/10/2019
*/

//Vista de ADD de ESPACIO
	class ESPACIO_ADD{

//Constructor de la clase
		function __construct($codigosEdificio, $codigosCentro){
			$this->codigosEdificio = $codigosEdificio; //array de codigos de edificio que se encuentran en la base de datos
			$this->codigosCentro = $codigosCentro; //array de codigos de centro que se encuentran en la base de datos
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">ADD</div> <div class="trn">ESPACIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobarEspacio()">

				<label class="trn" for = 'CODESPACIO' >CODESPACIO</label> <input type = 'text' name = 'CODESPACIO' id = 'codespacio' placeholder = '' size = '10' value = '' onblur="comprobarVacio('codespacio'); comprobarTexto('codespacio',10)"  ><br>

				<label class="trn" for = 'CODEDIFICIO' >CODEDIFICIO</label>
				<select name='CODEDIFICIO' id='codedificio' onblur = "comprobarVacio('codedificio')">
					<?php
                    if(empty($this->codigosEdificio)){ //si no hay edificios se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }else {
                        foreach ($this->codigosEdificio as $coded) { //para cada codigo de espacio recibido creo una opcion con ese valor
                            ?>
                            <option value='<?php echo $coded; ?>'> <?php echo($coded); ?> </option>
                            <?php
                        }
                    }
					?>
				</select> <br>
				
				<label class="trn" for = 'CODCENTRO' >CODCENTRO</label>
				<select name='CODCENTRO' id='codcentro' onblur = "comprobarVacio('codcentro')">
					<?php
                    if(empty($this->codigosCentro)){ //si no hay centros se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }
                    else {
                        foreach($this->codigosCentro as $codcen){ //para cada codigo de centro recibido creo una opcion con ese valor
                        ?>
                            <option value = '<?php echo $codcen; ?>' > <?php echo ($codcen); ?> </option>
                        <?php
                        }
                    }
					?>
				</select> <br>

				<label class="trn" for = 'TIPO' >TIPO</label>
				<select name="TIPO" id='tipo' onblur = "comprobarVacio('tipo')">
					<option class="trn" value="despacho">Despacho</option>
					<option class="trn" value="laboratorio">Laboratorio</option>
					<option class="trn" value="pas">PAS</option>
				</select> <br>

				<label class="trn" for = 'SUPERFICIEESPACIO' >SUPERFICIEESPACIO</label> <input type = 'text' name = 'SUPERFICIEESPACIO' id = 'superficieespacio' placeholder = '' size = '4' value = '' onblur="comprobarVacio('superficieespacio'); comprobarEntero('superficieespacio',0,9999)" ><br>

				<label class="trn" for = 'NUMINVENTARIOESPACIO' >NUMINVENTARIOESPACIO</label> <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'numinventarioespacio' placeholder = '' size = '10' value = '' onblur="comprobarVacio('numinventarioespacio'); comprobarEntero('numinventarioespacio',0,999999999)" ><br>


			<input type='submit' name='action' value='ADD'>

			</form>


			<a href='../Controller/ESPACIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>
