<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de unidad de la entidad TITULACION
// Incluye TITULACION_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';
include '../Model/TITULACION_Model.php';

//prepara el test
$titulacion = new TITULACION_Model("93940155J","edificiop","nombrep","direccionp"); //titulacion a insertar
$titulacion->ADD();
$TITULACION_array_test = array(); //array principal del test

//funcion TITULACION_ADD_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function TITULACION_ADD_test(){
    global $TITULACION_array_test; //array principal del test

    $TITULACION_ADD_test = array(); //array donde meteremos los errores que vamos a encontrar

    $TITULACION_ADD_test['entidad'] = 'TITULACION';
    $TITULACION_ADD_test['metodo'] = 'ADD';
    $TITULACION_ADD_test['error'] = 'Inserción fallida: el elemento ya existe';
    $TITULACION_ADD_test['error_esperado']  = 'Inserción fallida: el elemento ya existe';
    $TITULACION_ADD_test['error_obtenido'] = '';
    $TITULACION_ADD_test['resultado'] = '';

    $titulacion = new TITULACION_Model("93940155J","edificiop","nombrep","direccionp"); //titulacion a insertar
    $TITULACION_ADD_test['error_obtenido']=$titulacion->ADD();

    if($TITULACION_ADD_test['error_obtenido'] == $TITULACION_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $TITULACION_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $TITULACION_ADD_test['resultado'] = 'FALSE';
    }
    array_push($TITULACION_array_test, $TITULACION_ADD_test); //se introduce el array de errores en el global


    $TITULACION_ADD_test['entidad'] = 'TITULACION';
    $TITULACION_ADD_test['metodo'] = 'ADD';
    $TITULACION_ADD_test['error'] = 'Inserción realizada con éxito';
    $TITULACION_ADD_test['error_esperado']  = 'Inserción realizada con éxito';
    $TITULACION_ADD_test['error_obtenido'] = '';
    $TITULACION_ADD_test['resultado'] = '';

    $titulacion = new TITULACION_Model("62051947V","edifal","nombrefalso","direccionfalsa"); //titulacion a insertar
    $TITULACION_ADD_test['error_obtenido']=$titulacion->ADD();

    if($TITULACION_ADD_test['error_obtenido'] == $TITULACION_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $TITULACION_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $TITULACION_ADD_test['resultado'] = 'FALSE';
    }
    array_push($TITULACION_array_test, $TITULACION_ADD_test); //se insertar el array de errores en el global

    //borramos la insercion
    $titulacion->DELETE();
}

//funcion TITULACION_EDIT_test
//comprueba que se pueda hacer un EDIT
function TITULACION_EDIT_test(){
    global $TITULACION_array_test; //array principal del test

    $TITULACION_EDIT_test = array(); //array donde meteremos los errores que vamos a encontrar

    $TITULACION_EDIT_test['entidad'] = 'TITULACION';
    $TITULACION_EDIT_test['metodo'] = 'EDIT';
    $TITULACION_EDIT_test['error'] = 'Actualización realizada con éxito';
    $TITULACION_EDIT_test['error_esperado']  = 'Actualización realizada con éxito';
    $TITULACION_EDIT_test['error_obtenido'] = '';
    $TITULACION_EDIT_test['resultado'] = '';

    $titulacion = new TITULACION_Model("93940155J","cencam","nombrecambiado","responcam"); //titulacion a insertar
    $TITULACION_EDIT_test['error_obtenido']=$titulacion->EDIT();

    if($TITULACION_EDIT_test['error_obtenido'] == $TITULACION_EDIT_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $TITULACION_EDIT_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $TITULACION_EDIT_test['resultado'] = 'FALSE';
    }
    array_push($TITULACION_array_test, $TITULACION_EDIT_test); //se introduce el array de errores en el global
}

//funcion TITULACION_DELETE_test
//comprueba que se pueda hacer un DELETE
function TITULACION_DELETE_test(){
    global $TITULACION_array_test; //array principal del test

    $titulacion = new TITULACION_Model("62051947V","edificiod","nombred","direcciond"); //titulacion a insertar
    $titulacion->ADD();

    $TITULACION_DELETE_test = array(); //array donde meteremos los errores que vamos a encontrar

    $TITULACION_DELETE_test['entidad'] = 'TITULACION';
    $TITULACION_DELETE_test['metodo'] = 'DELETE';
    $TITULACION_DELETE_test['error'] = 'Borrado realizado con éxito';
    $TITULACION_DELETE_test['error_esperado']  = 'Borrado realizado con éxito';
    $TITULACION_DELETE_test['error_obtenido'] = '';
    $TITULACION_DELETE_test['resultado'] = '';

    $TITULACION_DELETE_test['error_obtenido']=$titulacion->DELETE();

    if($TITULACION_DELETE_test['error_obtenido'] == $TITULACION_DELETE_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $TITULACION_DELETE_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $TITULACION_DELETE_test['resultado'] = 'FALSE';
    }
    array_push($TITULACION_array_test, $TITULACION_DELETE_test); //se introduce el array de errores en el global
}

