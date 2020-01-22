<?php
/*
Vista de SHOWCURRENT de PROFESOR
Hecho por: xa8678
04/10/2019
*/

//Vista de SHOWCURRENT de PROFESOR
	class PROFESOR_SHOWCURRENT{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de profesor concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">ADD</div> <div class="trn">PROFESOR</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post'>

				<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>' onblur="esNoVacio('dni')" readonly><br>

				<label class="trn" for = 'NOMBREPROFESOR'>NOMBREPROFESOR</label> <input type = 'text' name = 'NOMBREPROFESOR' id = 'nombreprofesor' placeholder = '' size = '15' value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly ><br>

				<label class="trn" for = 'APELLIDOSPROFESOR'>APELLIDOSPROFESOR</label> <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'apellidosprofesor' placeholder = '' size = '30' value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly><br>

				<label class="trn" for = 'AREAPROFESOR'>AREAPROFESOR</label> <input type = 'text' name = 'AREAPROFESOR' id = 'areaprofesor' placeholder = '' size = '60' value = '<?php echo $this->tupla['AREAPROFESOR']; ?>' readonly><br>

				<label class="trn" for = 'DEPARTAMENTOPROFESOR'>DEPARTAMENTOPROFESOR</label> <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'departamentoprofesor' placeholder = '' size = '60' value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' readonly><br>
			</form>


			<a href='../Controller/PROFESOR_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>
