<?php

    class Application
    {

        private $offset = 1;

        function __construct()
        {

        }

        function run()
        {
            $existenceArray = array();
            $pathArray = $this->getPathArray();
            $globals = array();
            $root = $_SERVER['DOCUMENT_ROOT'] . "/restfulController/controllers/";
            $itemCount = count($pathArray);
            $lasItemPosition = $itemCount - 1;

            for ($i = 0; $i < $itemCount; $i++) {
                $tempRoot = $root . $pathArray[$i];
                if($i < $lasItemPosition) {
                    if(file_exists($tempRoot)) {
                        $root = $tempRoot;
                        $root .= '/';
                        $existenceArray[] = $i;
                    } else {
                        $globals[substr($pathArray[$i-1],0,-1)] = $pathArray[$i];
                    }
                } else {
                    $tempRoot .= '.php';
                    if(!file_exists($tempRoot)) {
                        $root = substr($root, 0, -1) . '.php';
                        if(file_exists($root) && in_array($pathArray[$i-1], $existenceArray)) {
                            include $root;
                            $globals[substr($pathArray[$i-1],0,-1)] = $pathArray[$i];
                            return new $pathArray[$i-1]($globals);
                        } else {
                            return new Error();
                        }

                    } else {
                        $root = $tempRoot;
                        include $root;
                        return new $pathArray[$i]($globals);
                    }
                }
            }
        }

        private function getPath()
        {
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            return $path;
        }

        function getPathArray()
        {
            return array_slice(explode('/', substr($this->getPath(), 1)), $this->offset);
        }

    }