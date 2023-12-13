<?php

namespace Entities;

use ReflectionClass, ReflectionProperty;

class Entity {

}

class EntityMapper {
    private Entity $entity;
    public function __construct(Entity $entity) {
        $this->entity = $entity;
    }
    public function map(): array {
        $entity_name = get_class($this->entity);
        $reflection_class = new ReflectionClass($entity_name);
        $entity_properties = $reflection_class->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
        $property_mapping = [];
        foreach ($entity_properties as $property) {
            $property_name = $property->getName();
            $property_type = $this->getPropertyType($property);
            $property_mapping[$property_name] = [
                'type' => $property_type,
            ];
        }
        $entity_mapping = [
            "entityName" => $entity_name,
            "entityProperties" => $property_mapping,
        ];
       return $entity_mapping;
    }
    private function getPropertyType(ReflectionProperty $property): ?string {
        $type = null;
        if ($property->hasType()) {
            $property_type = $property->getType();
            $type = $property_type->isBuiltin() ? $property_type->getName() : null;
        }
        return $type;
    }
}