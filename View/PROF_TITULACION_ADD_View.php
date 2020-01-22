<?php
/*
Vista de ADD de PROF_TITULACION
Hecho por: xa8678
04/10/2019
*/

//Vista de ADD de PROF_TITULACION
	class PROF_TITULACION_ADD{

//Constructor de la clase
		function __construct($DNISProfesor, $codigosTitulacion){
			$this->codigosTitulacion = $codigosTitulacion; //array de codigos de titulacion que se encuentran en la base de datos
			$this->DNISProfesor = $DNISProfesor; //array de dnis de profesor que se encuentran en la base de datos
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">ADD</div> <div class="trn">PROF_TITULACION</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobarProfTitulacion()">

				<label class="trn" for='DNI'>DNI</label>
				<select name='DNI' id = 'dni' onblur="comprobarVacio('dni')">
					<?php
                    if(empty($this->DNISProfesor)){ //si no hay dnis se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }else {
                        foreach ($this->DNISProfesor as $dni) { //para cada dni recibido creo una opcion con ese valor
                            ?>
                            <option value='<?php echo $dni; ?>'> <?php echo($dni); ?> </option>
                            <?php
                        }
                    }
					?>
				</select> <br>

				<label class="trn" for='CODTITULACION'>CODTITULACION</label>
				<select name='CODTITULACION' id = 'codtitulacion' onblur="comprobarVacio('codtitulacion')">
					<?php
                    if(empty($this->codigosTitulacion)){ //si no hay codigos se muestra una opcion vacia
                        ?>
                        <option value=''> </option>
                        <?php
                    }else {
                        foreach ($this->codigosTitulacion as $codtit) { //para cada codigo de edificio recibido creo una opcion con ese valor
                            ?>
                            <option value='<?php echo $codtit; ?>'> <?php echo($codtit); ?> </option>
                            <?php
                        }
                    }
					?>
				</select> <br>

				<label class="trn" for='ANHOACADEMICO'>ANHOACADEMICO</label> <input type = 'text' name = 'ANHOACADEMICO' id = 'anhoacademico' placeholder = 'yyyy-yyyy' size = '9' value = '' onblur = "comprobarVacio('anhoacademico'); comprobarExpresionRegular('anhoacademico',/^\d{4}\/\d{4}$/,9)" ><br>

				<input type='submit' name='action' value='ADD'>

			</form>


			<a href='../Controller/PROF_TITULACION_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
