<?php

// Autor: xa8678
// Fecha: 12/12/19
// Descripcion: Fichero que realiza las pruebas globales de la aplicacion
// Fichero de test Global
// Saca por pantalla el resultado de los test

include_once '../Model/Access_DB.php';

$GLOBAL_test = array(); //array principal del test

//funcion que comprueba que un usuario se pueda conectar a la base de datos
function GLOBAL_connect_db_test(){
    $mysqli=ConnectDB();

    global $GLOBAL_test; //array principal del test

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Usuario y contraseña incorrectos';
    $exists_db_test['valor_esperado'] = 'Usuario y contraseña incorrectos';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';
    $res = $mysqli->query("SHOW GRANTS FOR 'falso'@'localhost'");
    if (!$res) { //si existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'Usuario y contraseña incorrectos';
    }else { //si no existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'Usuario y contraseña correctos';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    //se introduce el resultado en el array global
    array_push($GLOBAL_test,$exists_db_test); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar
    $exists_db_test['error_testeado'] = 'Usuario y contraseña correctos';
    $exists_db_test['valor_esperado'] = 'Usuario y contraseña correctos';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //comprobamos que existe el usuario
    $res = $mysqli->query("SHOW GRANTS FOR 'iu2018'@'localhost'");
    if (!$res) { //si existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'Usuario y contraseña incorrectos';
    }else { //si no existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'Usuario y contraseña correctos';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    //eliminamos el usuario

    //se introduce el resultado en el array global
    array_push($GLOBAL_test,$exists_db_test); //array donde meteremos los errores que vamos a encontrar

}

//funcion que comprueba que exista la base de datos
function GLOBAL_exists_db_test(){

    //variable de conexion al servidor mysql
    $mysqli = ConnectDB();
    global $GLOBAL_test; //array principal del test

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe la base de datos';
    $exists_db_test['valor_esperado'] = 'Existe la base de datos';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    $db = 'IU2018'; //nombre de la base de datos a comprobar
    if (mysqli_select_db($mysqli, $db)) { //si existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'Existe la base de datos';
    }else { //si no existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'No existe la base de datos';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    //se introduce el resultado en el array global
    array_push($GLOBAL_test,$exists_db_test); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'No existe la base de datos';
    $exists_db_test['valor_esperado'] = 'No existe la base de datos';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    $db = 'FalsaDB'; //nombre de la base de datos a comprobar
    if (mysqli_select_db($mysqli, $db)) { //si existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'Existe la base de datos';
    }else { //si no existe la base de datos, se especifica en el array
        $exists_db_test['valor_obtenido'] = 'No existe la base de datos';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    //se introduce el resultado en el array global
    array_push($GLOBAL_test,$exists_db_test);

}

//funcion que comprueba que exista la base de datos
function GLOBAL_exists_table(){

    //variable de conexion al servidor mysql
    $mysqli = ConnectDB();
    global $GLOBAL_test; //array principal del test

    //guardamos todas las tablas de la base de datos
    $tablas = array_column(mysqli_fetch_all($mysqli->query('SHOW TABLES')),0);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe CENTRO';
    $exists_db_test['valor_esperado'] = 'Existe CENTRO';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla CENTRO se encontraba en la base de datos se guarda que existe
    if(in_array('CENTRO',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe CENTRO';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe CENTRO';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe EDIFICIO';
    $exists_db_test['valor_esperado'] = 'Existe EDIFICIO';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla EDIFICIO se encontraba en la base de datos se guarda que existe
    if(in_array('EDIFICIO',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe EDIFICIO';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe EDIFICIO';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe ESPACIO';
    $exists_db_test['valor_esperado'] = 'Existe ESPACIO';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla ESPACIO se encontraba en la base de datos se guarda que existe
    if(in_array('ESPACIO',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe ESPACIO';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe ESPACIO';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe PROF_ESPACIO';
    $exists_db_test['valor_esperado'] = 'Existe PROF_ESPACIO';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla PROF_ESPACIO se encontraba en la base de datos se guarda que existe
    if(in_array('PROF_ESPACIO',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe PROF_ESPACIO';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe PROF_ESPACIO';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe PROF_TITULACION';
    $exists_db_test['valor_esperado'] = 'Existe PROF_TITULACION';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla PROF_TITULACION se encontraba en la base de datos se guarda que existe
    if(in_array('PROF_TITULACION',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe PROF_TITULACION';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe PROF_TITULACION';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe PROFESOR';
    $exists_db_test['valor_esperado'] = 'Existe PROFESOR';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla PROFESOR se encontraba en la base de datos se guarda que existe
    if(in_array('PROFESOR',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe PROFESOR';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe PROFESOR';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe TITULACION';
    $exists_db_test['valor_esperado'] = 'Existe TITULACION';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla TITULACION se encontraba en la base de datos se guarda que existe
    if(in_array('TITULACION',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe TITULACION';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe TITULACION';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'Existe USUARIOS';
    $exists_db_test['valor_esperado'] = 'Existe USUARIOS';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla USUARIOS se encontraba en la base de datos se guarda que existe
    if(in_array('USUARIOS',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe USUARIOS';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe USUARIOS';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);

    $exists_db_test = array(); //array donde meteremos los errores que vamos a encontrar

    $exists_db_test['error_testeado'] = 'No existe tabla_falsa';
    $exists_db_test['valor_esperado'] = 'No existe tabla_falsa';
    $exists_db_test['valor_obtenido'] = '';
    $exists_db_test['resultado']  = '';

    //si la tabla tabla_falsa se encontraba en la base de datos se guarda que existe
    if(in_array('tabla_falsa',$tablas)){
        $exists_db_test['valor_obtenido'] = 'Existe tabla_falsa';
    }
    else{ //si no, se guarda que no existe
        $exists_db_test['valor_obtenido'] = 'No existe tabla_falsa';
    }

    if($exists_db_test['valor_esperado'] == $exists_db_test['valor_obtenido']){ //si el valor esperado y el obtenido son iguales el resultado es OK
        $exists_db_test['resultado'] = 'OK';
    }
    else{
        $exists_db_test['resultado'] = 'FALSE'; //si el valor esperado y el obtenido no son iguales el resultado es false
    }

    array_push($GLOBAL_test,$exists_db_test);
}
    GLOBAL_connect_db_test();
    GLOBAL_exists_db_test();
    GLOBAL_exists_table();


?>
        <?php
        foreach ($GLOBAL_test as $test) //para cada error se muestra la informacion
        {
            $contadorPruebas++;
            ?>
            <tr>
                <td>
                    <?php echo $test['error_testeado']; ?>
                </td>
                <td>
                    <?php echo $test['valor_esperado']; ?>
                </td>
                <td>
                    <?php echo $test['valor_obtenido']; ?>
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
