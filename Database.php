<?php

class Database 
{
    private $connection;

    const USER = 'example_user';

    const PASSWORD = 'example_password';

    public function __construct($config)
    {
        $dns = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO(
            $dns,
            self::USER,
            self::PASSWORD, 
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
}