<?php
class MyToolBox
{
    private PDO $connection;
    public function __construct(PDO $pdoInstance)
    {
        $this->connection = $pdoInstance;
    }
    public function exportDatabase(){
        $requrest = "SHOW TABLE";
        $rq = $this->connection->prepare($requrest);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}
