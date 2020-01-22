<?php
/*
Vista de la pagina de inicio de un usuario loggeado
Hecho por: xa8678
04/10/2019
*/

//Vista de la pagina de inicio de un usuario loggeado
class Index {
//Constructor de la clase
	function __construct(){
		$this->render();
	}

//Mostrar html por pantalla
	function render(){
	
		include '../View/Header.php';
?>
		<H1 class="trn">Portal de gestion de Espacios Universitario</H1>
		<br>
		<div class="intro">
		<img src="../View/img/Uvigo1.jpg" alt="Campus de Vigo">
		<img src="../View/img/CampusOurense.jpg" alt="Campus de Ourense">
		</div>
		<br>
		Esta aplicacion web esta dedicada a la asignación de espacios a los distintos profesores que trabajan en una universidad. Para utilizar la aplicacion, añade las entidades necesarias y finalmente asigna espacios a los distintos profesores.
		<br>
		
<?php
		include '../View/Footer.php';
	}

}

?>