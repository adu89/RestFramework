<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2015-09-23
     * Time: 6:37 PM
     */
    /*
    echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';
    */

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function applicationAutoload($class)
    {
        $file = "application/$class.php";
        if (!file_exists($file)) {
            return false;
        }
        include $file;
    }

    spl_autoload_register('applicationAutoload');

    function modelAutoload($class)
    {
        $file = "model/$class.php";
        if (!file_exists($file)) {
            return false;
        }
        include $file;
    }

    spl_autoload_register('modelAutoload');

    $application = new Application();

    $application->run();

    /*
    function controllersAutoload($class)
    {
        $file = "controllers/$class.php";
        if (!file_exists($file)) {
            return false;
        }
        include $file;
    }

    function modelAutoload($class)
    {
        $file = "model/$class.php";
        if (!file_exists($file)) {
            return false;
        }
        include $file;
    }


    spl_autoload_register('applicationAutoload');
    spl_autoload_register('controllersAutoload');
    */


    //new MainController(1);

    //$application = new Application();
    //$application->run();
