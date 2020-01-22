<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de unidad de la entidad CENTRO
// Incluye CENTRO_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';
include '../Model/CENTRO_Model.php';

//prepara el test
$centro = new CENTRO_Model("centrop","edificiop","nombrep","direccionp","responsablep"); //centro a insertar
$centro->ADD();
$CENTRO_array_test = array(); //array principal del test

//funcion CENTRO_ADD_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function CENTRO_ADD_test(){
    global $CENTRO_array_test; //array principal del test

    $CENTRO_ADD_test = array(); //array donde meteremos los errores que vamos a encontrar

    $CENTRO_ADD_test['entidad'] = 'CENTRO';
    $CENTRO_ADD_test['metodo'] = 'ADD';
    $CENTRO_ADD_test['error'] = 'Inserción fallida: el elemento ya existe';
    $CENTRO_ADD_test['error_esperado']  = 'Inserción fallida: el elemento ya existe';
    $CENTRO_ADD_test['error_obtenido'] = '';
    $CENTRO_ADD_test['resultado'] = '';

    $centro = new CENTRO_Model("centrop","edificiop","nombrep","direccionp","responsablep"); //centro a insertar
    $CENTRO_ADD_test['error_obtenido']=$centro->ADD();

    if($CENTRO_ADD_test['error_obtenido'] == $CENTRO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $CENTRO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $CENTRO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($CENTRO_array_test, $CENTRO_ADD_test); //se introduce el array de errores en el global


    $CENTRO_ADD_test['entidad'] = 'CENTRO';
    $CENTRO_ADD_test['metodo'] = 'ADD';
    $CENTRO_ADD_test['error'] = 'Inserción realizada con éxito';
    $CENTRO_ADD_test['error_esperado']  = 'Inserción realizada con éxito';
    $CENTRO_ADD_test['error_obtenido'] = '';
    $CENTRO_ADD_test['resultado'] = '';

    $centro = new CENTRO_Model("cenfal","edifal","nombrefalso","direccionfalsa","responsablefalso"); //centro a insertar
    $CENTRO_ADD_test['error_obtenido']=$centro->ADD();

    if($CENTRO_ADD_test['error_obtenido'] == $CENTRO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $CENTRO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $CENTRO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($CENTRO_array_test, $CENTRO_ADD_test); //se insertar el array de errores en el global

    //borramos la insercion
    $centro->DELETE();
}

//funcion CENTRO_EDIT_test
//comprueba que se pueda hacer un EDIT
function CENTRO_EDIT_test(){
    global $CENTRO_array_test; //array principal del test

    $CENTRO_EDIT_test = array(); //array donde meteremos los errores que vamos a encontrar

    $CENTRO_EDIT_test['entidad'] = 'CENTRO';
    $CENTRO_EDIT_test['metodo'] = 'EDIT';
    $CENTRO_EDIT_test['error'] = 'Actualización realizada con éxito';
    $CENTRO_EDIT_test['error_esperado']  = 'Actualización realizada con éxito';
    $CENTRO_EDIT_test['error_obtenido'] = '';
    $CENTRO_EDIT_test['resultado'] = '';

    $centro = new CENTRO_Model("centrop","cambio","nombrecambiado","direccioncambiada","cambiores"); //centro a insertar
    $CENTRO_EDIT_test['error_obtenido']=$centro->EDIT();

    if($CENTRO_EDIT_test['error_obtenido'] == $CENTRO_EDIT_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $CENTRO_EDIT_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $CENTRO_EDIT_test['resultado'] = 'FALSE';
    }
    array_push($CENTRO_array_test, $CENTRO_EDIT_test); //se introduce el array de errores en el global
}

//funcion CENTRO_DELETE_test
//comprueba que se pueda hacer un DELETE
function CENTRO_DELETE_test(){
    global $CENTRO_array_test; //array principal del test

    $centro = new CENTRO_Model("centrod","edificiod","nombred","direcciond","responsabled"); //centro a insertar
    $centro->ADD();

    $CENTRO_DELETE_test = array(); //array donde meteremos los errores que vamos a encontrar

    $CENTRO_DELETE_test['entidad'] = 'CENTRO';
    $CENTRO_DELETE_test['metodo'] = 'DELETE';
    $CENTRO_DELETE_test['error'] = 'Borrado realizado con éxito';
    $CENTRO_DELETE_test['error_esperado']  = 'Borrado realizado con éxito';
    $CENTRO_DELETE_test['error_obtenido'] = '';
    $CENTRO_DELETE_test['resultado'] = '';

    $CENTRO_DELETE_test['error_obtenido']=$centro->DELETE();

    if($CENTRO_DELETE_test['error_obtenido'] == $CENTRO_DELETE_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $CENTRO_DELETE_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $CENTRO_DELETE_test['resultado'] = 'FALSE';
    }
    array_push($CENTRO_array_test, $CENTRO_DELETE_test); //se introduce el array de errores en el global
}

//funcion CENTRO_SEARCH_test
//comprueba que se pueda hacer un SEARCH
function CENTRO_SEARCH_test(){
    global $CENTRO_array_test; //array principal del test

    $CENTRO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $CENTRO_SEARCH_test['entidad'] = 'CENTRO';
    $CENTRO_SEARCH_test['metodo'] = 'SEARCH';
    $CENTRO_SEARCH_test['error'] = 'recordset';
    $CENTRO_SEARCH_test['error_esperado']  = 'recordset';
    $CENTRO_SEARCH_test['error_obtenido'] = '';
    $CENTRO_SEARCH_test['resultado'] = '';

    $centro = new CENTRO_Model("centrop","edificiop","nombrep","direccionp","responsablep"); //centro a insertar
    $recordset = $centro->SEARCH();
    if($recordset instanceof mysqli_result){
        $CENTRO_SEARCH_test['error_obtenido'] = 'recordset';
    }

    if($CENTRO_SEARCH_test['error_obtenido'] == $CENTRO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $CENTRO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $CENTRO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($CENTRO_array_test, $CENTRO_SEARCH_test); //se introduce el array de errores en el global

    $CENTRO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $CENTRO_SEARCH_test['entidad'] = 'CENTRO';
    $CENTRO_SEARCH_test['metodo'] = 'SEARCH';
    $CENTRO_SEARCH_test['error'] = 'Error de gestor de base de datos';
    $CENTRO_SEARCH_test['error_esperado']  = 'Error de gestor de base de datos';
    $CENTRO_SEARCH_test['error_obtenido'] = '';
    $CENTRO_SEARCH_test['resultado'] = '';

    $centro = new CENTRO_Model("'","edificiop","nombrep","direccionp","responsablep"); //centro a insertar
    $CENTRO_SEARCH_test['error_obtenido'] = $centro->SEARCH();

    if($CENTRO_SEARCH_test['error_obtenido'] == $CENTRO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $CENTRO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $CENTRO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($CENTRO_array_test, $CENTRO_SEARCH_test); //se introduce el array de errores en el global
}

//funcion CENTRO_RellenaDatos_test
//comprueba que se pueda hacer un RellenaDatos
function CENTRO_RellenaDatos_test(){
    global $CENTRO_array_test; //array principal del test

    $CENTRO_RellenaDatos_test = array(); //array donde meteremos los errores que vamos a encontrar

    $CENTRO_RellenaDatos_test['entidad'] = 'CENTRO';
    $CENTRO_RellenaDatos_test['metodo'] = 'RellenaDatos';
    $CENTRO_RellenaDatos_test['error'] = 'Tupla';
    $CENTRO_RellenaDatos_test['error_esperado']  = 'Tupla';
    $CENTRO_RellenaDatos_test['error_obtenido'] = '';
    $CENTRO_RellenaDatos_test['resultado'] = '';

    $login = 'prueba'; //datos a insertar

    $centro = new CENTRO_Model("centrop",'',"","",""); //centro a insertar
    $tupla = $centro->RellenaDatos();
    if(is_array($tupla)){
        $CENTRO_RellenaDatos_test['error_obtenido'] = 'Tupla';
    }

    if($CENTRO_RellenaDatos_test['error_obtenido'] == $CENTRO_RellenaDatos_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $CENTRO_RellenaDatos_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $CENTRO_RellenaDatos_test['resultado'] = 'FALSE';
    }
    array_push($CENTRO_array_test, $CENTRO_RellenaDatos_test); //se introduce el array de errores en el global

}


//se hacen las pruebas
CENTRO_ADD_test();
CENTRO_EDIT_test();
CENTRO_DELETE_test();
CENTRO_SEARCH_test();
CENTRO_RellenaDatos_test();

//Borrar rastro test
$centro = new CENTRO_Model("centrop","edificiop","nombrep","direccionp","responsablep"); //centro a insertar
$centro->DELETE();

//include '../Model/loadDB.php';
?>

        <?php
        foreach ($CENTRO_array_test as $test) //para cada error se muestra la informacion
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
