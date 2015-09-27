<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-09-23
 * Time: 11:05 PM
 */

    class DataController extends BaseController {
        function __construct($index) {
            parent::__construct($index);
        }

        function root() {
            echo 'specify data';
        }

        function students() {
            new StudentController($this->getIndex() + 1);
        }
    }