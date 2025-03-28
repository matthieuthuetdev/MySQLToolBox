<?php
namespace MyTollBox;
use PDO;
class MyToolBox
{
    private  $connection;
    public function __construct(PDO $pdoInstance)
    {
        $this->connection = $pdoInstance;
    }
    public function exportDatabase(){
        $requrest = "SHOW TABLES";
        $rq = $this->connection->prepare($requrest);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}
