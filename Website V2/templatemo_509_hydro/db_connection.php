<?php

error_reporting(-1);
ini_set('display_errors', 'On');

// Connection string, or "data source name"
$host = "mydb.itap.purdue.edu";
$schema = "g1116887";
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;

$user = "g1116887";
$password = "12Blueapples";

try
{
   $pdo = new PDO($dsn, $user,  $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
   echo 'Database connection failed.';
   die();
}