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

 // récupération la ville
 // $sql = "SELECT cit_name ,cit_id FROM city";
 // $pdoStatement = $pdo->prepare($sql);
 // $pdoStatement->execute();
 // $cities = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
$cities = city();
 //récupération la liste sessions
$sessions = session();
// $sql2 = "SELECT ses_id, ses_number , ses_start_date, ses_end_date
//           FROM session";
// $pdoStatement2 = $pdo->prepare($sql2);
// $pdoStatement2->execute();
// $sessions = $pdoStatement2->fetchAll(PDO::FETCH_ASSOC);


// FOrmulaire soumis
if (!empty($_POST)) {
  //affecter post au variables
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
$sql = "INSERT INTO `student`(`stu_lastname`, `stu_firstname`, `stu_birthdate`, `stu_email`, `stu_friendliness`, `session_ses_id`, `city_cit_id`, `stu_inserted`)
        VALUES ('$lastname','$firstname',$birthday,'$email',$friendliness,$session,$city,CURRENT_TIMESTAMP)";
 $insert = $pdo->exec($sql);
 $lastId = $pdo->lastInsertId();
 header("Location: student.php?id={$lastId}");

 if ($insert === false) {
   print_r($pdo->errorInfo());
 }

  }
}



require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/add.php';
require_once __DIR__.'/../view/footer.php';
