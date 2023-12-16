<?php

require "./src/SimpleORM/EntityManager.php";

use EntityManager\EntityManager;

$entity = new EntityManager($conn, "Users");

// individual insert
// $entity->email = "type";
// $entity->name = "name421";
// $entity->lastname = "last_name2";

// $entity->save();

//batch insert

//example use
// $entity->saveMany([
//     ["columnName"=> "exampleValue1","columnName2"=> "exampleValue2"],
// ]);

// $entity->saveMany([
//     ["name"=> "nam eqwd","email"=> "email@gmail.com", "lastname" => "lastname"],
//     ["name"=> "nameqwd2","email"=> "email2@gmail.com", "lastname" => "lastname"],
//     ["name"=> "nameqwd3","email"=> "email3@gmail.com", "lastname" => "lastname"],
// ]);

// $entity->flush();

// $entity->fetchAll()->get();
// $entity->fetchAll()->get(number);
// $entity->fetchAll()->where("name", "exampleName")->get();
// $entity->fetchAll()->where("name", "exampleName")-where("email", "exampleEmail")->get(number);
// $entity->delete()->confirm();
// $entity->delete()->where("id", 2)->confirm();