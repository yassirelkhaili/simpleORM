<?php

namespace generate;


require_once dirname(__DIR__) . "/SimpleORM/EntityManager.php";

use Entities\EntityMapper;
use EntityManager\EntityManager;
use PDO;

interface generate {
    public static function generate(string $name): void;
    public static function migrate(string $name, PDO $conn): void;

    public static function destroy(string $name): void;
}
class generateEntity Implements generate {
    public static function generate(string $class_name): void {
        $file_name = $class_name . ".php";
        $destination_directory = dirname(__DIR__) . "\Models";
        $full_path = $destination_directory . '/' . $file_name; 
        if (!is_dir($destination_directory)) {
            mkdir($destination_directory, 0777, true);
        }

        if (file_exists($full_path)) {
            echo "Entity $class_name already exists";
            exit();
        }
        $class_content = <<<PHP
    <?php

    require_once dirname(__DIR__) . "/Utils/EntityMapper.php";

    use Entities\Entity;

    class $class_name extends Entity {
        /**
         * @var int
         *
         * @Config(type="int", primary=true, autoIncrement=true, notNull=true)
         * The unique identifier for the user.
         */
        private int \$id;
    
        /**
         * @var string
         *
         * @Config(type="varchar", length=255, notNull=true)
         * The name of the user.
         */
        private string \$name;
    
        /**
         * @var string
         *
         * @Config(type="varchar", length=255, notNull=true, unique=true)
         * The email address of the user, which must be unique.
         */
        private string \$email;
    
        /**
         * Get the configuration for each property.
         *
         * @return array
         * An associative array where keys are property names, and values are property configurations.
         */
        public static function getPropertyConfig(): array {
            return [
                'id' => ['type' => 'int', 'primary' => true, 'autoIncrement' => true, 'notNull' => true],
                'name' => ['type' => 'varchar', 'length' => 255, 'notNull' => true],
                'email' => ['type' => 'varchar', 'length' => 255, 'notNull' => true, 'unique' => true],
            ];
        }
    }
    PHP;
        file_put_contents($full_path, $class_content);
        echo "The $class_name Entity has been generated at: $full_path\n";
    }

    public static function migrate(string $class_name, PDO $conn): void {
        $file_name = $class_name . ".php";
        $target_directory = dirname(__DIR__) . "/models";
        $target_file_path = $target_directory . '/' . $file_name;

        if (file_exists($target_file_path)) {
            require_once $target_file_path;
            if (class_exists($class_name)) {
                $mapper = new EntityMapper(new $class_name);
                $manager = new EntityManager($class_name);
                $manager->up($mapper->map());
            } else {
            exit("Could't find target class");
            }
        } else {
            exit("Could't find target class");
        }
    }

    public static function destroy($class_name): void {
        $file_name = $class_name . ".php";
        $destination_directory = dirname(__DIR__) . "\Models";
        $full_path = $destination_directory . '/' . $file_name;
        if (file_exists($full_path)) {
            if (unlink($full_path)) {
                echo "Entity deleted successfully.";
            } else {
                echo "Unable to delete the Entity: $class_name.";
            }
        } else {
            exit("Entity: $class_name does not exist");
        }
    }
}