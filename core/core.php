<?php
 @session_start();
//nucleo de la aplicacion

/*constantes de conexion*/

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','fundodon_5065e');

//rutas
define('HTML_DIR','html');
define('JS_RUTA','views/app/js');


//clases
require_once 'core/model/Conexion.php';
require_once 'core/model/Usuario.php';
require_once 'core/model/Select.php';
require_once 'core/model/Orden.php';
require_once 'core/model/Estadistica.php';
require_once 'core/model/EstadisticaOperador.php';
require_once 'core/model/TrabajosCron.php';
require_once 'core/model/Comunes.php';


require_once 'core/bin/functions/Encrypt.php';
