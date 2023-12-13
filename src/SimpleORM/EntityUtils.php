<?php

namespace Entities;

use ReflectionClass, ReflectionProperty;

class Entity {

}

class EntityMapper {
    private static Entity $entity;
    public static function setEntity(Entity $entity): void {
        self::$entity = $entity;
    }

    public function map(): array {
        $entity_name = get_class(self::$entity);
        $reflection_class = new ReflectionClass($entity_name);
        $entity_properties = $reflection_class->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
        $property_names = array_map(fn ($property) => $property->getName(), $entity_properties);
        $entity_mapping = [
            "entityName" => $entity_name,
            "entityProperties" => $property_names,
        ];
        return $entity_mapping;
    }
}