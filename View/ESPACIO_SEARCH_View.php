<?php
/*
Vista de SEARCH de ESPACIO
Hecho por: xa8678
04/10/2019
*/

//Vista de SEARCH de ESPACIO
	class ESPACIO_SEARCH{

//Constructor de la clase
		function __construct(){
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SEARCH</div> <div class="trn">ESPACIO</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobarEspacioSearch()">

				<label class="trn" for = 'CODESPACIO' >CODESPACIO</label><input type = 'text' name = 'CODESPACIO' id = 'codespacio' placeholder = '' size = '10' value = ''  onblur="comprobarTexto('codespacio',10)"><br>

				<label class="trn" for = 'CODEDIFICIO' >CODEDIFICIO</label> <input type = 'text' name = 'CODEDIFICIO' id = 'codedificio' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codedificio',10)" ><br>
				
				<label class="trn" for = 'CODCENTRO' >CODCENTRO</label><input type = 'text' name = 'CODCENTRO' id = 'codcentro' placeholder = '' size = '10' value = '' onblur="comprobarTexto('codcentro',10)"><br>

				<label class="trn" for = 'TIPO' >TIPO</label>
				<select name="TIPO">
					<option value=""><?php echo $strings['']?></option>
					<option value="despacho"><?php echo $strings['Despacho']?></option>
					<option value="laboratorio"><?php echo $strings['Laboratorio']?></option>
					<option value="pas"><?php echo $strings['PAS']?></option>
				</select> <br>

				<label class="trn" for = 'SUPERFICIEESPACIO' >SUPERFICIEESPACIO</label><input type = 'text' name = 'SUPERFICIEESPACIO' id = 'superficieespacio' placeholder = '' size = '4' value = '' onblur="comprobarEntero('superficieespacio',0,9999)"><br>

				<label class="trn" for = 'NUMINVENTARIOESPACIO' >NUMINVENTARIOESPACIO</label> <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'numinventarioespacio' placeholder = '' size = '10' value = '' onblur="comprobarEntero('numinventarioespacio',0,999999999)"><br>

				<input type='submit' name='action' value='SEARCH'>

			</form>


			<a href='../Controller/ESPACIO_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
