<?php

/*
Vista de MESSAGE
Hecho por: xa8678
04/10/2019
*/

class MESSAGE{

	private $array; //cadena o array a mostrar
	private $volver; //direccion a retornar

    //constructor de la clase
	function __construct($array, $volver){
		$this->array = $array;
		$this->volver = $volver; 
		$this->render();
	}
    //mostrar html por pantalla
	function render(){

		include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<p>
		<h3 class="trn">
<?php
        if(is_array($this->array)) {//si es un array de errores
            //para cada uno de los atributos
            foreach ($this->array as $atributo){
                //para cada uno de los errores se muestra el error
                foreach ($atributo as $error){
                    echo $error["nombreatributo"] .": ". $error["codigoincidencia"] ."-". $error["mensaje"];
                    echo "<br>\n";
                }
            }
        }
        else{
            echo $this->array;
        }
?>
		</h3>
		</p>
		<br>
		<br>
		<br>

		<a href= <?php echo $this->volver?>><i class="fas fa-step-backward"></i></a>
		<?php
        include '../View/Footer.php';
	} //fin metodo render

}
