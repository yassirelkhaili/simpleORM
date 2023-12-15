<?php

require "./src/SimpleORM/EntityManager.php";

use EntityManager\EntityManager;

$entity = new EntityManager($conn, "Users");

// individual insert
// $entity->email = "type";
// $entity->name = "name421";
// $entity->lastname = "last_n ame2";

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

// $array = [
//         ["name"=> "nameqwd","email"=> "email@gmail.com", "lastname" => "lastname"],
//         ["name"=> "nameqwd2","email"=> "email2@gmail.com", "lastname" => "lastname"],
//         ["name"=> "nameqwd3","email"=> "email3@gmail.com", "lastname" => "lastname"],
// ];
// $index = 0;

// foreach ($array as $item) {
//     $keys = array_keys($item);
//     print_r($item[$index]);
//     $index++;
// }
