<?php

require 'functions.php';
require 'Database.php';
$config = require('config.php');

$id = $_GET['id'];

$query = 'SELECT * FROM posts WHERE id = :id;';

try {
    $database = new Database($config);
    $posts = $database->query($query, [
        'id' => $id
    ])->fetch();
    dd($posts);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

require 'router.php';