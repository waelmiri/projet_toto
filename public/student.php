<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';
session_start();

if(empty($_SESSION['username'])){
  header('Location: signin.php');
  }elseif(isset($_SESSION['username']) && $_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin' ){
    echo 'Welcome monsieur ' . $_SESSION['username'];
  } elseif(isset($_SESSION['username']) && $_SESSION['IP'] == $_SERVER['SERVER_ADDR']){
      echo "voutre IP n'est pas correct";
      session_destroy();
    } else{
        header('Location: signin.php');
      }

$studentId = isset($_GET['id']) ? intval($_GET['id']) : 0 ;
//   $sql = "SELECT  stu_lastname, stu_firstname , stu_birthdate , stu_email , stu_friendliness , cit_name ,ses_number, loc_name
//           FROM student
//           INNER JOIN city ON city.cit_id = student.city_cit_id
//           INNER JOIN session ON session.ses_id = student.session_ses_id
//           INNER JOIN location ON location.loc_id = session.location_loc_id
//           WHERE stu_id = :id ";
//
//
// $pdoStatement = $pdo->prepare($sql);
// $pdoStatement->bindValue(':id',$studentId , PDO::PARAM_INT);
//
// if ($pdoStatement->execute() === false) {
//   print_r($pdoStatement->errorInfo());
//   exit;
// }
// $etudiant = $pdoStatement->fetch(PDO::FETCH_ASSOC);
  $etudiant = student($studentId);


$day = $etudiant['stu_birthdate'];
$tody = date('Y');
$result = $tody - $day;

$public = __DIR__.'/../public/';

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/student.php';
require_once __DIR__.'/../view/footer.php';
