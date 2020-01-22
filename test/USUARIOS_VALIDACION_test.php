<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de validacion de atributos de la entidad USUARIOS
// Incluye USUARIOS_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';

//prepara el test
$USUARIOS_array_test = array(); //array principal del test

//funcion comprobar_atributos
//comprueba todos los errores que se encuentran en los atributos
function USUARIOS_comprobar_atributos_test(){
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","pass","96632962A","nombre","apellidos","666666666","email@gmail.com","1111-11-11","foto.jpg","hombre"); //usuarios a comprobar

    $test['error_obtenido']=$usuarios->comprobar_atributos();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test,$test);


    //dos errores en atributos
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'login 00001,password 00001';
    $test['error_esperado']  = 'login 00001,password 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("","","96632962A","nombre","apellidos","666666666","email@gmail.com","1111-11-11","foto.jpg","hombre"); //usuarios a comprobar

    $errores = $usuarios->comprobar_atributos(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $atributo) { //para cada atributo con errores se buscan todos sus errores
        foreach($atributo as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
            array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
            $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
        }
    }
    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);
}

//funcion comprobar_login
//comprueba todos los errores que se encuentran en login
function USUARIOS_comprobar_login_test(){
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_login';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","pass","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
    "foto.jpg", "hombre" ); //usuarios a comprobar

    $test['error_obtenido']=$usuarios->comprobar_login();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_login';
    $test['error'] = 'login 00001';
    $test['error_esperado']  = 'login 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("","pass","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_login(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_login';
    $test['error'] = 'login 00002';
    $test['error_esperado']  = 'login 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("aaaaaaaaaaaaaaaaaaa","pass","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_login(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_login';
    $test['error'] = 'login 00003';
    $test['error_esperado']  = 'login 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("aa","pass","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_login(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_login';
    $test['error'] = 'login 00090';
    $test['error_esperado']  = 'login 00090';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("a123","pass","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_login(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);
}

