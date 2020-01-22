<?php
//script para cargar el backup de la base de datos
//creado el 08/12
//creado por xa8678


//creamos un PDO (conecion entre PHP y DB server)
$db = new PDO('mysql:host=localhost;dbname=IU2018', 'iu2018', 'pass2018');

//se escoge el script
$sql = file_get_contents('IU2018backup.sql');

//se ejecuta el script
$qr = $db->exec($sql);


