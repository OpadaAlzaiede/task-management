<?php

namespace core;

use PDO;

class Database {

    public $connection;
    public $stmt;

    public function __construct($config) {

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {

        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);

        return $this;
    }

    public function get() {

        return $this->stmt->fetchAll();
    }

    public function find() {

        return $this->stmt->fetch();
    }

    public function findOrFail() {

        $result = $this->find();

        if(!$result) abort();

        return $result;
    }
}
