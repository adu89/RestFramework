<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-10-11
 * Time: 11:10 PM
 */

class admin_controller extends controller {
    function __construct() {

    }

    function getMenu() {
        return $this->getTreeMenu()["admin"];
    }
} 