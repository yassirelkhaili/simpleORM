<?php

namespace queries;

class QueryGenerator {
    public static function generateTableQuery(array $columns, string $entity_name): string {
            $query = "CREATE TABLE IF NOT EXISTS $entity_name (";

            foreach ($columns as $columnName => $columnProperties) {
                $type = $columnProperties['type'];
                $query .= "$columnName $type";
        
                if (isset($columnProperties['length'])) {
                    $length = $columnProperties['length'];
                    $query .= "($length)";
                }
        
                if (isset($columnProperties['notNull']) && $columnProperties['notNull']) {
                    $query .= " NOT NULL";
                }
        
                if (isset($columnProperties['autoIncrement']) && $columnProperties['autoIncrement']) {
                    $query .= " AUTO_INCREMENT";
                }
        
                if (isset($columnProperties['primary']) && $columnProperties['primary']) {
                    $query .= " PRIMARY KEY";
                }
        
                if (isset($columnProperties['unique']) && $columnProperties['unique']) {
                    $query .= " UNIQUE";
                }
        
                $query .= ",";
            }

            $query = rtrim($query, ',');
        
            $query .= ");";

            return $query;
        }
    }