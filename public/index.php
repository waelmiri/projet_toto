
  <?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';
require_once __DIR__.'/../inc/functions.php';
session_start();

if(!empty($_SESSION['username'])){
  if($_SESSION['username'] && $_SESSION['IP'] == $_SERVER['SERVER_ADDR']){
    echo 'Welcome monsieur ' . $_SESSION['username'];
  } else{
      echo "voutre IP n'est pas correct";
      session_destroy();
    }
  }
// $sql1 = 'SELECT *
// FROM training';
// $pdoStatement = $pdo->prepare($sql1);
// $pdoStatement->execute();
// $training =$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
$training = training();



// Todo plein de chose
//

// $sql = " SELECT ses_id, ses_number, ses_start_date, ses_end_date, tra_name
//         FROM session
//         INNER JOIN training ON training.tra_id = session.training_tra_id";
// $pdoStatement = $pdo->prepare($sql);
//
// if ($pdoStatement->execute() === false) {
//   print_r($pdoStatement->errorInfo());
//   exit;
// }
// $menu =$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
$session = session();



//
// print_r($menu);

/*
while ($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
  print_r($row);
  if ($row['loc_id'] != $old) {
    $old = $row['loc_id'];
  }
  $i++;
}*/

// $arrayToBeDisplayed = array(
//   'Piennes' => array(
//     array()
//   ),
//   'Esch-Belval' => array(
//
//   )
// );
// $arrayToBeDisplayed = array();
// foreach($menu as $key => $value){
// print_r($value);
  //   if($value== 'tra_name'){
//     $arrayToBeDisplayed = $value['tra_name'];
//   }
//   print_r($arrayToBeDisplayed);
  //foreach ($arrayToBeDisplayed as $value1) {
    # code...
//  }




//   echo '<BR>';
// }
//
//
//
// $sql = "SELECT count(*) AS nb, cit_name, cit_id
//         FROM student
//         INNER JOIN city ON city.cit_id = student.city_cit_id
//         GROUP BY cit_name ";
// $pdoStatement = $pdo->query($sql);
//
// if ($pdoStatement === false) {
//   print_r($pdo->errorInfo());
//   exit;
// }
// $count = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
$count = countt();

//A la fin, j'afficher
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/home.php';
require_once __DIR__.'/../view/footer.php';
?>
