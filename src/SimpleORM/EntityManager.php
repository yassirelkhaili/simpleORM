<?php

namespace EntityManager;

require_once dirname(__DIR__) ."/Database/connections/conn.php";
require __DIR__ . "/QueryGenerator.php";

use PDO, queries\QueryGenerator, Exception;
class EntityManager {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    //migrate entitity
    public function up(array $data): void {
        $query = QueryGenerator::generateTableQuery($data);
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new \Exception("Error preparing statement");
        }
        if (!$stmt->execute()) {
            throw new \Exception("Error creating the table");
        }
    }

    //rollback entity
    public function down(string $entity_name): void {
        $query = "DROP TABLE $entity_name";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Error preparing statement");
        }
        if (!$stmt->execute()) {
            throw new Exception("Error creating the table");
        }
    }

    //create methods

    //fetch methods

    //update methods

    //delete methods
}