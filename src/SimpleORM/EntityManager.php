<?php

namespace EntityManager;

require "../Database/connections/conn.php";
require "./QueryGenerator.php";

use PDO, queries\QueryGenerator;
class EntityManager {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
    public function createTable(array $data,string $entity_name): void {
        $query = QueryGenerator::generateTableQuery($data, $entity_name);
        $stmt = $this->db->prepare($query);
        if ($stmt === false) {
            throw new \Exception("Error preparing statement");
        }
        if (!$stmt->execute() === false) {
            throw new \Exception("Error creating the table");
        }
    }
}