<?php
// Autor: xa8678
// Fecha: 11/12/19
// Descripcion:
// Fichero que ejecuta todos los test
// Saca por pantalla el resultado de los test


session_start(); //solicito trabajar con la session
include '../Functions/Authentication.php';
if (!IsAuthenticated()){
    header('Location:../index.php');
}

include '../View/Header.php';

$contadorPruebas = 0; //variable que cuenta el numero de pruebas realizadas
$contadorErrores = 0; //variable que cuenta el numero de errores cometidos en las pruebas
?>
<div class="tests">
    <div class="globales">
        <h3>Pruebas Globales</h3>
        <table>
            <tr>
                <th>
                    Error testeado
                </th>
                <th>
                    Valor esperado
                </th>
                <th>
                    Valor obtenido
                </th>
                <th>
                    Resultado
                </th>
            </tr>
            <?php
            include '../test/GLOBAL_test.php';
            ?>
        </table>
    </div>
    <div class="unitarios">
        <h3>Pruebas Unitarias</h3>
            <table>
                <tr>
                    <th>
                        Entidad
                    </th>
                    <th>
                        Metodo
                    </th>
                    <th>
                        Error testeado
                    </th>
                    <th>
                        Valor esperado
                    </th>
                    <th>
                        Valor obtenido
                    </th>
                    <th>
                        Resultado
                    </th>
                </tr>
                <?php
                include '../test/CENTRO_test.php';
                include '../test/EDIFICIO_test.php';
                include '../test/ESPACIO_test.php';
                include '../test/PROF_ESPACIO_test.php';
                include '../test/PROF_TITULACION_test.php';
                include '../test/PROFESOR_test.php';
                include '../test/TITULACION_test.php';
                include '../test/USUARIOS_test.php';
                ?>
            </table>
    </div>
    <div class="validacion">
        <h3>Pruebas Validacion</h3>
        <table>
            <tr>
                <th>
                    Entidad
                </th>
                <th>
                    Metodo
                </th>
                <th>
                    Error testeado
                </th>
                <th>
                    Valor esperado
                </th>
                <th>
                    Valor obtenido
                </th>
                <th>
                    Resultado
                </th>
            </tr>
            <?php
                include '../test/CENTRO_VALIDACION_test.php';
                include '../test/EDIFICIO_VALIDACION_test.php';
                include '../test/ESPACIO_VALIDACION_test.php';
                include '../test/PROF_ESPACIO_VALIDACION_test.php';
                include '../test/PROF_TITULACION_VALIDACION_test.php';
                include '../test/PROFESOR_VALIDACION_test.php';
                include '../test/TITULACION_VALIDACION_test.php';
                include '../test/USUARIOS_VALIDACION_test.php';
            ?>
        </table>
    </div>


    <div class="contador">
        <h3>
        <?php echo "RESUMEN" ?>
        <br>
        <?php echo "Número pruebas : " . $contadorPruebas . " - " . "Número errores : " . $contadorErrores; ?>
        </h3>
    </div>
</div>
<?php
include '../View/Footer.php'
?>

