<?php

namespace Core;

class Database
{

    private \PDOStatement $statement ;
    private \PDO $connection ;


    public function __construct()
    {
        try {
            $config = "mysql:host=" . CONFIGDB['host'] . ';' . 'dbname=' . CONFIGDB['dbname'];
            $this->connection = new \PDO($config, CONFIGDB['login'], CONFIGDB['password'], CONFIGDB['const']);
        } catch (\PDOException $error) {
            echo $error->getmessage();
            exit();
        }
    }

    public function query($query,$data = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($data);
    }

    public function GetResult() {
        return $this->statement->fetchAll();
    }

//    public function FindorFail($query,$data = []) {
//        $this->query($query,$data);
//        return $this->GetResult();
//
//    }




}