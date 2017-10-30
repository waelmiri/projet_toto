<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($page-1) * 5;

if ($offset <= 0 ) {
  $offset = 0;
}


$sql = "SELECT *
        FROM student
        LIMIT 5
        offset $offset ";

  $pdoStatement = $pdo->query($sql);
  // Si erreur dans la requête
  if ($pdoStatement === false) {
  	print_r($pdo->errorInfo());
  	exit;
  }
  // Récupération des résultats
  $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

if (!empty($_GET)) {

  $search = isset($_GET['search']) ? $_GET['search'] : '';
  $search = preg_replace("#[^0-9a-z]#i","",$search);
  $sql = " SELECT *
  FROM student
  INNER JOIN city ON city.cit_id = student.city_cit_id
  WHERE stu_lastname LIKE '%$search%'
  OR stu_firstname LIKE '%$search%'
  OR stu_email LIKE '%$search%'
  OR cit_name) LIKE '%$search%' DESC ";

  $pdoStatement = $pdo->query($sql);
  while ($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
  	echo "{$row['stu_lastname']}.' '. {$row['stu_firstname']}.' '.s{$a['stu_email']}";
  }

}

//A la fin, j'afficher
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';


?>
