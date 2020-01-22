<?php
/*
Vista del login
Hecho por: xa8678
*/

//Vista del login
	class Login{
//Constructor de la clase
		function __construct(){	
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; 
?>
			<!--Formulario de login, se envia por post-->
			<h1 class="trn">login</h1>
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobarLogin();">
		
                    <div class="trn">login</div>: <input type = 'text' name = 'login' placeholder = '' id='login' size = '15' value = '' onblur="comprobarVacio('login'); comprobarTexto('login',15)"  ><br>
				 	
                    <div class="trn">password</div>: <input type = 'password' name = 'password' placeholder = '' id='password' size = '20' value = '' onblur="comprobarVacio('password'); comprobarTexto('password',20)"  ><br>

					<input type='submit' name='action' value='Login'>

			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
