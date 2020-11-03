<?php
require 'password.php';
$timeTarget = 0.05;
$cost = 5;
do {
  $cost = $cost + 1;
  $start = microtime(true);
  password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
  $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost;
