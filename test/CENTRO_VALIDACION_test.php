<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de validacion de atributos de la entidad CENTRO
// Incluye CENTRO_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';

//prepara el test
$CENTRO_array_test = array(); //array principal del test

//funcion comprobar_atributos
//comprueba todos los errores que se encuentran en los atributos
function CENTRO_comprobar_atributos_test(){
    global $CENTRO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $test['error_obtenido']=$centro->comprobar_atributos();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($CENTRO_array_test,$test);


    //dos errores en atributos
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'CODCENTRO 00001,CODEDIFICIO 00001';
    $test['error_esperado']  = 'CODCENTRO 00001,CODEDIFICIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("","","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_atributos(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);
}

//funcion comprobar_CODCENTRO
//comprueba todos los errores que se encuentran en codcentro
function CENTRO_comprobar_CODCENTRO_test(){
    global $CENTRO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODCENTRO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $test['error_obtenido']=$centro->comprobar_CODCENTRO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($CENTRO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODCENTRO';
    $test['error'] = 'CODCENTRO 00001';
    $test['error_esperado']  = 'CODCENTRO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODCENTRO';
    $test['error'] = 'CODCENTRO 00002';
    $test['error_esperado']  = 'CODCENTRO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODCENTRO';
    $test['error'] = 'CODCENTRO 00003';
    $test['error_esperado']  = 'CODCENTRO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("aa","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODCENTRO';
    $test['error'] = 'CODCENTRO 00040';
    $test['error_esperado']  = 'CODCENTRO 00040';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("_centro","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);
}

//funcion comprobar_CODEDIFICIO
//comprueba todos los errores que se encuentran en codcentro
function CENTRO_comprobar_CODEDIFICIO_test(){
    global $CENTRO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $test['error_obtenido']=$centro->comprobar_CODEDIFICIO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($CENTRO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00001';
    $test['error_esperado']  = 'CODEDIFICIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00002';
    $test['error_esperado']  = 'CODEDIFICIO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00003';
    $test['error_esperado']  = 'CODEDIFICIO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","aa","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_CODEDIFICIO';
    $test['error'] = 'CODEDIFICIO 00040';
    $test['error_esperado']  = 'CODEDIFICIO 00040';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","_codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_CODEDIFICIO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);
}

//funcion comprobar_NOMBRECENTRO
//comprueba todos los errores que se encuentran en codcentro
function CENTRO_comprobar_NOMBRECENTRO_test(){
    global $CENTRO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_NOMBRECENTRO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $test['error_obtenido']=$centro->comprobar_NOMBRECENTRO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($CENTRO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_NOMBRECENTRO';
    $test['error'] = 'NOMBRECENTRO 00001';
    $test['error_esperado']  = 'NOMBRECENTRO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_NOMBRECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_NOMBRECENTRO';
    $test['error'] = 'NOMBRECENTRO 00002';
    $test['error_esperado']  = 'NOMBRECENTRO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_NOMBRECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_NOMBRECENTRO';
    $test['error'] = 'NOMBRECENTRO 00003';
    $test['error_esperado']  = 'NOMBRECENTRO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","aa","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_NOMBRECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_NOMBRECENTRO';
    $test['error'] = 'NOMBRECENTRO 00030';
    $test['error_esperado']  = 'NOMBRECENTRO 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","aaa9","direccioncen","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_NOMBRECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);
}

//funcion comprobar_DIRECCIONCENTRO
//comprueba todos los errores que se encuentran en codcentro
function CENTRO_comprobar_DIRECCIONCENTRO_test(){
    global $CENTRO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_DIRECCIONCENTRO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $test['error_obtenido']=$centro->comprobar_DIRECCIONCENTRO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($CENTRO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_DIRECCIONCENTRO';
    $test['error'] = 'DIRECCIONCENTRO 00001';
    $test['error_esperado']  = 'DIRECCIONCENTRO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nomcen","","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_DIRECCIONCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_DIRECCIONCENTRO';
    $test['error'] = 'DIRECCIONCENTRO 00002';
    $test['error_esperado']  = 'DIRECCIONCENTRO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi", "nomcen",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_DIRECCIONCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_DIRECCIONCENTRO';
    $test['error'] = 'DIRECCIONCENTRO 00003';
    $test['error_esperado']  = 'DIRECCIONCENTRO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nomcen","aa","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_DIRECCIONCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_DIRECCIONCENTRO';
    $test['error'] = 'DIRECCIONCENTRO 00050';
    $test['error_esperado']  = 'DIRECCIONCENTRO 00050';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nomcen","direccioncen*","responsablecen"); //centro a comprobar

    $errores = $centro->comprobar_DIRECCIONCENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);
}

//funcion comprobar_RESPONSABLECENTRO
//comprueba todos los errores que se encuentran en codcentro
function CENTRO_comprobar_RESPONSABLECENTRO_test(){
    global $CENTRO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_RESPONSABLECENTRO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nombrecen","direccioncen","responsablecen"); //centro a comprobar

    $test['error_obtenido']=$centro->comprobar_RESPONSABLECENTRO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($CENTRO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_RESPONSABLECENTRO';
    $test['error'] = 'RESPONSABLECENTRO 00001';
    $test['error_esperado']  = 'RESPONSABLECENTRO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nomcen","direccioncen",""); //centro a comprobar

    $errores = $centro->comprobar_RESPONSABLECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_RESPONSABLECENTRO';
    $test['error'] = 'RESPONSABLECENTRO 00002';
    $test['error_esperado']  = 'RESPONSABLECENTRO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi", "nomcen", "direccioncen",
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"); //centro a comprobar

    $errores = $centro->comprobar_RESPONSABLECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_RESPONSABLECENTRO';
    $test['error'] = 'RESPONSABLECENTRO 00003';
    $test['error_esperado']  = 'RESPONSABLECENTRO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nomcen","direccioncen","aa"); //centro a comprobar

    $errores = $centro->comprobar_RESPONSABLECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'CENTRO';
    $test['metodo'] = 'comprobar_RESPONSABLECENTRO';
    $test['error'] = 'RESPONSABLECENTRO 00030';
    $test['error_esperado']  = 'RESPONSABLECENTRO 00030';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $centro = new CENTRO_Model("codcen","codedi","nomcen","direccioncen","aaa9"); //centro a comprobar

    $errores = $centro->comprobar_RESPONSABLECENTRO(); //errores encontrados

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

    array_push($CENTRO_array_test,$test);
}



//se hacen las pruebas
CENTRO_comprobar_atributos_test();
CENTRO_comprobar_CODCENTRO_test();
CENTRO_comprobar_CODEDIFICIO_test();
CENTRO_comprobar_NOMBRECENTRO_test();
CENTRO_comprobar_DIRECCIONCENTRO_test();
CENTRO_comprobar_RESPONSABLECENTRO_test();
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
