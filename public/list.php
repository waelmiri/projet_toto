<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

$page = isset($GET['page']) ? intval($Get['page']) : 1;

$offset = ($page-1) * 3;

if ($offset <= 0 ) {
  $offset = 0;
}


$sql = "SELECT *
        FROM student
        LIMIT 3
        offset $offset ";

  $pdoStatement = $pdo->query($sql);
  // Si erreur dans la requête
  if ($pdoStatement === false) {
  	print_r($pdo->errorInfo());
  	exit;
  }
  // Récupération des résultats
  $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);








//A la fin, j'afficher
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';















?>
