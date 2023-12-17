<?php

require "./src/SimpleORM/EntityManager.php";

use EntityManager\EntityManager;

$entity = new EntityManager($conn, "Users");

// individual insert

// $entity->email = "type";
// $entity->name = "name421";
// $entity->lastname = "last_name2";
// $entity->userID = 231;

// $entity->save();

//batch insert

//example use
// $entity->saveMany([
//     ["columnName"=> "exampleValue1","columnName2"=> "exampleValue2"],
// ]);

// $entity->saveMany([
//     ["name" => "name1", "email" => "email1@gmail.com", "lastname" => "lastname1", "userID" => 233],
//     ["name" => "name2", "email" => "email2@gmail.com", "lastname" => "lastname2", "userID" => 213],
//     ["name" => "name3", "email" => "email3@gmail.com", "lastname" => "lastname3", "userID" => 21],
//     ["name" => "name4", "email" => "email4@gmail.com", "lastname" => "lastname4", "userID" => 124],
//     ["name" => "name5", "email" => "email5@gmail.com", "lastname" => "lastname5", "userID" => 532],
//     ["name" => "name6", "email" => "email6@gmail.com", "lastname" => "lastname6", "userID" => 876],
//     ["name" => "name7", "email" => "email7@gmail.com", "lastname" => "lastname7", "userID" => 345],
//     ["name" => "name8", "email" => "email8@gmail.com", "lastname" => "lastname8", "userID" => 789],
// ]);

// $entity->flush();

// $entity->list();

//fetch records

// $entity->fetchAll()->get();
// $entity->fetchAll()->get(number);
// $entity->fetchAll()->where("name", "exampleName")->get();
// $entity->fetchAll()->where("name", "exampleName")-where("email", "exampleEmail")->get(number);

//delete records

// $entity->delete()->confirm();
// $entity->delete()->where("id", 51)->confirm();

//update one record

// $entity->update("name", "rand")->where("id", 51)->confirm();

//update multiple records

// $entity->update([
//     "name" => "random name",
//     "email" => "random email",
//     "lastname" => "random lastname",
// ])->where("id", 43)->confirm();

//apply raw sql

//coming soon future feature

// aggregate functions

//count

// $entity->count(); //counts all records

//order by

// $entity->fetchAll()->where("name", "nameqwd3")->orderBy(["userID"], "DESC")->get(); ASC default