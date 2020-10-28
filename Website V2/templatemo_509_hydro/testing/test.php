<?php
require '../password.php';

$servername = "mydb.itap.purdue.edu";
$username = "g1116887";
$password = "12Blueapples";

try {
  $conn = new PDO("mysql:host=$servername;dbname=g1116887", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage() . "<br>";
}

try {
  $pwd = 'ReallyStrongPassword';
  $hash = password_hash($pwd, PASSWORD_BCRYPT, ["cost" => 10]);

  // $que = $conn->query("select pass from User where user_id = 16")->fetch();
  // echo password_verify($pwd, $que[0]) . "<br>";

  echo phpversion();
  // $conn->beginTransaction();
  // $conn->exec("insert into User (username, pass, email, cell, fir_name, las_name) values ('firstuser', '" . $hash . "', 'email@gmail.com', '1234567890', 'group7', 'isthebest')");

  // if ($_POST["account type"] == "student") {
  //   // student table insertion
  // } elseif ($_POST["account type"] == "employee") {
  //   // employee table insertion
  // } else {
  //   // admin table insertion
  // }
  // $conn->commit();
  echo "Successfully submitted<br>";
} catch(PDOException $e) {
  // $conn->rollback();
  echo "Failed: " . $e->getMessage() . "<br>";
}
$conn = null;
?>