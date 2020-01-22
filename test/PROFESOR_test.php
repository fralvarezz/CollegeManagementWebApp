<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de unidad de la entidad PROFESOR
// Incluye PROFESOR_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';
include '../Model/PROFESOR_Model.php';

//prepara el test
$profesor = new PROFESOR_Model("93940155J","edificiop","nombrep","direccionp","responsablep"); //profesor a insertar
$profesor->ADD();
$PROFESOR_array_test = array(); //array principal del test

//funcion PROFESOR_ADD_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function PROFESOR_ADD_test(){
    global $PROFESOR_array_test; //array principal del test

    $PROFESOR_ADD_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROFESOR_ADD_test['entidad'] = 'PROFESOR';
    $PROFESOR_ADD_test['metodo'] = 'ADD';
    $PROFESOR_ADD_test['error'] = 'Inserción fallida: el elemento ya existe';
    $PROFESOR_ADD_test['error_esperado']  = 'Inserción fallida: el elemento ya existe';
    $PROFESOR_ADD_test['error_obtenido'] = '';
    $PROFESOR_ADD_test['resultado'] = '';

    $profesor = new PROFESOR_Model("93940155J","edificiop","nombrep","direccionp","responsablep"); //profesor a insertar
    $PROFESOR_ADD_test['error_obtenido']=$profesor->ADD();

    if($PROFESOR_ADD_test['error_obtenido'] == $PROFESOR_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROFESOR_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROFESOR_ADD_test['resultado'] = 'FALSE';
    }
    array_push($PROFESOR_array_test, $PROFESOR_ADD_test); //se introduce el array de errores en el global


    $PROFESOR_ADD_test['entidad'] = 'PROFESOR';
    $PROFESOR_ADD_test['metodo'] = 'ADD';
    $PROFESOR_ADD_test['error'] = 'Inserción realizada con éxito';
    $PROFESOR_ADD_test['error_esperado']  = 'Inserción realizada con éxito';
    $PROFESOR_ADD_test['error_obtenido'] = '';
    $PROFESOR_ADD_test['resultado'] = '';

    $profesor = new PROFESOR_Model("62051947V","edifal","nombrefalso","direccionfalsa","responsablefalso"); //profesor a insertar
    $PROFESOR_ADD_test['error_obtenido']=$profesor->ADD();

    if($PROFESOR_ADD_test['error_obtenido'] == $PROFESOR_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROFESOR_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROFESOR_ADD_test['resultado'] = 'FALSE';
    }
    array_push($PROFESOR_array_test, $PROFESOR_ADD_test); //se insertar el array de errores en el global

    //borramos la insercion
    $profesor->DELETE();
}

//funcion PROFESOR_EDIT_test
//comprueba que se pueda hacer un EDIT
function PROFESOR_EDIT_test(){
    global $PROFESOR_array_test; //array principal del test

    $PROFESOR_EDIT_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROFESOR_EDIT_test['entidad'] = 'PROFESOR';
    $PROFESOR_EDIT_test['metodo'] = 'EDIT';
    $PROFESOR_EDIT_test['error'] = 'Actualización realizada con éxito';
    $PROFESOR_EDIT_test['error_esperado']  = 'Actualización realizada con éxito';
    $PROFESOR_EDIT_test['error_obtenido'] = '';
    $PROFESOR_EDIT_test['resultado'] = '';

    $profesor = new PROFESOR_Model("93940155J","edicam","nombrecambiado","areacam","responcam"); //profesor a insertar
    $PROFESOR_EDIT_test['error_obtenido']=$profesor->EDIT();

    if($PROFESOR_EDIT_test['error_obtenido'] == $PROFESOR_EDIT_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROFESOR_EDIT_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROFESOR_EDIT_test['resultado'] = 'FALSE';
    }
    array_push($PROFESOR_array_test, $PROFESOR_EDIT_test); //se introduce el array de errores en el global
}

//funcion PROFESOR_DELETE_test
//comprueba que se pueda hacer un DELETE
function PROFESOR_DELETE_test(){
    global $PROFESOR_array_test; //array principal del test

    $profesor = new PROFESOR_Model("62051947V","edificiod","nombred","direcciond","responsabled"); //profesor a insertar
    $profesor->ADD();

    $PROFESOR_DELETE_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROFESOR_DELETE_test['entidad'] = 'PROFESOR';
    $PROFESOR_DELETE_test['metodo'] = 'DELETE';
    $PROFESOR_DELETE_test['error'] = 'Borrado realizado con éxito';
    $PROFESOR_DELETE_test['error_esperado']  = 'Borrado realizado con éxito';
    $PROFESOR_DELETE_test['error_obtenido'] = '';
    $PROFESOR_DELETE_test['resultado'] = '';

    $PROFESOR_DELETE_test['error_obtenido']=$profesor->DELETE();

    if($PROFESOR_DELETE_test['error_obtenido'] == $PROFESOR_DELETE_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROFESOR_DELETE_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROFESOR_DELETE_test['resultado'] = 'FALSE';
    }
    array_push($PROFESOR_array_test, $PROFESOR_DELETE_test); //se introduce el array de errores en el global
}

