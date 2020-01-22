<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de unidad de la entidad CENTRO
// Incluye CENTRO_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';
include '../Model/EDIFICIO_Model.php';

//prepara el test
$edificio = new EDIFICIO_Model("edificiop","edificiop","nombrep","direccionp"); //edificio a insertar
$edificio->ADD();
$EDIFICIO_array_test = array(); //array principal del test

//funcion EDIFICIO_ADD_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function EDIFICIO_ADD_test(){
    global $EDIFICIO_array_test; //array principal del test

    $EDIFICIO_ADD_test = array(); //array donde meteremos los errores que vamos a encontrar

    $EDIFICIO_ADD_test['entidad'] = 'EDIFICIO';
    $EDIFICIO_ADD_test['metodo'] = 'ADD';
    $EDIFICIO_ADD_test['error'] = 'Inserción fallida: el elemento ya existe';
    $EDIFICIO_ADD_test['error_esperado']  = 'Inserción fallida: el elemento ya existe';
    $EDIFICIO_ADD_test['error_obtenido'] = '';
    $EDIFICIO_ADD_test['resultado'] = '';

    $edificio = new EDIFICIO_Model("edificiop","edificiop","nombrep","direccionp"); //edificio a insertar
    $EDIFICIO_ADD_test['error_obtenido']=$edificio->ADD();

    if($EDIFICIO_ADD_test['error_obtenido'] == $EDIFICIO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $EDIFICIO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $EDIFICIO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($EDIFICIO_array_test, $EDIFICIO_ADD_test); //se introduce el array de errores en el global


    $EDIFICIO_ADD_test['entidad'] = 'EDIFICIO';
    $EDIFICIO_ADD_test['metodo'] = 'ADD';
    $EDIFICIO_ADD_test['error'] = 'Inserción realizada con éxito';
    $EDIFICIO_ADD_test['error_esperado']  = 'Inserción realizada con éxito';
    $EDIFICIO_ADD_test['error_obtenido'] = '';
    $EDIFICIO_ADD_test['resultado'] = '';

    $edificio = new EDIFICIO_Model("cenfal","edifal","nombrefalso","campusfal"); //edificio a insertar
    $EDIFICIO_ADD_test['error_obtenido']=$edificio->ADD();

    if($EDIFICIO_ADD_test['error_obtenido'] == $EDIFICIO_ADD_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $EDIFICIO_ADD_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $EDIFICIO_ADD_test['resultado'] = 'FALSE';
    }
    array_push($EDIFICIO_array_test, $EDIFICIO_ADD_test); //se insertar el array de errores en el global

    //borramos la insercion
    $edificio->DELETE();
}

//funcion EDIFICIO_EDIT_test
//comprueba que se pueda hacer un EDIT
function EDIFICIO_EDIT_test(){
    global $EDIFICIO_array_test; //array principal del test

    $EDIFICIO_EDIT_test = array(); //array donde meteremos los errores que vamos a encontrar

    $EDIFICIO_EDIT_test['entidad'] = 'EDIFICIO';
    $EDIFICIO_EDIT_test['metodo'] = 'EDIT';
    $EDIFICIO_EDIT_test['error'] = 'Actualización realizada con éxito';
    $EDIFICIO_EDIT_test['error_esperado']  = 'Actualización realizada con éxito';
    $EDIFICIO_EDIT_test['error_obtenido'] = '';
    $EDIFICIO_EDIT_test['resultado'] = '';

    $edificio = new EDIFICIO_Model("edificiop","edifcam","direcam","campuscam"); //edificio a insertar
    $EDIFICIO_EDIT_test['error_obtenido']=$edificio->EDIT();

    if($EDIFICIO_EDIT_test['error_obtenido'] == $EDIFICIO_EDIT_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $EDIFICIO_EDIT_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $EDIFICIO_EDIT_test['resultado'] = 'FALSE';
    }
    array_push($EDIFICIO_array_test, $EDIFICIO_EDIT_test); //se introduce el array de errores en el global
}

//funcion EDIFICIO_DELETE_test
//comprueba que se pueda hacer un DELETE
function EDIFICIO_DELETE_test(){
    global $EDIFICIO_array_test; //array principal del test

    $edificio = new EDIFICIO_Model("edificiod","nombred","dired","campusd"); //edificio a insertar
    $edificio->ADD();

    $EDIFICIO_DELETE_test = array(); //array donde meteremos los errores que vamos a encontrar

    $EDIFICIO_DELETE_test['entidad'] = 'EDIFICIO';
    $EDIFICIO_DELETE_test['metodo'] = 'DELETE';
    $EDIFICIO_DELETE_test['error'] = 'Borrado realizado con éxito';
    $EDIFICIO_DELETE_test['error_esperado']  = 'Borrado realizado con éxito';
    $EDIFICIO_DELETE_test['error_obtenido'] = '';
    $EDIFICIO_DELETE_test['resultado'] = '';

    $EDIFICIO_DELETE_test['error_obtenido']=$edificio->DELETE();

    if($EDIFICIO_DELETE_test['error_obtenido'] == $EDIFICIO_DELETE_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $EDIFICIO_DELETE_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $EDIFICIO_DELETE_test['resultado'] = 'FALSE';
    }
    array_push($EDIFICIO_array_test, $EDIFICIO_DELETE_test); //se introduce el array de errores en el global
}

