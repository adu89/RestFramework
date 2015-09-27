<?php

    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2015-09-27
     * Time: 2:01 AM
     */
    class Database
    {
        private $username;
        private $password;

        function __construct()
        {
            include '../settings/DatabaseSettings.php';
            $this->username = $DatabaseSettings["username"];
            $this->password = $DatabaseSettings["password"];

        }

        function execute($query, $varMap) {
            if($connection = $this->connect()) {
                $preparedStatement = $connection->prepare($query);
                $preparedStatement->execute($varMap);
                $data = array();
                while($line = $preparedStatement->fetch()) {
                    $data[] = $line;
                }
                $connection->close();
            }
        }

        private function connect() {
            try {
                $this->connection = new PDO('mysql:host=localhost;dbname=myDatabase', $username, $password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return true;
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
                return false;
            }
        }

    }