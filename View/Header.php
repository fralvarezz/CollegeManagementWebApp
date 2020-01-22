<?php
/*
Header de la aplicación
Hecho por: xa8678
04/10/2019
*/
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) { //si no hay idioma seleccionado, el idioma es español
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
<html>
<head>
	<title>
		ET3
	</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../View/css/forms.css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/3c01fc1072.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../View/js/scripts.js"></script>
	 
	<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/modal.css" />

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../View/js/jquery.translate.js"></script>
    <script src="../View/js/diccionario.js"></script>

	
</head>
<body>


<header>
		<h1 class="trn">ET3
		</h1>

    <div id="banderas">
        <a class="btn btn-default lang_selector trn" href="#" role="button" data-value="en">
            <img src="../View/Icons/united-states.jpg" alt="Ingles">
        </a>
        <a class="btn btn-default lang_selector trn" href="#" role="button" data-value="es">
            <img src="../View/Icons/spain.jpg" alt="Español">
        </a>
        <a class="btn btn-default lang_selector trn" href="#" role="button" data-value="gal">
            <img src="../View/Icons/galicia.png" alt="Gallego">
        </a>
    </div>

    <!--<a class="btn btn-default lang_selector trn" href="#" role="button" data-value="en">
        INGLES
    </a>
    <a class="btn btn-default lang_selector trn" href="#" role="button" data-value="es">
        ESPAÑOL
    </a>
    <a class="btn btn-default lang_selector trn" href="#" role="button" data-value="gal">
        GALLEGO
    </a>
    -->

<?php
	
	if (IsAuthenticated()){ //si esta autenticado muestra el login por pantalla
?>
<class="trn">

		<div class="trn">Usuario</div>: <?php echo $_SESSION['login'] . '<br>';
?>
</>
	<div class="desconectar" width: 50%; align="right">
		<a href='../Functions/Desconectar.php'><i class="fas fa-sign-out-alt"></i>
		</a>
	</div>
<?php
	
	}
	else{ //si no, muestra que no esta autenticado y pone un enlace para el registro
	    ?>
        <div class="trn">Usuario no autenticado</div>

        <a href='../Controller/Register_Controller.php'><i class="fas fa-user-plus" style="color: white"></i></a>
<?php
	}	
?>


<div id="error" style="display:none">
    <div id="contenido-interno">
        <div id="aviso">
            <i class="fas fa-exclamation-triangle fa-5x" style="color: red"></i>
        </div>
        <div id="mensajeError" class="trn"></div> <div id="numero"></div>
        <a id="cerrar" href="#" onclick="cerrarError();">
            <i class="fas fa-times fa-lg" style="color: black"></i>
        </a>
    </div>
</div>

<?php
	//session_start();
	if (IsAuthenticated()){ //si esta autenticado muestra el menu lateral
		include '../View/users_menuSuperior.php';
	}
?>
</header>


<article>


