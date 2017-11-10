<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';
session_start();

if(!empty($_POST)){

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $email = trim(strip_tags($email));

  $formOk = true;

  if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
    $formOk = false;
    echo "Email incorrect.<br>";
  }

  if(strlen($password)<5){
    $formOk = false;
    echo "password est moins que 5 lettres.<br>";
  }



  if($formOk){

    // $sql = " SELECT usr_id, usr_password , usr_email , usr_role
    //         FROM user
    //         WHERE usr_email  = :email ";
    //
    // $pdoStatement = $pdo->prepare($sql);
    // $pdoStatement->bindValue(':email' , $email, PDO::PARAM_STR);
    // // $pdoStatement->bindValue(':password' , $password , PDO::PARAM_STR);
    //
    // if($pdoStatement->execute() === false){
    //   print_r($pdoStatement->errorInfo());
    //   exit;
    // }
    // $testEmail = $pdoStatement->fetch(PDO::FETCH_ASSOC);
      $testEmail = testEmail($email);


    //if (password_verify($password, $testEmail['usr_password'])) {
    if (count($testEmail) > 0 && password_verify($password,$testEmail['usr_password'])) {
      echo $testEmail['usr_id'].'<br>';
      $idServer = $_SERVER['SERVER_ADDR'];
      //echo $_SERVER["REMOTE_ADDR"];
      echo $idServer.'<br>';
      $_SESSION['username'] = $testEmail['usr_id'];
      $_SESSION['IP'] = $_SERVER['SERVER_ADDR'];
      $_SESSION['role'] = $testEmail['usr_role'];
      //$_SESSION['user'] = $user[0]['id'];
      //$_SESSION['user_fullname'] = $user[0]['firstname'] . ' ' . $user[0]['lastname'];
      echo 'Welcome monsieur ' . $_SESSION['username'];
    } else {
      echo 'Invalid password';
    }
  }
}
print_r($_SESSION);

            // L'utilisateur existe bien en base de donnée avec le mail spécifié, et le mot de passe correspond, il est donc authentifié








require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/signin.php';
require_once __DIR__.'/../view/footer.php';
