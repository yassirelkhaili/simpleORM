<?php

require_once dirname(__DIR__) . "/Utils/EntityMapper.php";

use Entities\Entity;

/**
 * User-Defined Entities:
 * ----------------------
 * In this section, you can define your custom entities. Entities are classes
 * that may represent various data structures or business objects.
 *
 * Example:
 * class User {
 *    private $id;
 *    private $name;
 *    private $email;
 * }
 *
 * Feel free to add, modify, or remove entities as needed for your application.
 */

class User extends Entity {
private int $id;
private string $name;
private string $email;

public static function getPropertyConfig(): array {
    return [
        'id' => ['type' => 'int', 'primary' => true, 'autoIncrement' => true, 'notNull' => true],
        'name' => ['type' => 'varchar', 'length' => 255, 'notNull' => true],
        'email' => ['type' => 'varchar', 'length' => 255, 'notNull' => true, 'unique' => true],
    ];
}
}
