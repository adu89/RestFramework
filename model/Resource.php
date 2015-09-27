<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-09-23
 * Time: 11:51 PM
 */

    abstract class Resource {

        function __construct () {

        }

        abstract static function findById($id);
        abstract static function findAll();
        abstract function update();
        abstract function delete();
    }