<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de validacion de atributos de la entidad PROFESOR
// Incluye PROFESOR_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';

//prepara el test
$PROFESOR_array_test = array(); //array principal del test

//funcion comprobar_atributos
//comprueba todos los errores que se encuentran en los atributos
function PROFESOR_comprobar_atributos_test(){
    global $PROFESOR_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("40650391F","nomprof","apeprof","areaprof","depprof"); //profesor a comprobar

    $test['error_obtenido']=$profesor->comprobar_atributos();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROFESOR_array_test,$test);


    //dos errores en atributos
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'DNI 00001,NOMBREPROFESOR 00001';
    $test['error_esperado']  = 'DNI 00001,NOMBREPROFESOR 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("","","apeprof","areaprof","depprof"); //profesor a comprobar

    $errores = $profesor->comprobar_atributos(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);
}

//funcion comprobar_DNI
//comprueba todos los errores que se encuentran en dni
function PROFESOR_comprobar_DNI_test(){
    global $PROFESOR_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar

    $test['error_obtenido']=$profesor->comprobar_DNI();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROFESOR_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00001';
    $test['error_esperado']  = 'DNI 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_DNI(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00010';
    $test['error_esperado']  = 'DNI 00010';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678A","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_DNI(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00011';
    $test['error_esperado']  = 'DNI 00011';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("123456789Z","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_DNI(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);
}

//funcion comprobar_NOMBREPROFESOR
//comprueba todos los errores que se encuentran en nombreprofesor
function PROFESOR_comprobar_NOMBREPROFESOR_test(){
    global $PROFESOR_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_NOMBREPROFESOR';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar

    $test['error_obtenido']=$profesor->comprobar_NOMBREPROFESOR();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROFESOR_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_NOMBREPROFESOR';
    $test['error'] = 'NOMBREPROFESOR 00001';
    $test['error_esperado']  = 'NOMBREPROFESOR 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","","apeprof","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_NOMBREPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_NOMBREPROFESOR';
    $test['error'] = 'NOMBREPROFESOR 00002';
    $test['error_esperado']  = 'NOMBREPROFESOR 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z",
        "aaaaaaaaaaaaaaaaaaaaaa","apeprof","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_NOMBREPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_NOMBREPROFESOR';
    $test['error'] = 'NOMBREPROFESOR 00003';
    $test['error_esperado']  = 'NOMBREPROFESOR 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","aa","apeprof","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_NOMBREPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);


    //00030
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_NOMBREPROFESOR';
    $test['error'] = 'NOMBREPROFESOR 00030';
    $test['error_esperado']  = 'NOMBREPROFESOR 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","_aa","apeprof","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_NOMBREPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

}

//funcion comprobar_APELLIDOSPROFESOR
//comprueba todos los errores que se encuentran en nombreprofesor
function PROFESOR_comprobar_APELLIDOSPROFESOR_test(){
    global $PROFESOR_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_APELLIDOSPROFESOR';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar

    $test['error_obtenido']=$profesor->comprobar_APELLIDOSPROFESOR();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROFESOR_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_APELLIDOSPROFESOR';
    $test['error'] = 'APELLIDOSPROFESOR 00001';
    $test['error_esperado']  = 'APELLIDOSPROFESOR 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_APELLIDOSPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_APELLIDOSPROFESOR';
    $test['error'] = 'APELLIDOSPROFESOR 00002';
    $test['error_esperado']  = 'APELLIDOSPROFESOR 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z",
        "nomprof","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_APELLIDOSPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_APELLIDOSPROFESOR';
    $test['error'] = 'APELLIDOSPROFESOR 00003';
    $test['error_esperado']  = 'APELLIDOSPROFESOR 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","aa","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_APELLIDOSPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);


    //00030
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_APELLIDOSPROFESOR';
    $test['error'] = 'APELLIDOSPROFESOR 00030';
    $test['error_esperado']  = 'APELLIDOSPROFESOR 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","_aa","areaprof",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_APELLIDOSPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

}

//funcion comprobar_AREAPROFESOR
//comprueba todos los errores que se encuentran en nombreprofesor
function PROFESOR_comprobar_AREAPROFESOR_test(){
    global $PROFESOR_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_AREAPROFESOR';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar

    $test['error_obtenido']=$profesor->comprobar_AREAPROFESOR();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROFESOR_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_AREAPROFESOR';
    $test['error'] = 'AREAPROFESOR 00001';
    $test['error_esperado']  = 'AREAPROFESOR 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_AREAPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_AREAPROFESOR';
    $test['error'] = 'AREAPROFESOR 00002';
    $test['error_esperado']  = 'AREAPROFESOR 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z",
        "nomprof","apeprof",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_AREAPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_AREAPROFESOR';
    $test['error'] = 'AREAPROFESOR 00003';
    $test['error_esperado']  = 'AREAPROFESOR 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","aa",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_AREAPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);


    //00030
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_AREAPROFESOR';
    $test['error'] = 'AREAPROFESOR 00030';
    $test['error_esperado']  = 'AREAPROFESOR 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","_aa",
        "depprof"); //profesor a comprobar
    $errores = $profesor->comprobar_AREAPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

}

//funcion comprobar_DEPARTAMENTOPROFESOR
//comprueba todos los errores que se encuentran en nombreprofesor
function PROFESOR_comprobar_DEPARTAMENTOPROFESOR_test(){
    global $PROFESOR_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DEPARTAMENTOPROFESOR';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        "depprof"); //profesor a comprobar

    $test['error_obtenido']=$profesor->comprobar_DEPARTAMENTOPROFESOR();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROFESOR_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DEPARTAMENTOPROFESOR';
    $test['error'] = 'DEPARTAMENTOPROFESOR 00001';
    $test['error_esperado']  = 'DEPARTAMENTOPROFESOR 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        ""); //profesor a comprobar
    $errores = $profesor->comprobar_DEPARTAMENTOPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DEPARTAMENTOPROFESOR';
    $test['error'] = 'DEPARTAMENTOPROFESOR 00002';
    $test['error_esperado']  = 'DEPARTAMENTOPROFESOR 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z",
        "nomprof","apeprof",
        "areaprof",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"); //profesor a comprobar
    $errores = $profesor->comprobar_DEPARTAMENTOPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DEPARTAMENTOPROFESOR';
    $test['error'] = 'DEPARTAMENTOPROFESOR 00003';
    $test['error_esperado']  = 'DEPARTAMENTOPROFESOR 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        "aa"); //profesor a comprobar
    $errores = $profesor->comprobar_DEPARTAMENTOPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);


    //00030
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROFESOR';
    $test['metodo'] = 'comprobar_DEPARTAMENTOPROFESOR';
    $test['error'] = 'DEPARTAMENTOPROFESOR 00030';
    $test['error_esperado']  = 'DEPARTAMENTOPROFESOR 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $profesor = new PROFESOR_Model("12345678Z","nomprof","apeprof","areaprof",
        "_aa"); //profesor a comprobar
    $errores = $profesor->comprobar_DEPARTAMENTOPROFESOR(); //errores encontrados

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

    array_push($PROFESOR_array_test,$test);

}



//se hacen las pruebas
PROFESOR_comprobar_atributos_test();
PROFESOR_comprobar_DNI_test();
PROFESOR_comprobar_NOMBREPROFESOR_test();
PROFESOR_comprobar_APELLIDOSPROFESOR_test();
PROFESOR_comprobar_AREAPROFESOR_test();
PROFESOR_comprobar_DEPARTAMENTOPROFESOR_test();

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
