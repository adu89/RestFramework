<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-09-23
 * Time: 6:37 PM
 */

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function applicationAutoload($class) {
        $file = "application/$class.php";
        if ( ! file_exists($file))
        {
            return false;
        }
        include $file;
    }

    function controllersAutoload($class) {
        $file = "controllers/$class.php";
        if ( ! file_exists($file))
        {
            return false;
        }
        include $file;
    }

    function modelAutoload($class) {
        $file = "model/$class.php";
        if ( ! file_exists($file))
        {
            return false;
        }
        include $file;
    }

    spl_autoload_register('applicationAutoload');
    spl_autoload_register('controllersAutoload');
    spl_autoload_register('modelAutoload');

    new MainController(1);

