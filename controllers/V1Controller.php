<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-09-23
 * Time: 10:58 PM
 */

    class V1Controller extends BaseController {
        function __construct($index) {
            parent::__construct($index);
        }

        function root() {
            echo 'Welcome to version 1 of the api!';
        }

        function data() {
            new DataController($this->getIndex() + 1);
        }

        function wildcard() {

        }
    }