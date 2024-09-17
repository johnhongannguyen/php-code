<?php

// Connection to the database, and execute a query
class Database {
    public $connection;
    public function __construct($config,$username = 'root', $password= 'mysql') {

        // connection string
        $dsn = 'mysql:' . http_build_query($config,'',';'); //example.com?host=localhost&port=3306&dbname=myapp

        // instance of connection class
        $this-> connection = new PDO($dsn,$username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function query($query, $params=[]) {
        // initialize PDO


        // prepare query for printing from MySQL
        $statement = $this->connection->prepare($query);
        // execute that query
        $statement->execute($params);
        // fetch all the result
        return $statement;


    }
}
