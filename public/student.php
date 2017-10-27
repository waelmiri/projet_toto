<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

$sql = "SELECT *
        FROM student
        WHERE $stu_id = $_GET['stu_id'] ";
$pdoStatement = $pdo->query($sql);

if ($pdoStatement === false) {
  print_r($pdo->errorInfo());
  exit;
  # code...
}
$etudiant = $pdoStatement->fetch(PDO::FETCH_ASSOC);
print_r($etudiant);
