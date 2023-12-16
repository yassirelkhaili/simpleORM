<?php

namespace queries;

class QueryGenerator {
    private array $whereConditions = array();
    private array $conditions = array();
    private string $chainedQuery = "";
    private string $entity_name;

    public function __construct(string $entity_name) {
        $this->entity_name = $entity_name;
    }

    public static function generateTableQuery(array $columns): string {
        $query = "CREATE TABLE IF NOT EXISTS {$columns['entityName']} (";
        $columnNames = array_keys($columns["entityProperties"]);
        $index = 0;
        foreach ($columns["entityProperties"] as $columnProperty) {
                $columnName = $columnNames[$index];
                $type = $columnProperty['type'];
                $query .= "$columnName $type";
        
                if (isset($columnProperty['length'])) {
                    $length = $columnProperty['length'];
                    $query .= "($length)";
                }
        
                if (isset($columnProperty['notNull']) && $columnProperty['notNull']) {
                    $query .= " NOT NULL";
                }
        
                if (isset($columnProperty['autoIncrement']) && $columnProperty['autoIncrement']) {
                    $query .= " AUTO_INCREMENT";
                }
        
                if (isset($columnProperty['primary']) && $columnProperty['primary']) {
                    $query .= " PRIMARY KEY";
                }
        
                if (isset($columnProperty['unique']) && $columnProperty['unique']) {
                    $query .= " UNIQUE";
                }
        
                $query .= ",";
                $index++;
            }
        
        $query = rtrim($query, ',');
        $query .= ");";
        return $query;
    }

    public static function insertRecord (array $data, string $entity_name): string {
        $query = "INSERT INTO $entity_name (";
    $columnNames = array_keys($data);
    $query .= implode(", ", $columnNames);
    $query .= ") VALUES (";
    foreach ($columnNames as $columnName) {
        $query .= ":" . $columnName . ", ";
    }
    $query = rtrim($query, ', ');
    $query .= ");";
    return $query;
}

public function generateFetchAllQuery (): string {
    $this->chainedQuery .= "SELECT * FROM {$this->entity_name}";
    return $this->chainedQuery;
}

public function stashWhereCondition (string $column, $value): void {
    $this->whereConditions[] = compact('column', 'value');
}

public function generateFinalWhereQuery (): string {
    if (!empty($this->whereConditions)) {
        $conditions = [];
        foreach ($this->whereConditions as $condition) {
            $conditions[] = "{$condition['column']} = :{$condition['column']}";
            $this->conditions[$condition['column']] = $condition['value'];
        }
        $this->chainedQuery .= " WHERE " . implode(' AND ', $conditions);
    }

    // (e.g., ORDER BY, LIMIT) to be handled here.

    return $this->chainedQuery . ";";
}

// utility method to fetch Conditions to be used in the prepare statement

public function exportWhereConditions() {
    return $this->conditions;
}
}