//funcion comprobar_password
//comprueba todos los errores que se encuentran en password
function USUARIOS_comprobar_password_test(){
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_password';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("password","pass","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar

    $test['error_obtenido']=$usuarios->comprobar_password();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_password';
    $test['error'] = 'password 00001';
    $test['error_esperado']  = 'password 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_password(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_password';
    $test['error'] = 'password 00002';
    $test['error_esperado']  = 'password 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","aaaaaaaaaaaaaaaaaaa","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_password(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00005
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_password';
    $test['error'] = 'password 00005';
    $test['error_esperado']  = 'password 00005';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","aaaaaaaaaaaaaaaaaaa","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_password(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_password';
    $test['error'] = 'password 00003';
    $test['error_esperado']  = 'password 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","aa","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_password(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_password';
    $test['error'] = 'password 00090';
    $test['error_esperado']  = 'password 00090';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("aaaaa","pass123","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_password(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);
}

//funcion comprobar_DNI
//comprueba todos los errores que se encuentran en DNI
function USUARIOS_comprobar_DNI_test(){
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","pass","12345678Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar

    $test['error_obtenido']=$usuarios->comprobar_DNI();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00001';
    $test['error_esperado']  = 'DNI 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","pass","","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_DNI(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00010';
    $test['error_esperado']  = 'DNI 00010';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","pass","12345678A","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_DNI(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00011';
    $test['error_esperado']  = 'DNI 00011';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login","pass","123456789Z","nombre",
        "apellidos", "666666666", "mail@mail.es","1111-11-11",
        "foto.jpg", "hombre" ); //usuarios a comprobar
    $errores = $usuarios->comprobar_DNI(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",",$test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach($errores as $error){  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'],1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados,$erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if($coinciden == $erroresbuscados){ //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test,$test);

}

//funcion comprobar_nombre
//comprueba todos los errores que se encuentran en nombre
function USUARIOS_comprobar_nombre_test()
{
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_nombre';
    $test['error'] = 'true';
    $test['error_esperado'] = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("nombre", "pass", "12345678Z", "nombre",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar

    $test['error_obtenido'] = $usuarios->comprobar_nombre();
    if ($test['error_obtenido'] == true) { //si dio true, metemos el string true
        $test['error_obtenido'] = 'true';
    }

    if ($test['error_obtenido'] == $test['error_esperado']) { //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    } else { //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test, $test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_nombre';
    $test['error'] = 'nombre 00001';
    $test['error_esperado'] = 'nombre 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_nombre(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_nombre';
    $test['error'] = 'nombre 00002';
    $test['error_esperado'] = 'nombre 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_nombre(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_nombre';
    $test['error'] = 'nombre 00003';
    $test['error_esperado'] = 'nombre 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "aa",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_nombre(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_nombre';
    $test['error'] = 'nombre 00030';
    $test['error_esperado'] = 'nombre 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("a123", "pass", "12345678Z", "nombbre_",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_nombre(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);
}


//funcion comprobar_apellidos
//comprueba todos los errores que se encuentran en nombre
function USUARIOS_comprobar_apellidos_test()
{
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_apellidos';
    $test['error'] = 'true';
    $test['error_esperado'] = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nombre",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar

    $test['error_obtenido'] = $usuarios->comprobar_apellidos();
    if ($test['error_obtenido'] == true) { //si dio true, metemos el string true
        $test['error_obtenido'] = 'true';
    }

    if ($test['error_obtenido'] == $test['error_esperado']) { //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    } else { //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test, $test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_apellidos';
    $test['error'] = 'apellidos 00001';
    $test['error_esperado'] = 'apellidos 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_apellidos(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_apellidos';
    $test['error'] = 'apellidos 00002';
    $test['error_esperado'] = 'apellidos 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_apellidos(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_apellidos';
    $test['error'] = 'apellidos 00003';
    $test['error_esperado'] = 'apellidos 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "aa", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_apellidos(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_apellidos';
    $test['error'] = 'apellidos 00030';
    $test['error_esperado'] = 'apellidos 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("a123", "pass", "12345678Z", "nom",
        "apellidos_", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_apellidos(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);
}

//funcion comprobar_telefono
//comprueba todos los errores que se encuentran en nombre
function USUARIOS_comprobar_telefono_test()
{
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_telefono';
    $test['error'] = 'true';
    $test['error_esperado'] = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nombre",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar

    $test['error_obtenido'] = $usuarios->comprobar_telefono();
    if ($test['error_obtenido'] == true) { //si dio true, metemos el string true
        $test['error_obtenido'] = 'true';
    }

    if ($test['error_obtenido'] == $test['error_esperado']) { //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    } else { //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test, $test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_telefono';
    $test['error'] = 'telefono 00001';
    $test['error_esperado'] = 'telefono 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell", "", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_telefono(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_telefono';
    $test['error'] = 'telefono 00002';
    $test['error_esperado'] = 'telefono 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell",
        "66666666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_telefono(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_telefono';
    $test['error'] = 'telefono 00004';
    $test['error_esperado'] = 'telefono 00004';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell", "", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_telefono(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00006
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_telefono';
    $test['error'] = 'telefono 00006';
    $test['error_esperado'] = 'telefono 00006';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "telefono", "35666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_telefono(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00006
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_telefono';
    $test['error'] = 'telefono 00070';
    $test['error_esperado'] = 'telefono 00070';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "telefono", "aaaaaaaaa", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_telefono(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);
}

//funcion comprobar_email
//comprueba todos los errores que se encuentran en nombre
function USUARIOS_comprobar_email_test()
{
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_email';
    $test['error'] = 'true';
    $test['error_esperado'] = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nombre",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar

    $test['error_obtenido'] = $usuarios->comprobar_email();
    if ($test['error_obtenido'] == true) { //si dio true, metemos el string true
        $test['error_obtenido'] = 'true';
    }

    if ($test['error_obtenido'] == $test['error_esperado']) { //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    } else { //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test, $test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_email';
    $test['error'] = 'email 00001';
    $test['error_esperado'] = 'email 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell", "666666666", "", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_email(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_email';
    $test['error'] = 'email 00002';
    $test['error_esperado'] = 'email 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell",
        "666666666", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_email(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_email';
    $test['error'] = 'email 00003';
    $test['error_esperado'] = 'email 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell", "666666666", "aa", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_email(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00006
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_email';
    $test['error'] = 'email 00120';
    $test['error_esperado'] = 'email 00120';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "email", "34666666666", "mail@@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_email(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

}

//funcion comprobar_FechaNacimiento
//comprueba todos los errores que se encuentran en nombre
function USUARIOS_comprobar_FechaNacimiento_test()
{
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_FechaNacimiento';
    $test['error'] = 'true';
    $test['error_esperado'] = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nombre",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar

    $test['error_obtenido'] = $usuarios->comprobar_FechaNacimiento();
    if ($test['error_obtenido'] == true) { //si dio true, metemos el string true
        $test['error_obtenido'] = 'true';
    }

    if ($test['error_obtenido'] == $test['error_esperado']) { //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    } else { //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test, $test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_FechaNacimiento';
    $test['error'] = 'FechaNacimiento 00001';
    $test['error_esperado'] = 'FechaNacimiento 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell", "666666666", "mail@mail.es", "",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_FechaNacimiento(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_FechaNacimiento';
    $test['error'] = 'FechaNacimiento 00020';
    $test['error_esperado'] = 'FechaNacimiento 00020';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell",
        "666666666", "mail@mail.es", "11-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar
    $errores = $usuarios->comprobar_FechaNacimiento(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

}

//funcion comprobar_sexo
//comprueba todos los errores que se encuentran en nombre
function USUARIOS_comprobar_sexo_test()
{
    global $USUARIOS_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_sexo';
    $test['error'] = 'true';
    $test['error_esperado'] = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nombre",
        "apellidos", "666666666", "mail@mail.es", "1111-11-11",
        "foto.jpg", "hombre"); //usuarios a comprobar

    $test['error_obtenido'] = $usuarios->comprobar_sexo();
    if ($test['error_obtenido'] == true) { //si dio true, metemos el string true
        $test['error_obtenido'] = 'true';
    }

    if ($test['error_obtenido'] == $test['error_esperado']) { //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    } else { //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($USUARIOS_array_test, $test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_sexo';
    $test['error'] = 'sexo 00001';
    $test['error_esperado'] = 'sexo 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell", "666666666", "mail@mail.es", "",
        "foto.jpg", ""); //usuarios a comprobar
    $errores = $usuarios->comprobar_sexo(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }

    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'USUARIOS';
    $test['metodo'] = 'comprobar_sexo';
    $test['error'] = 'sexo 00100';
    $test['error_esperado'] = 'sexo 00100';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $usuarios = new USUARIOS_Model("login", "pass", "12345678Z", "nom",
        "apell",
        "666666666", "mail@mail.es", "11-11-11",
        "foto.jpg", "perro"); //usuarios a comprobar
    $errores = $usuarios->comprobar_sexo(); //errores encontrados

    $erroresencontrados = array(); //array con los errores encontrados con su formato correspondiente
    $erroresbuscados = explode(",", $test['error_esperado']); //array con los errores buscados con su formato correspondiente

    foreach ($errores as $error) {  //para cada error de cada atributo se mete en un array y en error_obtenido
        array_push($erroresencontrados, ($error['nombreatributo'] . " " . $error["codigoincidencia"]));
        $test['error_obtenido'] = $test['error_obtenido'] . "," . $error['nombreatributo'] . " " . $error["codigoincidencia"];
    }
    $test['error_obtenido'] = substr($test['error_obtenido'], 1); //eliminamos la primera coma

    $coinciden = array_intersect($erroresencontrados, $erroresbuscados); //comprobamos los errores que coinciden de los encontrados y buscados
    sort($coinciden); //ordenamos el array de coinciden
    sort($erroresbuscados); //ordenamos el array de buscados

    if ($coinciden == $erroresbuscados) { //si se encontraron todos los buscados el resultado es OK
        $test['resultado'] = 'OK';
    } else {
        $test['resultado'] = 'FALSE'; //si no el resultado es false
    }

    array_push($USUARIOS_array_test, $test);

}





//se hacen las pruebas
USUARIOS_comprobar_atributos_test();
USUARIOS_comprobar_login_test();
USUARIOS_comprobar_password_test();
USUARIOS_comprobar_DNI_test();
USUARIOS_comprobar_nombre_test();
USUARIOS_comprobar_apellidos_test();
USUARIOS_comprobar_telefono_test();
USUARIOS_comprobar_email_test();
USUARIOS_comprobar_FechaNacimiento_test();
USUARIOS_comprobar_sexo_test();

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
