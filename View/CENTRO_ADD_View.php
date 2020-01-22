<?php
/*
Vista de ADD de CENTRO
Hecho por: xa8678
04/10/2019
*/
//Vista de ADD de CENTRO
	class CENTRO_ADD{

//Constructor de la clase
		function __construct($codigosEdificio){
			$this->codigosEdificio = $codigosEdificio; //array de codigos de edificio que se encuentran en la base de datos
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<!--Form para recibir los parametros que se envian por POST-->
            <h1><div class="trn">ADD</div> <div class="trn">CENTRO</div></h1>
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobarCentro()">

				<label class="trn" for='CODCENTRO'>CODCENTRO</label> <input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '' onblur="comprobarVacio('codcentro'); comprobarTexto('codcentro', 10)" ><br>

				<label class="trn" for='CODEDIFICIO'>CODEDIFICIO</label>
				<select name='CODEDIFICIO' id ='codedificio' onblur="comprobarVacio('codedificio')">
					<?php
                    if(empty($this->codigosEdificio)){ //si no hay edificios se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }else {
                        foreach ($this->codigosEdificio as $coded) { //para cada codigo de edificio recibido creo una opcion con ese valor
                            ?>
                            <option value='<?php echo $coded; ?>'> <?php echo($coded); ?> </option>
                            <?php
                        }
                    }
					    ?>
				</select> <br>

				<label class="trn" for='NOMBRECENTRO'>NOMBRECENTRO</label> <input type = 'text' name = 'NOMBRECENTRO' id = 'nombrecentro' placeholder = '' size = '50' value = '' onblur="comprobarVacio('nombrecentro'); comprobarTexto('nombrecentro', 50); comprobarSoloLetras('nombrecentro')" ><br>

				<label class="trn" for='DIRECCIONCENTRO'>DIRECCIONCENTRO</label> <input type = 'text' name = 'DIRECCIONCENTRO' id = 'direccioncentro' placeholder = '' size = '150' value = '' onblur="comprobarVacio('direccioncentro'); comprobarTexto('direccioncentro', 150)" ><br>

				<label class="trn" for='RESPONSABLECENTRO'>RESPONSABLECENTRO</label> <input type = 'text' name = 'RESPONSABLECENTRO' id = 'responsablecentro' placeholder = '' size = '60' value = '' onblur="comprobarVacio('responsablecentro'); comprobarTexto('responsablecentro', 60); comprobarSoloLetras('responsablecentro')" ><br>

				<input type='submit' name='action' value='ADD'>

			</form>


			<a href='../Controller/CENTRO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
