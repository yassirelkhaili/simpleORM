<?php

require "./src/SimpleORM/EntityManager.php";

use EntityManager\EntityManager;

$entity = new EntityManager($conn, "Users");
$entity->name = "nameqwd";
$entity->email = "email3";

$entity->save();
