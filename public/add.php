<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

 // récupération la ville
 $sql = "SELECT cit_name ,cit_id FROM city";
 $pdoStatement = $pdo->prepare($sql);
 $pdoStatement->execute();
 $cities = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

 //récupération la liste sessions

$sql2 = "SELECT ses_id, ses_number , ses_start_date, ses_end_date
          FROM session";
$pdoStatement2 = $pdo->prepare($sql2);
$pdoStatement2->execute();
$sessions = $pdoStatement2->fetchAll(PDO::FETCH_ASSOC);
print_r($sessions);

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
  $sessions = substr($sessions,0,1);
  $city = substr($city,0,2);
  $session = trim($session);
  $city = trim($city);

  print_r($session);
  print_r($city);



  // valider les données

  $formOk = true;
  if (strlen($lastname)<2){
    $formOk = false;
    echo "NOM invalie.<br>";
  }
  if (strlen($firstname)<2){
    $formOk = false;
    echo "NOM invalie.<br>";
  }
  if (!empty($birthday)){
    $formOk = false;
    echo "la date de la naissance incorrect.<br>";
  }
  if (filter_var($email,FILTER_VALIDATE_EMAIL)=== false){
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
  	echo '$lastname='.$lastname.'<br>';
  	echo '$firstname='.$firstname.'<br>';
  	echo '$email='.$email.'<br>';
  	echo '$birthday='.$phone.'<br>';
    echo '$session=' .$session.'<br>';
    echo "city".$city.'<br>';
  		// Je n'affiche pas le formulaire
  		$displayForm = false;

  }
}











require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/add.php';
require_once __DIR__.'/../view/footer.php';
