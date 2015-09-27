<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-09-23
 * Time: 10:52 PM
 */

        class ApiController extends BaseController {
        function __construct($index) {
            parent::__construct($index);
        }

        function root() {
            echo 'Welcome to the api, please specify api version to continue';
        }

        function v1() {
            new V1Controller($this->getIndex() + 1);
        }

        function wildcard() {

        }

    }