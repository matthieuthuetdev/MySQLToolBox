<?php

namespace Matthieuthuetdev\MySQLToolBox;

use PDO;

class MySQLToolBox
{
    private $connection;

    public function __construct(PDO $pdoInstance)
    {
        $this->connection = $pdoInstance;
    }

    public function exportDatabase():void
    {
        $request = "SHOW TABLES";
        $rq = $this->connection->prepare($request);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_COLUMN);
        $data = [];
        $data = 
        
    }
}
