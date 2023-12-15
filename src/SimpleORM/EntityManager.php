<?php

namespace EntityManager;

require_once dirname(__DIR__) ."/Database/connections/conn.php";
require __DIR__ . "/QueryGenerator.php";

use PDO, queries\QueryGenerator, Exception;
class EntityManager {
    private PDO $db;
    private string $entity_name;
    private array $columns = [];

    public function __construct(PDO $db, string $entity_name) {
        $this->db = $db;
        $this->entity_name = $entity_name;
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
    public function down(): void {
    try {
        $query = "DROP TABLE $this->entity_name";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Error preparing statement");
        }
        if (!$stmt->execute()) {
            throw new Exception("Error creating the table");
        }
        exit("Table: $this->entity_name was dropped sussesfully");
    } catch (Exception $exception) {
        echo "An Error has occured: " . $exception->getMessage();
    }
    }

    //setter and getter for dynamic column calling

    public function __set(string $name, $value): void {
        $this->columns[$name] = $value;
    }

    public function __get(string $name) {
        return $this->columns[$name] ?? null;
    }

    //create methods
    public function save (): EntityManager {
        try {
            $query = QueryGenerator::insertRecord($this->columns, $this->entity_name);
            $stmt = $this->db->prepare($query);
            $index = 0;
            foreach ($this->columns as $name => $value) {
                $value_type = gettype($value);
               if ($value_type === "string") {
                $stmt->bindParam(":". $value, $value, PDO::PARAM_STR);
               }
               if ($value_type === "int") {
                $stmt->bindParam(":". $value, $value, PDO::PARAM_INT);
               }
               $index++;
            }
            if (!$stmt) {
                throw new Exception("Error preparing statement");
            }
            if (!$stmt->execute()) {
                throw new Exception("Error creating record");
            }
            exit("Record has been saved");
        } catch (Exception $exception) {
            echo "An Error has occured: " . $exception->getMessage();
        }
        return $this;
    }
    //fetch methods

    //update methods

    //delete methods

    //empty flush method
    public function flush (): EntityManager {
        $this->columns = [];
        return $this;
    } 
}