//funcion EDIFICIO_SEARCH_test
//comprueba que se pueda hacer un SEARCH
function EDIFICIO_SEARCH_test(){
    global $EDIFICIO_array_test; //array principal del test

    $EDIFICIO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $EDIFICIO_SEARCH_test['entidad'] = 'EDIFICIO';
    $EDIFICIO_SEARCH_test['metodo'] = 'SEARCH';
    $EDIFICIO_SEARCH_test['error'] = 'recordset';
    $EDIFICIO_SEARCH_test['error_esperado']  = 'recordset';
    $EDIFICIO_SEARCH_test['error_obtenido'] = '';
    $EDIFICIO_SEARCH_test['resultado'] = '';

    $edificio = new EDIFICIO_Model("edificiop","edificiop","nombrep","direccionp"); //edificio a insertar
    $recordset = $edificio->SEARCH();
    if($recordset instanceof mysqli_result){
        $EDIFICIO_SEARCH_test['error_obtenido'] = 'recordset';
    }

    if($EDIFICIO_SEARCH_test['error_obtenido'] == $EDIFICIO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $EDIFICIO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $EDIFICIO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($EDIFICIO_array_test, $EDIFICIO_SEARCH_test); //se introduce el array de errores en el global

    $EDIFICIO_SEARCH_test = array(); //array donde meteremos los errores que vamos a encontrar

    $EDIFICIO_SEARCH_test['entidad'] = 'EDIFICIO';
    $EDIFICIO_SEARCH_test['metodo'] = 'SEARCH';
    $EDIFICIO_SEARCH_test['error'] = 'Error de gestor de base de datos';
    $EDIFICIO_SEARCH_test['error_esperado']  = 'Error de gestor de base de datos';
    $EDIFICIO_SEARCH_test['error_obtenido'] = '';
    $EDIFICIO_SEARCH_test['resultado'] = '';

    $edificio = new EDIFICIO_Model("'","edificiop","nombrep","direccionp"); //edificio a insertar
    $EDIFICIO_SEARCH_test['error_obtenido'] = $edificio->SEARCH();

    if($EDIFICIO_SEARCH_test['error_obtenido'] == $EDIFICIO_SEARCH_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $EDIFICIO_SEARCH_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $EDIFICIO_SEARCH_test['resultado'] = 'FALSE';
    }
    array_push($EDIFICIO_array_test, $EDIFICIO_SEARCH_test); //se introduce el array de errores en el global
}

//funcion EDIFICIO_RellenaDatos_test
//comprueba que se pueda hacer un RellenaDatos
function EDIFICIO_RellenaDatos_test(){
    global $EDIFICIO_array_test; //array principal del test

    $EDIFICIO_RellenaDatos_test = array(); //array donde meteremos los errores que vamos a encontrar

    $EDIFICIO_RellenaDatos_test['entidad'] = 'EDIFICIO';
    $EDIFICIO_RellenaDatos_test['metodo'] = 'RellenaDatos';
    $EDIFICIO_RellenaDatos_test['error'] = 'Tupla';
    $EDIFICIO_RellenaDatos_test['error_esperado']  = 'Tupla';
    $EDIFICIO_RellenaDatos_test['error_obtenido'] = '';
    $EDIFICIO_RellenaDatos_test['resultado'] = '';

    $login = 'prueba'; //datos a insertar

    $edificio = new EDIFICIO_Model("edificiop",'',"",""); //edificio a insertar
    $tupla = $edificio->RellenaDatos();
    if(is_array($tupla)){
        $EDIFICIO_RellenaDatos_test['error_obtenido'] = 'Tupla';
    }

    if($EDIFICIO_RellenaDatos_test['error_obtenido'] == $EDIFICIO_RellenaDatos_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $EDIFICIO_RellenaDatos_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $EDIFICIO_RellenaDatos_test['resultado'] = 'FALSE';
    }
    array_push($EDIFICIO_array_test, $EDIFICIO_RellenaDatos_test); //se introduce el array de errores en el global

}


//se hacen las pruebas
EDIFICIO_ADD_test();
EDIFICIO_EDIT_test();
EDIFICIO_DELETE_test();
EDIFICIO_SEARCH_test();
EDIFICIO_RellenaDatos_test();

//Borrar rastro test
$edificio = new EDIFICIO_Model("edificiop","edificiop","nombrep","direccionp"); //edificio a insertar
$edificio->DELETE();

//include '../Model/loadDB.php';
?>

        <?php
        foreach ($EDIFICIO_array_test as $test) //para cada error se muestra la informacion
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
