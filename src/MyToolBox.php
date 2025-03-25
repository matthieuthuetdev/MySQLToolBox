<?php
class MyToolBox
{
    private PDO $connection;
    public function __construct(PDO $pdoInstance)
    {
        $this->connection = $pdoInstance;
    }
    public function test(){
        return "matthieu est vraiment compétant !";
    }
}
