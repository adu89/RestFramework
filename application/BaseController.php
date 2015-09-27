<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-09-23
 * Time: 6:38 PM
 */

    abstract class BaseController {

        private $Index;
        private $Path;
        private $Method;

        function __construct($index) {
            $this->Index = $index;
            $function = $this->getPathItem($this->Index);
            if($function != '') {
               if(method_exists($this, $function)) {
                   $this->$function();
               } else {
                   if(method_exists($this, 'wildcard'))
                        $this->wildcard();
                   else $this->error();
               }
            }
            else $this->index($this->Index + 1);
        }

        function getPathItem($index) {
            $pathPieces = explode('/', substr($this->getPath(),1));
            if(isset($pathPieces[$index]))
                return $pathPieces[$index];
            else return '';
        }

        function getMethod() {
            return $_SERVER['REQUEST_METHOD'];
        }

        function getPath() {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }

        function getIndex() {
            return $this->Index;
        }

        abstract function root();

        function error() {
            echo 'The resource requested was not found 404 error';
        }

    }