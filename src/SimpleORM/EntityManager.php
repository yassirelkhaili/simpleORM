<?php

namespace EntityManager;

require_once dirname(__DIR__) ."/Database/connections/conn.php";
require __DIR__ . "/QueryGenerator.php";

use PDO, queries\QueryGenerator;
class EntityManager {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    //migrate entities method
    public function createTable(array $data,string $entity_name): void {
        $query = QueryGenerator::generateTableQuery($data, $entity_name);
        echo ($query);
        $stmt = $this->db->prepare($query);
        if ($stmt === false) {
            throw new \Exception("Error preparing statement");
        }
        if (!$stmt->execute() === false) {
            throw new \Exception("Error creating the table");
        }
    }

    //create method

    //fetch method

    //update method

    //delete method
}