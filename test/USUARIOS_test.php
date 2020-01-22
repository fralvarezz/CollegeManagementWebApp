<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de unidad de la entidad USUARIOS
// Incluye USUARIOS_Model.php
// Saca por pantalla el resultado de los test
    //include '../View/Header.php'; //header necesita los strings
    //include '../Model/saveDB.php';
    include '../Model/USUARIOS_Model.php';

    //prepara el test
    $usuarios = new USUARIOS_Model("prueba","passprueba","53360362V","prueba","prueba","666666666",
        "prueba@gmail.com","1111-11-11","prueba.jpg","hombre"); //usuario a insertar
    $usuarios->ADD();
    $USUARIOS_array_test = array(); //array principal del test

//funcion USUARIOS_ADD_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
    function USUARIOS_ADD_test(){
        global $USUARIOS_array_test; //array principal del test

        $USUARIOS_ADD_test1 = array(); //array donde meteremos los errores que vamos a encontrar

        $USUARIOS_ADD_test1['entidad'] = 'USUARIOS';
        $USUARIOS_ADD_test1['metodo'] = 'ADD';
        $USUARIOS_ADD_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $USUARIOS_ADD_test1['error_esperado']  = 'Inserción fallida: el elemento ya existe';
        $USUARIOS_ADD_test1['error_obtenido'] = '';
        $USUARIOS_ADD_test1['resultado'] = '';

        $login = 'prueba'; //datos a insertar
        $password = 'passprueba'; //datos a insertar
        $dni = '53360362V'; //datos a insertar
        $nombre = 'prueba'; //datos a insertar
        $apellidos = 'prueba'; //datos a insertar
        $tlf = '666666666'; //datos a insertar
        $email = 'prueba@gmail.com'; //datos a insertar
        $fecha = '1111-11-11'; //datos a insertar
        $foto = 'prueba.jpg'; //datos a insertar
        $sexo = 'hombre'; //datos a insertar

        $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
        $USUARIOS_ADD_test1['error_obtenido']=$usuarios->ADD();

        if($USUARIOS_ADD_test1['error_obtenido'] == $USUARIOS_ADD_test1['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
            $USUARIOS_ADD_test1['resultado'] = 'OK';
        }
        else{ //si no se se añade false
            $USUARIOS_ADD_test1['resultado'] = 'FALSE';
        }
        array_push($USUARIOS_array_test, $USUARIOS_ADD_test1); //se introduce el array de errores en el global


        $USUARIOS_ADD_test1['entidad'] = 'USUARIOS';
        $USUARIOS_ADD_test1['metodo'] = 'ADD';
        $USUARIOS_ADD_test1['error'] = 'Inserción realizada con éxito';
        $USUARIOS_ADD_test1['error_esperado']  = 'Inserción realizada con éxito';
        $USUARIOS_ADD_test1['error_obtenido'] = '';
        $USUARIOS_ADD_test1['resultado'] = '';

        $login = 'pruebados'; //datos a insertar
        $password = 'pruebados'; //datos a insertar
        $dni = '16289186B'; //datos a insertar
        $nombre = 'pruebados'; //datos a insertar
        $apellidos = 'prueba dos'; //datos a insertar
        $tlf = '666666666'; //datos a insertar
        $email = 'pruebaa@gmail.com'; //datos a insertar
        $fecha = '1111-11-11'; //datos a insertar
        $foto = 'prueba2.png'; //datos a insertar
        $sexo = 'hombre'; //datos a insertar

        $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
        $USUARIOS_ADD_test1['error_obtenido']=$usuarios->ADD();

        if($USUARIOS_ADD_test1['error_obtenido'] == $USUARIOS_ADD_test1['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
            $USUARIOS_ADD_test1['resultado'] = 'OK';
        }
        else{ //si no se se añade false
            $USUARIOS_ADD_test1['resultado'] = 'FALSE';
        }
        array_push($USUARIOS_array_test, $USUARIOS_ADD_test1); //se insertar el array de errores en el global

        //borramos la insercion
        $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
        $usuarios->DELETE();
    }

//funcion USUARIOS_EDIT_test
//comprueba que se pueda hacer un EDIT
function USUARIOS_EDIT_test(){
    global $USUARIOS_array_test; //array principal del test

    $USUARIOS_EDIT_TEST = array(); //array donde meteremos los errores que vamos a encontrar

    $USUARIOS_EDIT_TEST['entidad'] = 'USUARIOS';
    $USUARIOS_EDIT_TEST['metodo'] = 'EDIT';
    $USUARIOS_EDIT_TEST['error'] = 'Actualización realizada con éxito';
    $USUARIOS_EDIT_TEST['error_esperado']  = 'Actualización realizada con éxito';
    $USUARIOS_EDIT_TEST['error_obtenido'] = '';
    $USUARIOS_EDIT_TEST['resultado'] = '';

    $login = 'prueba'; //datos a insertar
    $password = 'cambiada'; //datos a insertar
    $dni = '98612489N'; //datos a insertar
    $nombre = 'edit'; //datos a insertar
    $apellidos = 'edit'; //datos a insertar
    $tlf = '606606606'; //datos a insertar
    $email = 'cambio@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'foto'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a editar
    $USUARIOS_EDIT_TEST['error_obtenido']=$usuarios->EDIT();

    if($USUARIOS_EDIT_TEST['error_obtenido'] == $USUARIOS_EDIT_TEST['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_EDIT_TEST['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_EDIT_TEST['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_EDIT_TEST); //se introduce el array de errores en el global
}

//funcion USUARIOS_DELETE_test
//comprueba que se pueda hacer un DELETE
function USUARIOS_DELETE_test(){
    global $USUARIOS_array_test; //array principal del test

    $usuarios = new USUARIOS_Model("pruebadel","passpruebadel","27932961J","pruebadel","pruebadel","666666667",
        "pruebadel@gmail.com","1111-11-11","pruebadel.jpg","hombre"); //usuario a insertar
    $usuarios->ADD();

    $USUARIOS_DELETE_TEST = array(); //array donde meteremos los errores que vamos a encontrar

    $USUARIOS_DELETE_TEST['entidad'] = 'USUARIOS';
    $USUARIOS_DELETE_TEST['metodo'] = 'DELETE';
    $USUARIOS_DELETE_TEST['error'] = 'Borrado realizado con éxito';
    $USUARIOS_DELETE_TEST['error_esperado']  = 'Borrado realizado con éxito';
    $USUARIOS_DELETE_TEST['error_obtenido'] = '';
    $USUARIOS_DELETE_TEST['resultado'] = '';

    $login = 'pruebadel'; //datos a insertar
    $password = 'passpruebadel'; //datos a insertar
    $dni = '27932961J'; //datos a insertar
    $nombre = 'pruebadel'; //datos a insertar
    $apellidos = 'pruebadel'; //datos a insertar
    $tlf = '666666667'; //datos a insertar
    $email = 'pruebadel@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'pruebadel.jpg'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a borrar
    $USUARIOS_DELETE_TEST['error_obtenido']=$usuarios->DELETE();

    if($USUARIOS_DELETE_TEST['error_obtenido'] == $USUARIOS_DELETE_TEST['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_DELETE_TEST['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_DELETE_TEST['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_DELETE_TEST); //se introduce el array de errores en el global
}

//funcion USUARIOS_SEARCH_test
//comprueba que se pueda hacer un SEARCH
function USUARIOS_SEARCH_test(){
    global $USUARIOS_array_test; //array principal del test

    $USUARIOS_SEARCH_TEST = array(); //array donde meteremos los errores que vamos a encontrar

    $USUARIOS_SEARCH_TEST['entidad'] = 'USUARIOS';
    $USUARIOS_SEARCH_TEST['metodo'] = 'SEARCH';
    $USUARIOS_SEARCH_TEST['error'] = 'recordset';
    $USUARIOS_SEARCH_TEST['error_esperado']  = 'recordset';
    $USUARIOS_SEARCH_TEST['error_obtenido'] = '';
    $USUARIOS_SEARCH_TEST['resultado'] = '';

    $login = 'prueba'; //datos a insertar
    $password = 'passprueba'; //datos a insertar
    $dni = '53360362V'; //datos a insertar
    $nombre = 'prueba'; //datos a insertar
    $apellidos = 'prueba'; //datos a insertar
    $tlf = '666666666'; //datos a insertar
    $email = 'prueba@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'prueba.jpg'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a editar
    $recordset = $usuarios->SEARCH();
    if($recordset instanceof mysqli_result){
        $USUARIOS_SEARCH_TEST['error_obtenido'] = 'recordset';
    }

    if($USUARIOS_SEARCH_TEST['error_obtenido'] == $USUARIOS_SEARCH_TEST['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_SEARCH_TEST['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_SEARCH_TEST['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_SEARCH_TEST); //se introduce el array de errores en el global

    $USUARIOS_SEARCH_TEST['entidad'] = 'USUARIOS';
    $USUARIOS_SEARCH_TEST['metodo'] = 'SEARCH';
    $USUARIOS_SEARCH_TEST['error'] = 'Error de gestor de base de datos';
    $USUARIOS_SEARCH_TEST['error_esperado']  = 'Error de gestor de base de datos';
    $USUARIOS_SEARCH_TEST['error_obtenido'] = '';
    $USUARIOS_SEARCH_TEST['resultado'] = '';

    $login = "" ; //datos a insertar
    $password = 'passprueba'; //datos a insertar
    $dni = '53360362V'; //datos a insertar
    $nombre = 'prueba'; //datos a insertar
    $apellidos = 'prueba'; //datos a insertar
    $tlf = '666666666'; //datos a insertar
    $email = 'prueba@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'prueba.jpg'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model("'",$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a editar
    $USUARIOS_SEARCH_TEST['error_obtenido'] = $usuarios->SEARCH();


    if($USUARIOS_SEARCH_TEST['error_obtenido'] == $USUARIOS_SEARCH_TEST['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_SEARCH_TEST['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_SEARCH_TEST['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_SEARCH_TEST); //se introduce el array de errores en el global
}

//funcion USUARIOS_RellenaDatos_test
//comprueba que se pueda hacer un RellenaDatos
function USUARIOS_RellenaDatos_test(){
    global $USUARIOS_array_test; //array principal del test

    $USUARIOS_RellenaDatos_test = array(); //array donde meteremos los errores que vamos a encontrar

    $USUARIOS_RellenaDatos_test['entidad'] = 'USUARIOS';
    $USUARIOS_RellenaDatos_test['metodo'] = 'RellenaDatos';
    $USUARIOS_RellenaDatos_test['error'] = 'Tupla';
    $USUARIOS_RellenaDatos_test['error_esperado']  = 'Tupla';
    $USUARIOS_RellenaDatos_test['error_obtenido'] = '';
    $USUARIOS_RellenaDatos_test['resultado'] = '';

    $login = 'prueba'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,'','','','','','','','',''); //usuario a editar
    $tupla = $usuarios->RellenaDatos();
    if(is_array($tupla)){
        $USUARIOS_RellenaDatos_test['error_obtenido'] = 'Tupla';
    }

    if($USUARIOS_RellenaDatos_test['error_obtenido'] == $USUARIOS_RellenaDatos_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_RellenaDatos_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_RellenaDatos_test['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_RellenaDatos_test); //se introduce el array de errores en el global
}

//funcion USUARIOS_login_test
//comprueba que se pueda hacer un RellenaDatos
function USUARIOS_login_test(){
    global $USUARIOS_array_test; //array principal del test

    //---------------------------LOGIN NO EXISTE
    $USUARIOS_login_test = array(); //array donde meteremos los errores que vamos a encontrar

    $USUARIOS_login_test['entidad'] = 'USUARIOS';
    $USUARIOS_login_test['metodo'] = 'login';
    $USUARIOS_login_test['error'] = 'El login no existe';
    $USUARIOS_login_test['error_esperado']  = 'El login no existe';
    $USUARIOS_login_test['error_obtenido'] = '';
    $USUARIOS_login_test['resultado'] = '';

    $login = 'loginfalso'; //datos a loggear
    $password = 'passfalsa'; //datos a loggear

    $usuarios = new USUARIOS_Model($login,$password,'','','','','','','',''); //usuario a editar
    $USUARIOS_login_test['error_obtenido']=$usuarios->login();

    if($USUARIOS_login_test['error_obtenido'] == $USUARIOS_login_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_login_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_login_test['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_login_test); //se introduce el array de errores en el global


    //---------------------------PASS FALSA
    $USUARIOS_login_test['entidad'] = 'USUARIOS';
    $USUARIOS_login_test['metodo'] = 'login';
    $USUARIOS_login_test['error'] = 'La password para este usuario no es correcta';
    $USUARIOS_login_test['error_esperado']  = 'La password para este usuario no es correcta';
    $USUARIOS_login_test['error_obtenido'] = '';
    $USUARIOS_login_test['resultado'] = '';

    $login = 'prueba'; //datos a loggear
    $password = 'passfalsa'; //datos a loggear

    $usuarios = new USUARIOS_Model($login,$password,'','','','','','','',''); //usuario a editar
    $USUARIOS_login_test['error_obtenido']=$usuarios->login();

    if($USUARIOS_login_test['error_obtenido'] == $USUARIOS_login_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_login_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_login_test['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_login_test); //se introduce el array de errores en el global

    //---------------------------true
    $USUARIOS_login_test['entidad'] = 'USUARIOS';
    $USUARIOS_login_test['metodo'] = 'login';
    $USUARIOS_login_test['error'] = 'true';
    $USUARIOS_login_test['error_esperado']  = 'true';
    $USUARIOS_login_test['error_obtenido'] = '';
    $USUARIOS_login_test['resultado'] = '';

    $login = 'prueba'; //datos a loggear
    $password = 'passprueba'; //datos a loggear

    $usuarios = new USUARIOS_Model("prueba","passprueba",'','','','','','','',''); //usuario a editar
    $resul = $usuarios->login();
    if($resul == true){
        $USUARIOS_login_test['error_obtenido'] = "true";
    }

    if($USUARIOS_login_test['error_obtenido'] == $USUARIOS_login_test['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_login_test['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_login_test['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_login_test); //se introduce el array de errores en el global

}

//funcion USUARIOS_Register_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function USUARIOS_Register_test(){
    global $USUARIOS_array_test; //array principal del test

    $USUARIOS_ADD_test1 = array(); //array donde meteremos los errores que vamos a encontrar

    $USUARIOS_ADD_test1['entidad'] = 'USUARIOS';
    $USUARIOS_ADD_test1['metodo'] = 'register';
    $USUARIOS_ADD_test1['error'] = 'El usuario ya existe';
    $USUARIOS_ADD_test1['error_esperado']  = 'El usuario ya existe';
    $USUARIOS_ADD_test1['error_obtenido'] = '';
    $USUARIOS_ADD_test1['resultado'] = '';

    $login = 'prueba'; //datos a insertar
    $password = 'passprueba'; //datos a insertar
    $dni = '53360362V'; //datos a insertar
    $nombre = 'prueba'; //datos a insertar
    $apellidos = 'prueba'; //datos a insertar
    $tlf = '666666666'; //datos a insertar
    $email = 'prueba@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'prueba.jpg'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
    $USUARIOS_ADD_test1['error_obtenido']=$usuarios->Register();

    if($USUARIOS_ADD_test1['error_obtenido'] == $USUARIOS_ADD_test1['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_ADD_test1['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_ADD_test1['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_ADD_test1); //se introduce el array de errores en el global


    $USUARIOS_ADD_test1['entidad'] = 'USUARIOS';
    $USUARIOS_ADD_test1['metodo'] = 'register';
    $USUARIOS_ADD_test1['error'] = 'true';
    $USUARIOS_ADD_test1['error_esperado']  = 'true';
    $USUARIOS_ADD_test1['error_obtenido'] = '';
    $USUARIOS_ADD_test1['resultado'] = '';

    $login = 'prueba2'; //datos a insertar
    $password = 'prueba2'; //datos a insertar
    $dni = '97099841M'; //datos a insertar
    $nombre = 'pruebados'; //datos a insertar
    $apellidos = 'prueba dos'; //datos a insertar
    $tlf = '666666662'; //datos a insertar
    $email = 'prueba2@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'prueba2.png'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
    $USUARIOS_ADD_test1['error_obtenido']=$usuarios->Register();
    if($USUARIOS_ADD_test1['error_obtenido']==true){
        $USUARIOS_ADD_test1['error_obtenido']='true';
    }

    if($USUARIOS_ADD_test1['error_obtenido'] == $USUARIOS_ADD_test1['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_ADD_test1['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_ADD_test1['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_ADD_test1); //se insertar el array de errores en el global

    //borramos la insercion
    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
    $usuarios->DELETE();
}

//funcion USUARIOS_registrar_test
//comprueba que se pueda hacer un ADD de una tupla que no existe y al contrario
function USUARIOS_registrar_test(){
    global $USUARIOS_array_test; //array principal del test

    $USUARIOS_ADD_test1 = array(); //array donde meteremos los errores que vamos a encontrar

    //ERROR DE GESTOR DE BASE DE DATOS
    $USUARIOS_ADD_test1['entidad'] = 'USUARIOS';
    $USUARIOS_ADD_test1['metodo'] = 'registrar';
    $USUARIOS_ADD_test1['error'] = 'Inserción fallida: el elemento ya existe';
    $USUARIOS_ADD_test1['error_esperado']  = 'Inserción fallida: el elemento ya existe';
    $USUARIOS_ADD_test1['error_obtenido'] = '';
    $USUARIOS_ADD_test1['resultado'] = '';

    $login = 'prueba'; //datos a insertar
    $password = 'passprueba'; //datos a insertar
    $dni = '53360362V'; //datos a insertar
    $nombre = 'prueba'; //datos a insertar
    $apellidos = 'prueba'; //datos a insertar
    $tlf = '666666666'; //datos a insertar
    $email = 'prueba@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'prueba.jpg'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
    $USUARIOS_ADD_test1['error_obtenido']=$usuarios->ADD();

    if($USUARIOS_ADD_test1['error_obtenido'] == $USUARIOS_ADD_test1['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_ADD_test1['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_ADD_test1['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_ADD_test1); //se introduce el array de errores en el global


    $USUARIOS_ADD_test1['entidad'] = 'USUARIOS';
    $USUARIOS_ADD_test1['metodo'] = 'registrar';
    $USUARIOS_ADD_test1['error'] = 'Inserción realizada con éxito';
    $USUARIOS_ADD_test1['error_esperado']  = 'Inserción realizada con éxito';
    $USUARIOS_ADD_test1['error_obtenido'] = '';
    $USUARIOS_ADD_test1['resultado'] = '';

    $login = 'pruebaDOS'; //datos a insertar
    $password = 'passprueba'; //datos a insertar
    $dni = '16289186B'; //datos a insertar
    $nombre = 'pruebados'; //datos a insertar
    $apellidos = 'pruebados'; //datos a insertar
    $tlf = '666666662'; //datos a insertar
    $email = 'prueba2@gmail.com'; //datos a insertar
    $fecha = '1111-11-11'; //datos a insertar
    $foto = 'prueba2.png'; //datos a insertar
    $sexo = 'hombre'; //datos a insertar

    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
    $USUARIOS_ADD_test1['error_obtenido']=$usuarios->ADD();

    if($USUARIOS_ADD_test1['error_obtenido'] == $USUARIOS_ADD_test1['error_esperado']){ //si el error que obtuvimos fue el que esperamos se añade ok
        $USUARIOS_ADD_test1['resultado'] = 'OK';
    }
    else{ //si no se se añade false
        $USUARIOS_ADD_test1['resultado'] = 'FALSE';
    }
    array_push($USUARIOS_array_test, $USUARIOS_ADD_test1); //se insertar el array de errores en el global

    //borramos la insercion
    $usuarios = new USUARIOS_Model($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$fecha,$foto,$sexo); //usuario a insertar
    $usuarios->DELETE();
}




//se hacen las pruebas
    USUARIOS_login_test();
    USUARIOS_Register_test();
    USUARIOS_registrar_test();
    USUARIOS_ADD_test();
    USUARIOS_EDIT_test();
    USUARIOS_DELETE_test();
    USUARIOS_SEARCH_test();
    USUARIOS_RellenaDatos_test();

    //Borrar rastro test
    $usuarios = new USUARIOS_Model("prueba","cambiada","53360362V","prueba","prueba","666666666",
        "prueba@gmail.com","1111-11-11","prueba.jpg","hombre"); //usuario a insertar
    $usuarios->DELETE();

//include '../Model/loadDB.php';
    ?>

    <?php
    foreach ($USUARIOS_array_test as $test) //para cada error se muestra la informacion
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
