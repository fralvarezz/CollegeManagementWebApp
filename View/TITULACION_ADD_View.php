 <?php
/*
Vista de ADD de TITULACION
Hecho por: xa8678
04/10/2019
*/

//Vista de ADD de TITULACION
	class TITULACION_ADD{
//Constructor de la clase
		function __construct($codigosCentro){
			$this->codigosCentro = $codigosCentro; //array de codigos de centro que se encuentran en la base de datos
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">ADD</div> <div class="trn">TITULACION</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobarTitulacion()">

				<label class="trn" for = 'CODTITULACION'>CODTITULACION</label> <input type = 'text' name = 'CODTITULACION' id = 'codtitulacion' placeholder = '' size = '10' value = '' onblur="comprobarVacio('codtitulacion'); comprobarTexto('codtitulacion',10)"><br>

				<label class="trn" for = 'CODCENTRO'>CODCENTRO</label>
				<select name='CODCENTRO' id = 'codcentro' onblur="comprobarVacio('codcentro')">
					<?php
                    if(empty($this->codigosCentro)){ //si no hay edificios se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }else {
                        foreach ($this->codigosCentro as $codcen) { //para cada codigo de espacio recibido creo una opcion con ese valor
                            ?>
                            <option value='<?php echo $codcen; ?>'> <?php echo($codcen); ?> </option>
                            <?php
                        }
                    }
					?>
				</select> <br>

				<label class="trn" for = 'NOMBRETITULACION'>NOMBRETITULACION</label> <input type = 'text' name = 'NOMBRETITULACION' id = 'nombretitulacion' placeholder = '' size = '50' value = '' onblur="comprobarVacio('nombretitulacion'); comprobarTexto('nombretitulacion',50); comprobarSoloLetras('nombretitulacion')"><br>

				<label class="trn" for = 'RESPONSABLETITULACION'>RESPONSABLETITULACION</label> <input type = 'text' name = 'RESPONSABLETITULACION' id = 'responsabletitulacion' placeholder = '' size = '60' value = '' onblur="comprobarVacio('responsabletitulacion'); comprobarTexto('responsabletitulacion',60); comprobarSoloLetras('responsabletitulacion')"><br>


			<input type='submit' name='action' value='ADD'>

			</form>

			<a href='../Controller/TITULACION_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
