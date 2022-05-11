<?php
    require_once 'config/config.php';
    require_once 'libraries/FormValidator.php';
    require_once 'libraries/Base.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Core.php';
    require_once 'helpers/url_helper.php';
    require_once 'helpers/mis_helpers.php';


    

    spl_autoload_register(function($nameClass){
        require_once 'libraries/' . '$nameClass' . '.php';
    });
?>