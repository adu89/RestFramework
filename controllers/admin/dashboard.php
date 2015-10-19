<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-10-18
 * Time: 8:35 PM
 */

class Dashboard extends controller {
    function __construct($globals) {
        parent::__construct($globals);
        $this->render(array('Menu'=> $this->getTreeMenu()["admin"]["Submenu"]));
    }
} 