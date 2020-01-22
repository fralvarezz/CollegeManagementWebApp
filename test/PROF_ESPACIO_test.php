<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de unidad de la entidad PROF_ESPACIO
// Incluye PROF_ESPACIO_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';
include '../Model/PROF_ESPACIO_Model.php';

//prepara el test
$profespacio = new PROF_ESPACIO_Model("12345678Z","edificiop"); //profespacio a insertar
$profespacio->ADD();
$PROF_ESPACIO_array_test = array(); //array principal del test

//funcion PROF_ESPACIO_ADD_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function PROF_ESPACIO_ADD_test(){
    global $PROF_ESPACIO_array_test; //array principal del test

    $PROF_ESPACIO_ADD_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROF_ESPACIO_ADD_test['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_ADD_test['metodo'] = 'ADD';
    $PROF_ESPACIO_ADD_test['error'] = 'Inserción fallida: el elemento ya existe';
    $PROF_ESPACIO_ADD_test['error_esperado']  = 'Inserción fallida: el elemento ya existe';
    $PROF_ESPACIO_ADD_test['error_obtenido'] = '';
    $PROF_ESPACIO_ADD_test['resultado'] = '';

    $profespacio = new PROF_ESPACIO_Model("12345678Z","edificiop"); //profespacio a insertar
    $PROF_ESPACIO_ADD_test['error_obtenido']=$profespacio->ADD();

    if($PROF_ESPACIO_ADD_test['error_obtenido'] == $PROF_ESPACIO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROF_ESPACIO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROF_ESPACIO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($PROF_ESPACIO_array_test, $PROF_ESPACIO_ADD_test); //se introduce el array de errores en el global


    $PROF_ESPACIO_ADD_test['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_ADD_test['metodo'] = 'ADD';
    $PROF_ESPACIO_ADD_test['error'] = 'Inserción realizada con éxito';
    $PROF_ESPACIO_ADD_test['error_esperado']  = 'Inserción realizada con éxito';
    $PROF_ESPACIO_ADD_test['error_obtenido'] = '';
    $PROF_ESPACIO_ADD_test['resultado'] = '';

    $profespacio = new PROF_ESPACIO_Model("93940155J","edifal"); //profespacio a insertar
    $PROF_ESPACIO_ADD_test['error_obtenido']=$profespacio->ADD();

    if($PROF_ESPACIO_ADD_test['error_obtenido'] == $PROF_ESPACIO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROF_ESPACIO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROF_ESPACIO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($PROF_ESPACIO_array_test, $PROF_ESPACIO_ADD_test); //se insertar el array de errores en el global

    //borramos la insercion
    $profespacio->DELETE();
}

//funcion PROF_ESPACIO_EDIT_test
//comprueba que se pueda hacer un EDIT
function PROF_ESPACIO_EDIT_test(){
    global $PROF_ESPACIO_array_test; //array principal del test

    $PROF_ESPACIO_EDIT_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROF_ESPACIO_EDIT_test['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_EDIT_test['metodo'] = 'EDIT';
    $PROF_ESPACIO_EDIT_test['error'] = 'Actualización realizada con éxito';
    $PROF_ESPACIO_EDIT_test['error_esperado']  = 'Actualización realizada con éxito';
    $PROF_ESPACIO_EDIT_test['error_obtenido'] = '';
    $PROF_ESPACIO_EDIT_test['resultado'] = '';

    $profespacio = new PROF_ESPACIO_Model("12345678Z","edicam"); //profespacio a insertar
    $PROF_ESPACIO_EDIT_test['error_obtenido']=$profespacio->EDIT();

    if($PROF_ESPACIO_EDIT_test['error_obtenido'] == $PROF_ESPACIO_EDIT_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROF_ESPACIO_EDIT_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROF_ESPACIO_EDIT_test['resultado'] = 'FALSE';
    }
    array_push($PROF_ESPACIO_array_test, $PROF_ESPACIO_EDIT_test); //se introduce el array de errores en el global
}

//funcion PROF_ESPACIO_DELETE_test
//comprueba que se pueda hacer un DELETE
function PROF_ESPACIO_DELETE_test(){
    global $PROF_ESPACIO_array_test; //array principal del test

    $profespacio = new PROF_ESPACIO_Model("93940155J","edificiod"); //profespacio a insertar
    $profespacio->ADD();

    $PROF_ESPACIO_DELETE_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROF_ESPACIO_DELETE_test['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_DELETE_test['metodo'] = 'DELETE';
    $PROF_ESPACIO_DELETE_test['error'] = 'Borrado realizado con éxito';
    $PROF_ESPACIO_DELETE_test['error_esperado']  = 'Borrado realizado con éxito';
    $PROF_ESPACIO_DELETE_test['error_obtenido'] = '';
    $PROF_ESPACIO_DELETE_test['resultado'] = '';

    $PROF_ESPACIO_DELETE_test['error_obtenido']=$profespacio->DELETE();

    if($PROF_ESPACIO_DELETE_test['error_obtenido'] == $PROF_ESPACIO_DELETE_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROF_ESPACIO_DELETE_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROF_ESPACIO_DELETE_test['resultado'] = 'FALSE';
    }
    array_push($PROF_ESPACIO_array_test, $PROF_ESPACIO_DELETE_test); //se introduce el array de errores en el global
}

//funcion PROF_ESPACIO_SEARCH_test
//comprueba que se pueda hacer un SEARCH
function PROF_ESPACIO_SEARCH_test(){
    global $PROF_ESPACIO_array_test; //array principal del test

    $PROF_ESPACIO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROF_ESPACIO_SEARCH_test['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_SEARCH_test['metodo'] = 'SEARCH';
    $PROF_ESPACIO_SEARCH_test['error'] = 'recordset';
    $PROF_ESPACIO_SEARCH_test['error_esperado']  = 'recordset';
    $PROF_ESPACIO_SEARCH_test['error_obtenido'] = '';
    $PROF_ESPACIO_SEARCH_test['resultado'] = '';

    $profespacio = new PROF_ESPACIO_Model("12345678Z","edificiop"); //profespacio a insertar
    $recordset = $profespacio->SEARCH();
    if($recordset instanceof mysqli_result){
        $PROF_ESPACIO_SEARCH_test['error_obtenido'] = 'recordset';
    }

    if($PROF_ESPACIO_SEARCH_test['error_obtenido'] == $PROF_ESPACIO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROF_ESPACIO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROF_ESPACIO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($PROF_ESPACIO_array_test, $PROF_ESPACIO_SEARCH_test); //se introduce el array de errores en el global

    $PROF_ESPACIO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROF_ESPACIO_SEARCH_test['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_SEARCH_test['metodo'] = 'SEARCH';
    $PROF_ESPACIO_SEARCH_test['error'] = 'Error de gestor de base de datos';
    $PROF_ESPACIO_SEARCH_test['error_esperado']  = 'Error de gestor de base de datos';
    $PROF_ESPACIO_SEARCH_test['error_obtenido'] = '';
    $PROF_ESPACIO_SEARCH_test['resultado'] = '';

    $profespacio = new PROF_ESPACIO_Model("'","edificiop"); //profespacio a insertar
    $PROF_ESPACIO_SEARCH_test['error_obtenido'] = $profespacio->SEARCH();

    if($PROF_ESPACIO_SEARCH_test['error_obtenido'] == $PROF_ESPACIO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROF_ESPACIO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROF_ESPACIO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($PROF_ESPACIO_array_test, $PROF_ESPACIO_SEARCH_test); //se introduce el array de errores en el global
}

//funcion PROF_ESPACIO_RellenaDatos_test
//comprueba que se pueda hacer un RellenaDatos
function PROF_ESPACIO_RellenaDatos_test(){
    global $PROF_ESPACIO_array_test; //array principal del test

    $PROF_ESPACIO_RellenaDatos_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROF_ESPACIO_RellenaDatos_test['entidad'] = 'PROF_ESPACIO';
    $PROF_ESPACIO_RellenaDatos_test['metodo'] = 'RellenaDatos';
    $PROF_ESPACIO_RellenaDatos_test['error'] = 'Tupla';
    $PROF_ESPACIO_RellenaDatos_test['error_esperado']  = 'Tupla';
    $PROF_ESPACIO_RellenaDatos_test['error_obtenido'] = '';
    $PROF_ESPACIO_RellenaDatos_test['resultado'] = '';

    $login = 'prueba'; //datos a insertar

    $profespacio = new PROF_ESPACIO_Model("12345678Z",'edificiop'); //profespacio a insertar
    $tupla = $profespacio->RellenaDatos();
    if(is_array($tupla)){
        $PROF_ESPACIO_RellenaDatos_test['error_obtenido'] = 'Tupla';
    }

    if($PROF_ESPACIO_RellenaDatos_test['error_obtenido'] == $PROF_ESPACIO_RellenaDatos_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROF_ESPACIO_RellenaDatos_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROF_ESPACIO_RellenaDatos_test['resultado'] = 'FALSE';
    }
    array_push($PROF_ESPACIO_array_test, $PROF_ESPACIO_RellenaDatos_test); //se introduce el array de errores en el global

}


//se hacen las pruebas
PROF_ESPACIO_ADD_test();
PROF_ESPACIO_EDIT_test();
PROF_ESPACIO_DELETE_test();
PROF_ESPACIO_SEARCH_test();
PROF_ESPACIO_RellenaDatos_test();

//Borrar rastro test
$profespacio = new PROF_ESPACIO_Model("12345678Z","edificiop"); //profespacio a insertar
$profespacio->DELETE();

//include '../Model/loadDB.php';
?>

        <?php
        foreach ($PROF_ESPACIO_array_test as $test) //para cada error se muestra la informacion
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
