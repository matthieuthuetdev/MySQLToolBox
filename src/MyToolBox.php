<?php

namespace Matthieuthuetdev\MyToolBox;

use PDO;

class MyToolBox
{
    private $connection;

    public function __construct(PDO $pdoInstance)
    {
        $this->connection = $pdoInstance;
    }

    public function exportDatabase()
    {
        $request = "SHOW TABLES";
        $rq = $this->connection->prepare($request);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
