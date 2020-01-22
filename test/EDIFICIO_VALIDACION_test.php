<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de validacion de atributos de la entidad EDIFICIO
// Incluye EDIFICIO_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';

//prepara el test
$EDIFICIO_array_test = array(); //array principal del test

//funcion comprobar_atributos
//comprueba todos los errores que se encuentran en los atributos
function EDIFICIO_comprobar_atributos_test(){
    global $EDIFICIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("coded","nomedi","direccionedi","campusedi"); //edificio a comprobar

    $test['error_obtenido']=$edificio->comprobar_atributos();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($EDIFICIO_array_test,$test);


    //dos errores en atributos
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'CODEDIFICIO 00001,NOMBREEDIFICIO 00001';
    $test['error_esperado']  = 'CODEDIFICIO 00001,NOMBREEDIFICIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("","","diredi","campusedi"); //edificio a comprobar

    $errores = $edificio->comprobar_atributos(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);
}

//funcion comprobar_CODEDIFICIO
//comprueba todos los errores que se encuentran en nombreedificio
function EDIFICIO_comprobar_CODEDIFICIO_test(){
    global $EDIFICIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diriedi","campusedi"); //edificio a comprobar

    $test['error_obtenido']=$edificio->comprobar_CODEDIFICIO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($EDIFICIO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00001';
    $test['error_esperado']  = 'CODEDIFICIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("","nomedi","diriedi","campusedi"); //edificio a comprobar

    $errores = $edificio->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00002';
    $test['error_esperado']  = 'CODEDIFICIO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "nomedi","diredi","campusedi"); //edificio a comprobar

    $errores = $edificio->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00003';
    $test['error_esperado']  = 'CODEDIFICIO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("aa","nomedi","diredi","camedi"); //edificio a comprobar

    $errores = $edificio->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00040';
    $test['error_esperado']  = 'CODEDIFICIO 00040';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("_edificio","nomedi","diredi","camedi"); //edificio a comprobar

    $errores = $edificio->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);
}

//funcion comprobar_NOMBREEDIFICIO
//comprueba todos los errores que se encuentran en nombreedificio
function EDIFICIO_comprobar_NOMBREEDIFICIO_test(){
    global $EDIFICIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_NOMBREEDIFICIO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diriedi","campusedi"); //edificio a comprobar

    $test['error_obtenido']=$edificio->comprobar_NOMBREEDIFICIO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($EDIFICIO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_NOMBREEDIFICIO';
    $test['error'] = 'NOMBREEDIFICIO 00001';
    $test['error_esperado']  = 'NOMBREEDIFICIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","","diriedi","campusedi"); //edificio a comprobar

    $errores = $edificio->comprobar_NOMBREEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_NOMBREEDIFICIO';
    $test['error'] = 'NOMBREEDIFICIO 00002';
    $test['error_esperado']  = 'NOMBREEDIFICIO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "diredi","campusedi"); //edificio a comprobar

    $errores = $edificio->comprobar_NOMBREEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_NOMBREEDIFICIO';
    $test['error'] = 'NOMBREEDIFICIO 00003';
    $test['error_esperado']  = 'NOMBREEDIFICIO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","aa","diredi","camedi"); //edificio a comprobar

    $errores = $edificio->comprobar_NOMBREEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_NOMBREEDIFICIO';
    $test['error'] = 'NOMBREEDIFICIO 00030';
    $test['error_esperado']  = 'NOMBREEDIFICIO 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi01","diredi","camedi"); //edificio a comprobar

    $errores = $edificio->comprobar_NOMBREEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);
}

//funcion comprobar_DIRECCIONEDIFICIO
//comprueba todos los errores que se encuentran en direccionedificio
function EDIFICIO_comprobar_DIRECCIONEDIFICIO_test(){
    global $EDIFICIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_DIRECCIONEDIFICIO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diriedi","campusedi"); //edificio a comprobar

    $test['error_obtenido']=$edificio->comprobar_DIRECCIONEDIFICIO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($EDIFICIO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_DIRECCIONEDIFICIO';
    $test['error'] = 'DIRECCIONEDIFICIO 00001';
    $test['error_esperado']  = 'DIRECCIONEDIFICIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","","campusedi"); //edificio a comprobar

    $errores = $edificio->comprobar_DIRECCIONEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_DIRECCIONEDIFICIO';
    $test['error'] = 'DIRECCIONEDIFICIO 00002';
    $test['error_esperado']  = 'DIRECCIONEDIFICIO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi",
        "nomedi",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "campusedi"); //edificio a comprobar

    $errores = $edificio->comprobar_DIRECCIONEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_DIRECCIONEDIFICIO';
    $test['error'] = 'DIRECCIONEDIFICIO 00003';
    $test['error_esperado']  = 'DIRECCIONEDIFICIO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","aa","camedi"); //edificio a comprobar

    $errores = $edificio->comprobar_DIRECCIONEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_DIRECCIONEDIFICIO';
    $test['error'] = 'DIRECCIONEDIFICIO 00050';
    $test['error_esperado']  = 'DIRECCIONEDIFICIO 00050';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diredi*","camedi"); //edificio a comprobar

    $errores = $edificio->comprobar_DIRECCIONEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);
}

//funcion comprobar_CAMPUSEDIFICIO
//comprueba todos los errores que se encuentran en campusedificio
function EDIFICIO_comprobar_CAMPUSEDIFICIO_test(){
    global $EDIFICIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CAMPUSEDIFICIO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diriedi","campusedi"); //edificio a comprobar

    $test['error_obtenido']=$edificio->comprobar_CAMPUSEDIFICIO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($EDIFICIO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CAMPUSEDIFICIO';
    $test['error'] = 'CAMPUSEDIFICIO 00001';
    $test['error_esperado']  = 'CAMPUSEDIFICIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diredi",""); //edificio a comprobar

    $errores = $edificio->comprobar_CAMPUSEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CAMPUSEDIFICIO';
    $test['error'] = 'CAMPUSEDIFICIO 00002';
    $test['error_esperado']  = 'CAMPUSEDIFICIO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi",
        "nomedi",
        "diredi",
        "campusediaaaaaa"); //edificio a comprobar

    $errores = $edificio->comprobar_CAMPUSEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CAMPUSEDIFICIO';
    $test['error'] = 'CAMPUSEDIFICIO 00003';
    $test['error_esperado']  = 'CAMPUSEDIFICIO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diredi","aa"); //edificio a comprobar

    $errores = $edificio->comprobar_CAMPUSEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'EDIFICIO';
    $test['metodo'] = 'comprobar_CAMPUSEDIFICIO';
    $test['error'] = 'CAMPUSEDIFICIO 00030';
    $test['error_esperado']  = 'CAMPUSEDIFICIO 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $edificio = new EDIFICIO_Model("codedi","nomedi","diredi","camedi_"); //edificio a comprobar

    $errores = $edificio->comprobar_CAMPUSEDIFICIO(); //errores encontrados

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

    array_push($EDIFICIO_array_test,$test);
}



//se hacen las pruebas
EDIFICIO_comprobar_atributos_test();
EDIFICIO_comprobar_CODEDIFICIO_test();
EDIFICIO_comprobar_NOMBREEDIFICIO_test();
EDIFICIO_comprobar_DIRECCIONEDIFICIO_test();
EDIFICIO_comprobar_CAMPUSEDIFICIO_test();

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
