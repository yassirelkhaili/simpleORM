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
        try {
            $query = QueryGenerator::generateTableQuery($data);
            $stmt = $this->db->prepare($query);
            if (!$stmt) {
                throw new Exception("Error preparing statement");
            }
            if (!$stmt->execute()) {
                throw new Exception("Error creating the table");
            }
            exit("Table: $data[entityName] has been migrated");
        } catch (Exception $exception) {
            echo "An Error has occured: " . $exception->getMessage();
        }
    }

    //rollback entity
    public function down(string $entity_name): void {
    try {
        $query = "DROP TABLE $entity_name";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Error preparing statement");
        }
        if (!$stmt->execute()) {
            throw new Exception("Error creating the table");
        }
        exit("Table: $entity_name was dropped sussesfully");
    } catch (Exception $exception) {
        echo "An Error has occured: " . $exception->getMessage();
    }
    }

    //create methods

    //fetch methods

    //update methods

    //delete methods
}