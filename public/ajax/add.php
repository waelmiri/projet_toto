<?php

//J'inclus la config
require_once __DIR__.'/../../inc/config.php';
require_once __DIR__.'/../../inc/functions.php';
session_start();



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
  }
  if (strlen($firstname)<2){
    $formOk = false;
  }
  if (empty($birthday)){
    $formOk = false;
  }
  if (filter_var($email,FILTER_VALIDATE_EMAIL) === false){
    $formOk = false;
  }
  if (empty($session)){
    $formOk = false;
  }
  if (empty($city)){
    $formOk = false;
  }
  if ($formOk) {
    $sqlInsert = "INSERT INTO `student`(`stu_lastname`, `stu_firstname`, `stu_birthdate`, `stu_email`, `stu_friendliness`, `session_ses_id`, `city_cit_id`)
            VALUES (:lastname,:firstname,:birthday,:email,:friendliness,:session,:city)";
            $pdoStatement = $pdo->prepare($sqlInsert);

    // Je fais mes bind
    $pdoStatement->bindValue(':lastname', $lastname,PDO::PARAM_STR);
    $pdoStatement->bindValue(':firstname', $firstname,PDO::PARAM_STR);
    $pdoStatement->bindValue(':birthday', $email,PDO::PARAM_STR);
    $pdoStatement->bindValue(':email', $session,PDO::PARAM_STR);
    $pdoStatement->bindValue(':friendliness', $city,PDO::PARAM_STR);
    $pdoStatement->bindValue(':session', $session,PDO::PARAM_STR);
    $pdoStatement->bindValue(':city', $city,PDO::PARAM_STR);

     // $lastId = $pdo->lastInsertId();
     // header("Location: student.php?id={$lastId}");
     if ($pdoStatement->execute() === false) {
       print_r($pdoStatement->errorInfo());
       exit;
     }
     echo "1";
    }else{
      echo "0";
    }


}

?>
