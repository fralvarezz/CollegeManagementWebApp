<?php
//Autor: xa8678
//Script para guardar una copia de la bd
//Hecho el 08/12

backup_tables('localhost','iu2018','pass2018','IU2018'); //se llama a la funcion

//funcion backup_tables
//guarda las tablas escogidas en un script sql
function backup_tables($host,$user,$pass,$name,$tables = '*')
{

    include_once '../Model/Access_DB.php';
    $mysqli = ConnectDB();

    //si se quieren todas las tablas se guardan en un array
    if($tables == '*')
    {
        $tables = array();
        $result = $mysqli->query('SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    //si no se guardan solo las tablas necesarias
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $return=""; //string donde se guarda el script
    //cycle through

    //para cada tabla que se quiera guardar
    foreach($tables as $table)
    {

        $result = $mysqli->query('SELECT * FROM '.$table); //se escogen todos los datos
        $num_fields = mysqli_num_fields($result); //se cuentan el numero de campos

        $return.= 'DROP TABLE '.$table.';'; //se concatena DROP TABLE
        $row2 = mysqli_fetch_row($mysqli->query('SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";

        for ($i = 0; $i < $num_fields; $i++) //para cada campo se guarda la informacion del campo
        {
            while($row = mysqli_fetch_row($result)) //mientras haya mas filas se añaden al script
            {
                $return.= 'INSERT INTO '.$table.' VALUES('; //los valores de las filas
                for($j=0; $j < $num_fields; $j++)
                {
                    $row[$j] = addslashes($row[$j]);
                    //$row[$j] = preg_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j < ($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }

    $handle = fopen('IU2018backup.sql','w+'); //escogemos el fichero en el que se quiere guardar el script y le damos permisos
    fwrite($handle,$return); //se escribe el fichero
    fclose($handle); //se cierra el fichero
}
