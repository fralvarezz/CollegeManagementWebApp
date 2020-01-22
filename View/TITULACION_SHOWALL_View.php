<?php
/*
Vista de SHOWALL de TITULACION
Hecho por: xa8678
04/10/2019
*/

//Vista de SHOWALL de TITULACION
	class TITULACION_SHOWALL{

//Constructor de la clase
		function __construct($lista,$datos){
			$this->datos = $datos; //todos los datos de titulacion de ls bd
			$this->lista = $lista; //nombre de las columnas de titulacion de la bd
			$this->render();
		}

//Mostrar html por pantalla
		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
            <h1><div class="trn">SHOWALL</div> <div class="trn">TITULACION</div></h1>
			<br>
			<br>
			<a href='../Controller/TITULACION_Controller.php?action=ADD'><i class="fas fa-plus" style="color:green"></i></a>
			<a href='../Controller/TITULACION_Controller.php?action=SEARCH'><i class="fas fa-search"></i></a>

		<table>
			<tr>
<?php
		foreach ($this->lista as $titulo) { //para todos los nombre de columnas los imprimo
?>
            <th><div class="trn"><?php echo $titulo; ?></div></th>
<?php
		}
?>
			</tr>
<?php
		foreach($this->datos as $fila) //para todas las filas cojo las columnas
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) { //imprimo todos los valores de las columnas de esa fila
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?>
				<td>
					<a href='
						../Controller/TITULACION_Controller.php?action=EDIT&codtitulacion=
							<?php echo $fila['CODTITULACION']; ?>
							'> <i class="fas fa-edit"></i> </a>
				
					<a href='
						../Controller/TITULACION_Controller.php?action=DELETE&codtitulacion=
							<?php echo $fila['CODTITULACION']; ?>
							'> <i class="fas fa-trash-alt"></i> </a>
				
					<a href='
						../Controller/TITULACION_Controller.php?action=SHOWCURRENT&codtitulacion=
							<?php echo $fila['CODTITULACION']; ?>
							'> <i class="fas fa-eye"></i> </a>

					&nbsp;&nbsp;&nbsp;

					<a href='
						../Controller/PROF_TITULACION_Controller.php?action=SHOWALL&codtitulacion=
							<?php echo $fila['CODTITULACION']; ?>
							'> <i class="fas fa-chalkboard-teacher"></i>/<i class="fas fa-graduation-cap"></i> </a>
				</td>
			</tr>

<?php

		}
?>


		</table>
		<a href='../Controller/Index_Controller.php'><i class="fas fa-step-backward"></i></a>

<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin 

?>
