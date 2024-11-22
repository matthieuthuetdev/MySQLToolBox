<?php
class PhpFunctionLibrary
{
    private PDO $connection;
    public function __construct(PDO $pdoInstance)
    {
        $this->connection = $pdoInstance;
    }

    public function autoLoad(string $path) {
        $fileListe = scandir($path);
        foreach($fileListe as $element){
            if (empty(strpos($fileListe,".php"))) {
                
            }
        }
    }
}
