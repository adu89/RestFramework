<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-10-11
 * Time: 10:26 PM
 */

class controller {

    function __construct($globals) {
        foreach($globals as $var => $global) {
            $this->{$var} = $global;
        }
    }

    function getTreeMenu() {
        $menu = new Menu ();
        return $menu->getTreeMenu();
    }

    function render ($data) {
        $class = get_class($this);
        require_once 'twig/lib/Twig/Autoloader.php';
        Twig_Autoloader::register();
        $adminLoader = new Twig_Loader_Filesystem('assets/admin/views/');
        $adminTwig = new Twig_Environment($adminLoader, array('debug' => true));
        $adminTwig->addExtension(new Twig_Extension_Debug());
        $template = $adminTwig->loadTemplate("$class.twig");
        echo $template->render($data);
    }

} 