<?php

namespace Matthieuthuetdev\MySQLToolBox;

use PDO;

class MySQLToolBox
{
    private PDO $connection;

    public function __construct(PDO $pdoInstance)
    {
        $this->connection = $pdoInstance;
    }

    public function exportDatabase(): void
    {
        $reques = $this->connection->query("SHOW TABLES");
        $tables = $reques->fetchAll(PDO::FETCH_COLUMN);

        foreach ($tables as $table) {
            $createTable = $this->connection->query("SHOW CREATE TABLE `{$table}`");
            $result = $createTable->fetch(PDO::FETCH_ASSOC);

            if (isset($result['Create Table'])) {
                echo $result['Create Table'] . "\n\n";
            }
        }
    }
}
