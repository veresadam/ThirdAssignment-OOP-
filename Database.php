<?php

class Database
{
    private $connection;
    private $dsn = 'mysql:dbname=QuizAssignment';
    private $user = 'adamveres';
    private $password = '';

    public function __construct()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Caught error: " . $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->connection;
    }

}