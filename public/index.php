<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

$sql1 = 'SELECT *
FROM training';
$pdoStatement = $pdo->prepare($sql1);
$pdoStatement->execute();
$training =$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
// Todo plein de chose
/*
$sql = " SELECT ses_id, ses_number, ses_start_date, ses_end_date, tra_name
        FROM session
        INNER JOIN training ON training.tra_id = session.training_tra_id
        WHERE tra_name LIKE '{$value['tra_name']}'";
$pdoStatement = $pdo->prepare($sql);

if ($pdoStatement->execute() === false) {
  print_r($pdoStatement->errorInfo());
  exit;
}
$menu =$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
*/
/*
while ($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
  print_r($row);
  if ($row['loc_id'] != $old) {
    $old = $row['loc_id'];
  }
  $i++;
}*/
/*
$arrayToBeDisplayed = array(
  'Piennes' => array(
    array()
  ),
  'Esch-Belval' => array(

  )
);

foreach($menu as $key => $value){
  print_r($value);
  foreach($value as $key1){
    $arrayToBeDisplayed = $key1;

  }

  echo '<BR>';
}

*/

$sql = "SELECT count(*) AS nb, cit_name, cit_id
        FROM student
        INNER JOIN city ON city.cit_id = student.city_cit_id
        GROUP BY cit_name ";
$pdoStatement = $pdo->query($sql);

if ($pdoStatement === false) {
  print_r($pdo->errorInfo());
  exit;
}
$count = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);


//A la fin, j'afficher
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/home.php';
require_once __DIR__.'/../view/footer.php';
?>
