<?php
    
    define('app_path', dirname(dirname(__FILE__)));     //Ruta de la app
    define('BASE_PATH', realpath(dirname(__FILE__) . '/../..').'/'); //BASE_PATH del proyecto
    define('base_url', 'http://localhost/panareport/'); //Ruta de la url

    define('site_name', 'PanaCIM | PanaReport');       //Nombre del sitio

    //Configuración de acceso a la base de datos
    define ('DB_HOST', 'localhost');
    define ('DB_USER', 'root');
    define ('DB_PASSWORD', '');
    define ('DB_NAME', 'coronango');

    // //API KEY FOR GOOGLE MAPS
    // define('API_KEY', 'AIzaSyCXdfs4O9ICSyuo_pqVijM9AvwcqhUQuBw');

    //Zona horaria
    date_default_timezone_set ('America/Mexico_City');

    session_start();//configuracion de sesiones
?>
