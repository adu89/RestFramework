<?php

    class login extends controller {
        function __construct () {
            if(!isset($_SESSION["name"])) {
                header("location: dashboard");
                echo 'hey';
            }
            $this->render(array());
        }
    }