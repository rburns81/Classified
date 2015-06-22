<?php
namespace classified;
//require 'ConnectionSettings.php';
class Database
{
    public $host;
    public $port;
    public $name;
    public $charset;
    public $username;
    public $password;

    public function __construct()
    {
        $this->host = ConnectionSettings::HOST;
        $this->port = ConnectionSettings::PORT;
        $this->name = ConnectionSettings::NAME;
        $this->charset = ConnectionSettings::CHARSET;
        $this->username = ConnectionSettings::USERNAME;
        $this->password = ConnectionSettings::PASSWORD;
    }

    public function makeDbConn()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->name;port=$this->port;charset=$this->charset";
            $pdo = new \PDO($dsn, $this->username, $this->password);
            return $pdo;
        } catch (\PDOException $e) {
            echo 'Database connection failed';
            echo $e->getMessage();
            exit;
        }
    }




}