<?php

require ('functions.php');

//require('router.php');


// connect to MySQL database
// initialize PDO

// connection string
$dsn = 'mysql:host=localhost;port=3306;user=root;password=mysql;dbname=myapp;charset=utf8mb4';
// instance of connection class
$pdo = new PDO($dsn);
// prepare query for printing from MySQL
$statement = $pdo->prepare("SELECT * FROM posts");
// execute that query
$statement->execute();


// fetch all the result
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// loop results displaying results
foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}