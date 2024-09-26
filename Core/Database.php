<?php


namespace Core;

use PDO;


// Connection to the database, and execute a query
class Database {
    public $connection;
    public $statement;
    public function __construct($config,$username = 'root', $password= 'mysql') {

        // connection string
        $dsn = 'mysql:' . http_build_query($config,'',';'); //example.com?host=localhost&port=3306&dbname=myapp

        // instance of connection class
        $this-> connection = new PDO($dsn,$username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function query($query, $params=[]) {
        // prepare query for printing from MySQL
        $this->statement = $this->connection->prepare($query);
        // execute that query
        $this->statement->execute($params);
        // fetch all the result
        return $this;
    }

    public function get(){
        return $this->statement->fetchAll();
    }

    public function find(){
        // statement-> fetch()
        return $this->statement->fetch();

    }
    public function findOrFail(){
        $result = $this->find();

        if(! $result){
            abort();

        }
        return $result;
    }
}
