<?php

class Connection
{
    protected static $instance;
    protected $pdo;

    protected function __construct()
    {
        $dsn = 'mysql:dbname=library;host=localhost';
        $login = 'primak';
        $password = '05101990';
        $this->pdo = new PDO($dsn, $login, $password);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function query($sql, $param = array())
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute((array)$param);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($filename, $bookName, $authorName)
    {
        $this->query("INSERT INTO `books` (`filename`, `bookName`, `authorName`) VALUES ('$filename', '$bookName', '$authorName')");
    }

    public function getAll()
    {
        return $result = $this->query('SELECT `filename`, `bookName`, `authorName` FROM `books`');
    }

    public function getPaginat($start, $stop)
    {

        return $result = $this->query("SELECT * FROM `books` LIMIT $start, $stop");

    }
}
