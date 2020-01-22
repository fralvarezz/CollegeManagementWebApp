<?php
/*
Vista de SHOWCURRENT de USUARIOS
Hecho por: xa8678
04/10/2019
*/

//Vista de SHOWCURRENT de USUARIOS
	class USUARIOS_SHOWCURRENT{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de profesor concreto
			$this->render();
		}
//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">SHOWCURRENT</div> <div class="trn">USUARIOS</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post'>

				<label class="trn" for = 'login'>login</label> <input type = 'text' name = 'login' id = 'login' placeholder = 'Login' size = '15' value = '<?php echo $this->tupla['login']; ?>'  readonly><br>

				<label class="trn" for = 'password'>password</label> <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '<?php echo $this->tupla['password']; ?>'  readonly ><br>

				<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'dni' id = 'DNI' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>'  readonly><br>

				<label class="trn" for = 'nombre'>nombre</label>  <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->tupla['nombre']; ?>'  readonly><br>

				<label class="trn" for = 'apellidos'>apellidos</label> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>'  readonly><br>

				<label class="trn" for = 'email'>email</label> <input type = 'text' name = 'email' id = 'email' placeholder = '' size = '40' value = '<?php echo $this->tupla['email']; ?>'  readonly><br>

				<label class="trn" for = 'telefono'>telefono</label> <input type = 'text' name = 'telefono' id = 'telefono' placeholder = '' size = '9' value = '<?php echo $this->tupla['telefono']; ?>'  readonly><br>

				<label class="trn" for = 'Fecha'>Fecha</label>  <input type = 'date' name = 'FechaNacimiento' id = 'fechanacimiento' placeholder = '' size = '' value = '<?php echo $this->tupla['FechaNacimiento']; ?>'  readonly><br>

				<label class="trn" for = 'fotopersonal'>fotopersonal</label>  <?php echo "<img src='".$this->tupla['fotopersonal']."' width='20%'>";?> <br>

				<label class="trn" for = 'sexo'>sexo</label>   <input type = 'text' name = 'sexo' id = 'sexo' placeholder = 'Hombre/mujer' 	size = '6' value = '<?php echo $this->tupla['sexo']; ?>' readonly><br>

			</form>


			<a href='../Controller/USUARIOS_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>
