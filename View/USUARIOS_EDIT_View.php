<?php
/*
Vista de EDIT de USUARIOS
Hecho por: xa8678
04/10/2019
*/

//Vista de EDIT de USUARIOS 
	class USUARIOS_EDIT{

//Constructor de la clase
		function __construct($tupla){
			$this->tupla = $tupla; //tupla con todos los valores de usuario concreto
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
            <h1><div class="trn">EDIT</div> <div class="trn">USUARIOS</div></h1>
			<!--Form para recibir los parametros que se envian por POST-->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' enctype='multipart/form-data' onsubmit="return comprobarRegistro()">

					<label class="trn" for = 'login'>login</label> <input type = 'text' name = 'login' id = 'login' placeholder = 'Login' size = '15' value = '<?php echo $this->tupla['login']; ?>' onblur="comprobarVacio('login'); comprobarTexto('login',15)" readonly><br>

					<label class="trn" for = 'password'>password</label> <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '<?php echo $this->tupla['password']; ?>' onblur="comprobarVacio('password'); comprobarTexto('password',15)" ><br>

					<label class="trn" for = 'DNI'>DNI</label> <input type = 'text' name = 'DNI' id = 'dni' placeholder = '' size = '9' value = '<?php echo $this->tupla['DNI']; ?>' onblur="comprobarDNI('dni')" ><br>

					<label class="trn" for = 'nombre'>nombre</label>  <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->tupla['nombre']; ?>' onblur="comprobarVacio('nombre'); comprobarTexto('nombre',30); comprobarSoloLetras('nombre')" ><br>

					<label class="trn" for = 'apellidos'>apellidos</label> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>' onblur="comprobarVacio('apellidos'); comprobarTexto('apellidos',50); comprobarSoloLetras('apellidos')" ><br>

					<label class="trn" for = 'email'>email</label> <input type = 'text' name = 'email' id = 'email' placeholder = '' size = '60' value = '<?php echo $this->tupla['email']; ?>' onblur="comprobarVacio('email'); comprobarTexto('email',60); comprobarEmail('email')" ><br>

					<label class="trn" for = 'telefono'>telefono</label> <input type = 'text' name = 'telefono' id = 'telefono' placeholder = '' size = '9' value = '<?php echo $this->tupla['telefono']; ?>' onblur="comprobarTelf('telefono')" ><br>

					<label class="trn" for = 'Fecha'>Fecha</label> <input type = 'date' name = 'FechaNacimiento' id = 'fechanacimiento' placeholder = '' size = '' value = '<?php echo $this->tupla['FechaNacimiento']; ?>' onblur="comprobarVacio('fechanacimiento')" onkeydown="return false"><br>

					<label class="trn" for = 'fotopersonal'>fotopersonal</label>  <?php echo "<img src='".$this->tupla['fotopersonal']."' width='20%'>";?>
                    <input type = 'file' name = 'fotopersonalcambio' id = 'fotopersonalcambio' size = '40' value = '' ><br>


                    <label class="trn" for = 'sexo'>sexo</label>  <select name="sexo">
														<option class="trn" value="hombre" <?php
																				if("hombre" == $this->tupla['sexo']) //si el sexo es hombre se vuelve por defecto
																				{
																				?> 
																					selected = 'selected' 
																				<?php 
																				} 
																				?>
														>
													Hombre</option>
														
														<option class="trn" value="mujer" <?php
																				if("mujer" == $this->tupla['sexo']) //si el sexo es mujer se vuelve por defecto
																				{
																				?> 
																					selected = 'selected' 
																				<?php 
																				} 
																				?>
														>
													Mujer</option>
													</select> <br>

					<input type='submit' name='action' value='EDIT'>

			</form>


			<a href='../Controller/USUARIOS_Controller.php'><i class="fas fa-step-backward"></i></a>

		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>
