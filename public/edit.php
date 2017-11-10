<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';
require_once __DIR__.'/../inc/functions.php';
session_start();
if(empty($_SESSION['username'])){
  header('Location: signin.php');
  }elseif(isset($_SESSION['username']) && $_SESSION['IP'] == $_SERVER['SERVER_ADDR'] && $_SESSION['role'] == 'user'){
    echo 'Monsieur ' . $_SESSION['username'].' cher client : vous n\'avez pas le droit d\'entrer ici ' ;
    header("HTTP/1.1 403 Forbidden");
    exit;
      }elseif(isset($_SESSION['username']) && $_SESSION['IP'] == $_SERVER['SERVER_ADDR'] && $_SESSION['role'] == 'admin'){
        echo 'Welcome Monsieur ' . $_SESSION['username'];
        }else{
          echo "voutre IP n'est pas correct";
          session_destroy();
        }
// $sql = "SELECT cit_name ,cit_id FROM city";
// $pdoStatement = $pdo->prepare($sql);
// $pdoStatement->execute();
// $cities = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
$cities = city();
//récupération la liste sessions

$session = session();

// $sql2 = "SELECT ses_id, ses_number , ses_start_date, ses_end_date
// FROM session";
// $pdoStatement2 = $pdo->prepare($sql2);
// $pdoStatement2->execute();
// $sessions = $pdoStatement2->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_GET['id'])) {
$update = isset($_GET['id']) ? intval($_GET['id']) : 0;
$etudiant1 = student($update);
//  $sql = "SELECT  stu_lastname, stu_firstname , stu_birthdate , stu_email , ses_id,
//   stu_friendliness , cit_name, cit_id ,ses_number, loc_name, ses_end_date , ses_start_date
//          FROM student
//          INNER JOIN city ON city.cit_id = student.city_cit_id
//          INNER JOIN session ON session.ses_id = student.session_ses_id
//          INNER JOIN location ON location.loc_id = session.location_loc_id
//          WHERE stu_id = :id ";
// $pdoStatement = $pdo->prepare($sql);
// $pdoStatement->bindValue(':id',$update , PDO::PARAM_INT);
//
// if ($pdoStatement ->execute() === false) {
//    print_r($pdoStatement->errorInfo());
//    exit;
// }
//
// $etudiant1 = $pdoStatement->fetch(PDO::FETCH_ASSOC);
if(!empty($_POST)){
  $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
  $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
  $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $friendliness = isset($_POST['friendliness']) ? $_POST['friendliness'] : '';
  $session = isset($_POST['session']) ? $_POST['session'] : '';
  $city = isset($_POST['city']) ? $_POST['city'] : '';

  // nettoyer les variables

  $lastname = strtoupper(trim(strip_tags($lastname)));
  $firstname = strtoupper(trim(strip_tags($firstname)));
  $email = trim(strip_tags($email));
  $session = substr($session,0,1);
  $city = substr($city,0,2);
  $session = trim($session);
  $city = trim($city);
  // valider les données
  $formOk = true;
  if (strlen($lastname)<2){
    $formOk = false;
    echo "NOM incorrect.<br>";
  }
  if (strlen($firstname)<2){
    $formOk = false;
    echo "NOM incorrect.<br>";
  }
  if (empty($birthday)){
    echo "la date de la naissance incorrect.<br>";
    $formOk = false;
  }
  if (filter_var($email,FILTER_VALIDATE_EMAIL) === false){
    $formOk = false;
    echo "Email incorrect.<br>";
  }
  if (empty($session)){
    $formOk = false;
    echo "Session incorrect.<br>";
  }
  if (empty($city)){
    $formOk = false;
    echo "la Ville incorrect.<br>";
  }

  if ($formOk) {
    $sql4 = "UPDATE `student` SET `stu_lastname` = '$lastname', `stu_firstname` = '$firstname', `stu_birthdate`= $birthday,
    `stu_email` = '$email', `stu_friendliness` = $friendliness, `session_ses_id` = '$session', `city_cit_id` = '$city',
    `stu_inserted` = CURRENT_TIMESTAMP WHERE stu_id =$update ";
    $updateNew = $pdo->exec($sql4);
    // $lastId = $pdo->lastInsertId();
    // header("Location: /student.php?id={$lastId}");

    if ($updateNew === false) {
     print_r($pdo->errorInfo());
    }

  }
}
}

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/edit.php';
require_once __DIR__.'/../view/footer.php';







?>
