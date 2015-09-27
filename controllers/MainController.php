<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-09-23
 * Time: 12:58 PM
 */

    class MainController extends BaseController {

        function __construct($index) {
            parent::__construct($index);
        }

        function root () {
            echo 'index';
        }

        function api() {
            new ApiController($this->getIndex() + 1);
        }
    }