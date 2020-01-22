<?php
// Autor: xa8678
// Fecha: 07/12/19
// Descripcion:
// Ficerho de test de validacion de atributos de la entidad PROF_ESPACIO
// Incluye PROF_ESPACIO_Model.php
// Saca por pantalla el resultado de los test
//include '../View/Header.php'; //header necesita los strings
//include '../Model/saveDB.php';

//prepara el test
$PROF_ESPACIO_array_test = array(); //array principal del test

//funcion comprobar_atributos
//comprueba todos los errores que se encuentran en los atributos
function PROF_ESPACIO_comprobar_atributos_test(){
    global $PROF_ESPACIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("40650391F","codes"); //prof_espacio a comprobar

    $test['error_obtenido']=$prof_espacio->comprobar_atributos();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROF_ESPACIO_array_test,$test);


    //dos errores en atributos
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_atributos';
    $test['error'] = 'CODESPACIO 00001,DNI 00001';
    $test['error_esperado']  = 'CODESPACIO 00001,DNI 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("",""); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_atributos(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);
}

//funcion comprobar_DNI
//comprueba todos los errores que se encuentran en dni
function PROF_ESPACIO_comprobar_DNI_test(){
    global $PROF_ESPACIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("12345678Z","codes"); //prof_espacio a comprobar

    $test['error_obtenido']=$prof_espacio->comprobar_DNI();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROF_ESPACIO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00001';
    $test['error_esperado']  = 'DNI 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("","codes"); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_DNI(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00010';
    $test['error_esperado']  = 'DNI 00010';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("12345678A","codes"); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_DNI(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_DNI';
    $test['error'] = 'DNI 00011';
    $test['error_esperado']  = 'DNI 00011';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("123456789","CODES"); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_DNI(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);
}

//funcion comprobar_CODESPACIO
//comprueba todos los errores que se encuentran en dni
function PROF_ESPACIO_comprobar_CODESPACIO_test(){
    global $PROF_ESPACIO_array_test;
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_CODESPACIO';
    $test['error'] = 'true';
    $test['error_esperado']  = 'true';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("12345678Z","codes"); //prof_espacio a comprobar

    $test['error_obtenido']=$prof_espacio->comprobar_CODESPACIO();
    if($test['error_obtenido']==true){ //si dio true, metemos el string true
        $test['error_obtenido']='true';
    }

    if($test['error_obtenido'] == $test['error_esperado']){ //si el error obtenido es el esperado, el resultado es OK
        $test['resultado'] = 'OK';
    }
    else{ //si no el resultado es false
        $test['resultado'] = 'FALSE';
    }

    array_push($PROF_ESPACIO_array_test,$test);

    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_CODESPACIO';
    $test['error'] = 'CODESPACIO 00001';
    $test['error_esperado']  = 'CODESPACIO 00001';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("12345678Z",""); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_CODESPACIO(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);

    //00002
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_CODESPACIO';
    $test['error'] = 'CODESPACIO 00002';
    $test['error_esperado']  = 'CODESPACIO 00002';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("12345678Z","aaaaaaaaaaaaaaa"); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_CODESPACIO(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);

    //00003
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_CODESPACIO';
    $test['error'] = 'CODESPACIO 00003';
    $test['error_esperado']  = 'CODESPACIO 00003';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("12345678Z","aa"); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_CODESPACIO(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);

    //00040
    //errores
    $test = array(); //array donde meteremos los errores que vamos a encontrar

    $test['entidad'] = 'PROF_ESPACIO';
    $test['metodo'] = 'comprobar_CODESPACIO';
    $test['error'] = 'CODESPACIO 00040';
    $test['error_esperado']  = 'CODESPACIO 00040';
    $test['error_obtenido'] = '';
    $test['resultado'] = '';

    $prof_espacio = new PROF_ESPACIO_Model("12345678Z","_codes"); //prof_espacio a comprobar

    $errores = $prof_espacio->comprobar_CODESPACIO(); //errores encontrados

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

    array_push($PROF_ESPACIO_array_test,$test);
}




//se hacen las pruebas
PROF_ESPACIO_comprobar_atributos_test();
PROF_ESPACIO_comprobar_DNI_test();
PROF_ESPACIO_comprobar_CODESPACIO_test();

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