//funcion TITULACION_SEARCH_test
//comprueba que se pueda hacer un SEARCH
function TITULACION_SEARCH_test(){
    global $TITULACION_array_test; //array principal del test

    $TITULACION_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $TITULACION_SEARCH_test['entidad'] = 'TITULACION';
    $TITULACION_SEARCH_test['metodo'] = 'SEARCH';
    $TITULACION_SEARCH_test['error'] = 'recordset';
    $TITULACION_SEARCH_test['error_esperado']  = 'recordset';
    $TITULACION_SEARCH_test['error_obtenido'] = '';
    $TITULACION_SEARCH_test['resultado'] = '';

    $titulacion = new TITULACION_Model("93940155J","edificiop","nombrep","direccionp"); //titulacion a insertar
    $recordset = $titulacion->SEARCH();
    if($recordset instanceof mysqli_result){
        $TITULACION_SEARCH_test['error_obtenido'] = 'recordset';
    }

    if($TITULACION_SEARCH_test['error_obtenido'] == $TITULACION_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $TITULACION_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $TITULACION_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($TITULACION_array_test, $TITULACION_SEARCH_test); //se introduce el array de errores en el global

    $TITULACION_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $TITULACION_SEARCH_test['entidad'] = 'TITULACION';
    $TITULACION_SEARCH_test['metodo'] = 'SEARCH';
    $TITULACION_SEARCH_test['error'] = 'Error de gestor de base de datos';
    $TITULACION_SEARCH_test['error_esperado']  = 'Error de gestor de base de datos';
    $TITULACION_SEARCH_test['error_obtenido'] = '';
    $TITULACION_SEARCH_test['resultado'] = '';

    $titulacion = new TITULACION_Model("'","edificiop","nombrep","direccionp"); //titulacion a insertar
    $TITULACION_SEARCH_test['error_obtenido'] = $titulacion->SEARCH();

    if($TITULACION_SEARCH_test['error_obtenido'] == $TITULACION_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $TITULACION_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $TITULACION_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($TITULACION_array_test, $TITULACION_SEARCH_test); //se introduce el array de errores en el global
}

//funcion TITULACION_RellenaDatos_test
//comprueba que se pueda hacer un RellenaDatos
function TITULACION_RellenaDatos_test(){
    global $TITULACION_array_test; //array principal del test

    $TITULACION_RellenaDatos_test = array(); //array donde meteremos los errores que vamos a encontrar

    $TITULACION_RellenaDatos_test['entidad'] = 'TITULACION';
    $TITULACION_RellenaDatos_test['metodo'] = 'RellenaDatos';
    $TITULACION_RellenaDatos_test['error'] = 'Tupla';
    $TITULACION_RellenaDatos_test['error_esperado']  = 'Tupla';
    $TITULACION_RellenaDatos_test['error_obtenido'] = '';
    $TITULACION_RellenaDatos_test['resultado'] = '';

    $login = 'prueba'; //datos a insertar

    $titulacion = new TITULACION_Model("93940155J",'',"",""); //titulacion a insertar
    $tupla = $titulacion->RellenaDatos();
    if(is_array($tupla)){
        $TITULACION_RellenaDatos_test['error_obtenido'] = 'Tupla';
    }

    if($TITULACION_RellenaDatos_test['error_obtenido'] == $TITULACION_RellenaDatos_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $TITULACION_RellenaDatos_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $TITULACION_RellenaDatos_test['resultado'] = 'FALSE';
    }
    array_push($TITULACION_array_test, $TITULACION_RellenaDatos_test); //se introduce el array de errores en el global

}


//se hacen las pruebas
TITULACION_ADD_test();
TITULACION_EDIT_test();
TITULACION_DELETE_test();
TITULACION_SEARCH_test();
TITULACION_RellenaDatos_test();

//Borrar rastro test
$titulacion = new TITULACION_Model("93940155J","edificiop","nombrep","direccionp"); //titulacion a insertar
$titulacion->DELETE();

//include '../Model/loadDB.php';
?>

        <?php
        foreach ($TITULACION_array_test as $test) //para cada error se muestra la informacion
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
