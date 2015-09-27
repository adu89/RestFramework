<?php

    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2015-09-27
     * Time: 2:01 AM
     */
    class Database
    {
        private $Username;
        private $Password;

        function __construct()
        {
            include '../settings/DatabaseSettings.php';
            $this->Username = $DatabaseSettings["username"];
            $this->Password = $DatabaseSettings["password"];

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
                $this->connection = new PDO('mysql:host=localhost;dbname=myDatabase', $this->Username, $this->Password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return true;
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
                return false;
            }
        }

    }