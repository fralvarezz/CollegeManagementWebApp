<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de unidad de la entidad ESPACIO
// Incluye ESPACIO_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';
include '../Model/ESPACIO_Model.php';

//prepara el test
$espacio = new ESPACIO_Model("espaciop","espaciop","nombrep","pas",'100','100'); //espacio a insertar
$espacio->ADD();
$ESPACIO_array_test = array(); //array principal del test

//funcion ESPACIO_ADD_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function ESPACIO_ADD_test(){
    global $ESPACIO_array_test; //array principal del test

    $ESPACIO_ADD_test = array(); //array donde meteremos los errores que vamos a encontrar

    $ESPACIO_ADD_test['entidad'] = 'ESPACIO';
    $ESPACIO_ADD_test['metodo'] = 'ADD';
    $ESPACIO_ADD_test['error'] = 'Inserción fallida: el elemento ya existe';
    $ESPACIO_ADD_test['error_esperado']  = 'Inserción fallida: el elemento ya existe';
    $ESPACIO_ADD_test['error_obtenido'] = '';
    $ESPACIO_ADD_test['resultado'] = '';

    $espacio = new ESPACIO_Model("espaciop","espaciop","nombrep","pas",'100','100'); //espacio a insertar
    $ESPACIO_ADD_test['error_obtenido']=$espacio->ADD();

    if($ESPACIO_ADD_test['error_obtenido'] == $ESPACIO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $ESPACIO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $ESPACIO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($ESPACIO_array_test, $ESPACIO_ADD_test); //se introduce el array de errores en el global


    $ESPACIO_ADD_test['entidad'] = 'ESPACIO';
    $ESPACIO_ADD_test['metodo'] = 'ADD';
    $ESPACIO_ADD_test['error'] = 'Inserción realizada con éxito';
    $ESPACIO_ADD_test['error_esperado']  = 'Inserción realizada con éxito';
    $ESPACIO_ADD_test['error_obtenido'] = '';
    $ESPACIO_ADD_test['resultado'] = '';

    $espacio = new ESPACIO_Model("cenfal","edifal","nomfal","pas",'100','100'); //espacio a insertar
    $ESPACIO_ADD_test['error_obtenido']=$espacio->ADD();

    if($ESPACIO_ADD_test['error_obtenido'] == $ESPACIO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $ESPACIO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $ESPACIO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($ESPACIO_array_test, $ESPACIO_ADD_test); //se insertar el array de errores en el global

    //borramos la insercion
    $espacio->DELETE();
}

//funcion ESPACIO_EDIT_test
//comprueba que se pueda hacer un EDIT
function ESPACIO_EDIT_test(){
    global $ESPACIO_array_test; //array principal del test

    $ESPACIO_EDIT_test = array(); //array donde meteremos los errores que vamos a encontrar

    $ESPACIO_EDIT_test['entidad'] = 'ESPACIO';
    $ESPACIO_EDIT_test['metodo'] = 'EDIT';
    $ESPACIO_EDIT_test['error'] = 'Actualización realizada con éxito';
    $ESPACIO_EDIT_test['error_esperado']  = 'Actualización realizada con éxito';
    $ESPACIO_EDIT_test['error_obtenido'] = '';
    $ESPACIO_EDIT_test['resultado'] = '';

    $espacio = new ESPACIO_Model("espaciop","edicam","cencam","pas",'100','100'); //espacio a insertar
    $ESPACIO_EDIT_test['error_obtenido']=$espacio->EDIT();

    if($ESPACIO_EDIT_test['error_obtenido'] == $ESPACIO_EDIT_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $ESPACIO_EDIT_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $ESPACIO_EDIT_test['resultado'] = 'FALSE';
    }
    array_push($ESPACIO_array_test, $ESPACIO_EDIT_test); //se introduce el array de errores en el global
}

//funcion ESPACIO_DELETE_test
//comprueba que se pueda hacer un DELETE
function ESPACIO_DELETE_test(){
    global $ESPACIO_array_test; //array principal del test

    $espacio = new ESPACIO_Model("espaciod","espaciod","nombred","pas",'100','100'); //espacio a insertar
    $espacio->ADD();

    $ESPACIO_DELETE_test = array(); //array donde meteremos los errores que vamos a encontrar

    $ESPACIO_DELETE_test['entidad'] = 'ESPACIO';
    $ESPACIO_DELETE_test['metodo'] = 'DELETE';
    $ESPACIO_DELETE_test['error'] = 'Borrado realizado con éxito';
    $ESPACIO_DELETE_test['error_esperado']  = 'Borrado realizado con éxito';
    $ESPACIO_DELETE_test['error_obtenido'] = '';
    $ESPACIO_DELETE_test['resultado'] = '';

    $ESPACIO_DELETE_test['error_obtenido']=$espacio->DELETE();

    if($ESPACIO_DELETE_test['error_obtenido'] == $ESPACIO_DELETE_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $ESPACIO_DELETE_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $ESPACIO_DELETE_test['resultado'] = 'FALSE';
    }
    array_push($ESPACIO_array_test, $ESPACIO_DELETE_test); //se introduce el array de errores en el global
}

//funcion ESPACIO_SEARCH_test
//comprueba que se pueda hacer un SEARCH
function ESPACIO_SEARCH_test(){
    global $ESPACIO_array_test; //array principal del test

    $ESPACIO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $ESPACIO_SEARCH_test['entidad'] = 'ESPACIO';
    $ESPACIO_SEARCH_test['metodo'] = 'SEARCH';
    $ESPACIO_SEARCH_test['error'] = 'recordset';
    $ESPACIO_SEARCH_test['error_esperado']  = 'recordset';
    $ESPACIO_SEARCH_test['error_obtenido'] = '';
    $ESPACIO_SEARCH_test['resultado'] = '';

    $espacio = new ESPACIO_Model("espaciop","espaciop","nombrep","direccionp",'100','100'); //espacio a insertar
    $recordset = $espacio->SEARCH();
    if($recordset instanceof mysqli_result){
        $ESPACIO_SEARCH_test['error_obtenido'] = 'recordset';
    }

    if($ESPACIO_SEARCH_test['error_obtenido'] == $ESPACIO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $ESPACIO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $ESPACIO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($ESPACIO_array_test, $ESPACIO_SEARCH_test); //se introduce el array de errores en el global

    $ESPACIO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $ESPACIO_SEARCH_test['entidad'] = 'ESPACIO';
    $ESPACIO_SEARCH_test['metodo'] = 'SEARCH';
    $ESPACIO_SEARCH_test['error'] = 'Error de gestor de base de datos';
    $ESPACIO_SEARCH_test['error_esperado']  = 'Error de gestor de base de datos';
    $ESPACIO_SEARCH_test['error_obtenido'] = '';
    $ESPACIO_SEARCH_test['resultado'] = '';

    $espacio = new ESPACIO_Model("'","espaciop","nombrep","direccionp",'100','100'); //espacio a insertar
    $ESPACIO_SEARCH_test['error_obtenido'] = $espacio->SEARCH();

    if($ESPACIO_SEARCH_test['error_obtenido'] == $ESPACIO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $ESPACIO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $ESPACIO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($ESPACIO_array_test, $ESPACIO_SEARCH_test); //se introduce el array de errores en el global
}

//funcion ESPACIO_RellenaDatos_test
//comprueba que se pueda hacer un RellenaDatos
function ESPACIO_RellenaDatos_test(){
    global $ESPACIO_array_test; //array principal del test

    $ESPACIO_RellenaDatos_test = array(); //array donde meteremos los errores que vamos a encontrar

    $ESPACIO_RellenaDatos_test['entidad'] = 'ESPACIO';
    $ESPACIO_RellenaDatos_test['metodo'] = 'RellenaDatos';
    $ESPACIO_RellenaDatos_test['error'] = 'Tupla';
    $ESPACIO_RellenaDatos_test['error_esperado']  = 'Tupla';
    $ESPACIO_RellenaDatos_test['error_obtenido'] = '';
    $ESPACIO_RellenaDatos_test['resultado'] = '';

    $login = 'prueba'; //datos a insertar

    $espacio = new ESPACIO_Model("espaciop",'',"","",'100','100'); //espacio a insertar
    $tupla = $espacio->RellenaDatos();
    if(is_array($tupla)){
        $ESPACIO_RellenaDatos_test['error_obtenido'] = 'Tupla';
    }

    if($ESPACIO_RellenaDatos_test['error_obtenido'] == $ESPACIO_RellenaDatos_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $ESPACIO_RellenaDatos_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $ESPACIO_RellenaDatos_test['resultado'] = 'FALSE';
    }
    array_push($ESPACIO_array_test, $ESPACIO_RellenaDatos_test); //se introduce el array de errores en el global

}


//se hacen las pruebas
ESPACIO_ADD_test();
ESPACIO_EDIT_test();
ESPACIO_DELETE_test();
ESPACIO_SEARCH_test();
ESPACIO_RellenaDatos_test();

//Borrar rastro test
$espacio = new ESPACIO_Model("espaciop","edicam","cencam","pas",'100','100'); //espacio a insertar
$espacio->DELETE();

//include '../Model/loadDB.php';
?>


        <?php
        foreach ($ESPACIO_array_test as $test) //para cada error se muestra la informacion
        {
            $contadorPruebas++;
            ?>
            <tr>
                <td>
                    <?php echo $test['entidad']; ?>
                </td>
                <td>
                    <?php echo $test['metodo']; ?>
                </td>
                <td>
                    <?php echo $test['error']; ?>
                </td>
                <td>
                    <?php echo $test['error_esperado']; ?>
                </td>
                <td>
                    <?php echo $test['error_obtenido']; ?>
                </td>
                <td>
                    <?php
                    if($test['resultado'] == 'FALSE'){
                        $contadorErrores++;
                        echo "<div class='false'>" . $test['resultado'] . "</div>";
                    }
                    else{
                        echo $test['resultado'];
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
<?php
//include '../View/Footer.php';
