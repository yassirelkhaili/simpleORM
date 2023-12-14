<?php

namespace queries;

class QueryGenerator {
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
}