<?php

/*
* Database Configurations
*/
const DATABASE = array(
	'DB_HOST' => "localhost", 
	'DB_USER' => "root",
	'DB_PASS' => "",
	'DB_NAME' => "test",
);
/** 
 * Settings to connect database 
 */
$db = array(
  'server' => 'localhost',
  'db_name' => 'test',
  'type' => 'mysql',
  'user' => 'root',
  'pass' => '',
  'charset' => 'charset=utf8',
);

$initTables = [

  "
    CREATE TABLE IF NOT EXISTS programs(
      id INT AUTO_INCREMENT , PRIMARY KEY(id),
      name VARCHAR(150),
      updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    )
  ",

  "
    CREATE TABLE IF NOT EXISTS program_levels(
      id INT AUTO_INCREMENT , PRIMARY KEY(id),
      program_id INT,
      name VARCHAR(150),
      updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    )
  ",

  "
    CREATE TABLE IF NOT EXISTS program_levels(
      id INT AUTO_INCREMENT , PRIMARY KEY(id),
      program_level_id INT,
      filename VARCHAR(150),
      size VARCHAR(150),
      type VARCHAR(150),
      updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    )
  ",

]



?>