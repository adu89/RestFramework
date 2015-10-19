<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2015-10-12
 * Time: 12:19 PM
 */

class User extends resource {

    public $Name;
    private $Password;
    public $Access;

    function __construct($row) {
        $this->Name = $row["UserName"];
        $this->Password = $row["UserPassword"];
        $this->Access = $row["UserAccess"];
    }

    static function findByUsername($username) {
        $database = new Database();
        $query = 'SELECT * FORM User WHERE UserName = :un';
        $varMap = array(':un' => $username);
        $result = $database->execute($query, $varMap);
        if(count($result) > 1) {
            throw new Exception ("Multiple username: $username found!");
        } else if (count($result) == 1) {
            return $result[0];
        }
        return false;
    }

    static function findById($id) {

    }

    static function findAll() {

    }

    function update () {

    }

    function delete () {

    }

} 