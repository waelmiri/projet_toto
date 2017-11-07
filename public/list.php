<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

session_start();
if($_SESSION['user']){
  echo "welcom ".$SESSION['user'];
}
if (!empty($_GET['search'])) {

  $search = isset($_GET['search']) ? trim($_GET['search']) : '';
  $search = preg_replace("#[^0-9a-z]#i","",$search);
  $sql = " SELECT *
  FROM student
  INNER JOIN city ON city.cit_id = student.city_cit_id
  WHERE stu_lastname LIKE '%$search%'
  OR stu_firstname LIKE '%$search%'
  OR stu_email LIKE '%$search%'
  OR cit_name LIKE '%$search%'  ";


  $pdoStatement = $pdo->query($sql);

  // Si erreur dans la requête
  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }

  //while ($pdoStatement->fetch(PDO::FETCH_ASSOC)) {
  	$student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    //$row['stu_lastname']. $row['stu_firstname'].$row['stu_email'];
  //}

}elseif(!empty($_GET['id'])) {

$sessionInfo = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql2 = " SELECT *
          FROM student
          INNER JOIN session ON session.ses_id = student.session_ses_id
          WHERE ses_id = :id";
$pdoStatement = $pdo->prepare($sql2);
$pdoStatement->bindValue(':id',$sessionInfo,PDO::PARAM_INT);

if ($pdoStatement->execute() === false) {
  print_r($pdoStatement->errorInfo());
  exit;
}
$student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

}elseif (!empty($_GET['de'])){

  $delete = isset($_GET['de']) ? intval($_GET['de']) : 0;
  $sql3 = " DELETE
            FROM student
            WHERE stu_id = :de ";
      $pdoStatement = $pdo->prepare($sql3);
      $pdoStatement->bindValue(':de', $delete , PDO::PARAM_INT);

        if ($pdoStatement->execute() === false) {
        print_r($pdoStatement->errorInfo());
        exit;
      }
    $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    header("location: list.php");

}else{
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
}





//A la fin, j'afficher
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';


?>