//funcion PROFESOR_SEARCH_test
//comprueba que se pueda hacer un SEARCH
function PROFESOR_SEARCH_test(){
    global $PROFESOR_array_test; //array principal del test

    $PROFESOR_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROFESOR_SEARCH_test['entidad'] = 'PROFESOR';
    $PROFESOR_SEARCH_test['metodo'] = 'SEARCH';
    $PROFESOR_SEARCH_test['error'] = 'recordset';
    $PROFESOR_SEARCH_test['error_esperado']  = 'recordset';
    $PROFESOR_SEARCH_test['error_obtenido'] = '';
    $PROFESOR_SEARCH_test['resultado'] = '';

    $profesor = new PROFESOR_Model("93940155J","edificiop","nombrep","direccionp","responsablep"); //profesor a insertar
    $recordset = $profesor->SEARCH();
    if($recordset instanceof mysqli_result){
        $PROFESOR_SEARCH_test['error_obtenido'] = 'recordset';
    }

    if($PROFESOR_SEARCH_test['error_obtenido'] == $PROFESOR_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROFESOR_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROFESOR_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($PROFESOR_array_test, $PROFESOR_SEARCH_test); //se introduce el array de errores en el global

    $PROFESOR_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROFESOR_SEARCH_test['entidad'] = 'PROFESOR';
    $PROFESOR_SEARCH_test['metodo'] = 'SEARCH';
    $PROFESOR_SEARCH_test['error'] = 'Error de gestor de base de datos';
    $PROFESOR_SEARCH_test['error_esperado']  = 'Error de gestor de base de datos';
    $PROFESOR_SEARCH_test['error_obtenido'] = '';
    $PROFESOR_SEARCH_test['resultado'] = '';

    $profesor = new PROFESOR_Model("'","edificiop","nombrep","direccionp","responsablep"); //profesor a insertar
    $PROFESOR_SEARCH_test['error_obtenido'] = $profesor->SEARCH();

    if($PROFESOR_SEARCH_test['error_obtenido'] == $PROFESOR_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROFESOR_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROFESOR_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($PROFESOR_array_test, $PROFESOR_SEARCH_test); //se introduce el array de errores en el global
}

//funcion PROFESOR_RellenaDatos_test
//comprueba que se pueda hacer un RellenaDatos
function PROFESOR_RellenaDatos_test(){
    global $PROFESOR_array_test; //array principal del test

    $PROFESOR_RellenaDatos_test = array(); //array donde meteremos los errores que vamos a encontrar

    $PROFESOR_RellenaDatos_test['entidad'] = 'PROFESOR';
    $PROFESOR_RellenaDatos_test['metodo'] = 'RellenaDatos';
    $PROFESOR_RellenaDatos_test['error'] = 'Tupla';
    $PROFESOR_RellenaDatos_test['error_esperado']  = 'Tupla';
    $PROFESOR_RellenaDatos_test['error_obtenido'] = '';
    $PROFESOR_RellenaDatos_test['resultado'] = '';

    $login = 'prueba'; //datos a insertar

    $profesor = new PROFESOR_Model("93940155J",'',"","",""); //profesor a insertar
    $tupla = $profesor->RellenaDatos();
    if(is_array($tupla)){
        $PROFESOR_RellenaDatos_test['error_obtenido'] = 'Tupla';
    }

    if($PROFESOR_RellenaDatos_test['error_obtenido'] == $PROFESOR_RellenaDatos_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $PROFESOR_RellenaDatos_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $PROFESOR_RellenaDatos_test['resultado'] = 'FALSE';
    }
    array_push($PROFESOR_array_test, $PROFESOR_RellenaDatos_test); //se introduce el array de errores en el global

}


//se hacen las pruebas
PROFESOR_ADD_test();
PROFESOR_EDIT_test();
PROFESOR_DELETE_test();
PROFESOR_SEARCH_test();
PROFESOR_RellenaDatos_test();

//Borrar rastro test
$profesor = new PROFESOR_Model("93940155J","edificiop","nombrep","direccionp","responsablep"); //profesor a insertar
$profesor->DELETE();

//include '../Model/loadDB.php';
?>


        <?php
        foreach ($PROFESOR_array_test as $test) //para cada error se muestra la informacion
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
