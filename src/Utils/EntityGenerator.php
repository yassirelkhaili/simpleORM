<?php

namespace generate;

interface generate {
    public static function generate(string $name): void;
}

class generateEntity Implements generate {
    public static function generate(string $class_name): void {
        $file_name = $class_name . ".php";
        $destination_directory = dirname(__DIR__) . "\Model\Generated";
        $full_path = $destination_directory . '/' . $file_name; 
        if (!is_dir($destination_directory)) {
            mkdir($destination_directory, 0777, true);
        }
        $class_content = <<<PHP
    <?php
    
    class $class_name {
        private int \$id;
        private string \$name;
        private bool \$isActive;
        private float \$price;
        private \DateTime \$createdAt;
    
        public function getId(): int {
            return \$this->id;
        }
    
        public function getName(): string {
            return \$this->name;
        }
    
        public function getIsActive(): bool {
            return \$this->isActive;
        }
    
        public function getPrice(): float {
            return \$this->price;
        }
    
        public function getCreatedAt(): \DateTime {
            return \$this->createdAt;
        }
    }
    PHP;
        file_put_contents($full_path, $class_content);
        echo "The $class_name Entity has been generated at: $full_path\n";
    }
}