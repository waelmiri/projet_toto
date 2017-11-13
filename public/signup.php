<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';
session_start();
// if(!empty($_SESSION['username'])){
//   if(isset($_SESSION['username']) && $_SESSION['IP'] == $_SERVER['SERVER_ADDR']){
//     echo 'Welcome monsieur ' . $_SESSION['username'];
//   }else{
//     echo "voutre IP n'est pas correct";
//     session_destroy();
//   }
// }

if(!empty($_POST)){

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

  //$passHash= sha1($password);
  $passHash = password_hash($password, PASSWORD_BCRYPT);
  $email = trim(strip_tags($email));
  // valider les données
  $formOk = true;

  if (filter_var($email,FILTER_VALIDATE_EMAIL) === false){
    $formOk = false;
    echo "Email incorrect.<br>";
  }


  if (strlen($password)<5){
    $formOk = false;
    echo "password est moins que 5 lettres.<br>";
  }

  if (strlen($confirmPassword)<5){
    $formOk = false;
    echo "password est moins que 5 lettres.<br>";
  }
  if ( $password !== $confirmPassword ) {
    $formOk = false;
    echo "le mot de pass et le confirme  ne sont pas indentifiant";
  }

// Verification de l'existence ou non de l'email dans la base

  if($formOk){

   $test = verification($email);



    if($test == false){

      $sql = "INSERT INTO user(usr_email, usr_password, usr_role , usr_date_creation)
      VALUES (:email,:password, 'user', NOW()) ";

      $pdoStatement = $pdo->prepare($sql);
      $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
      $pdoStatement->bindValue(':password', $passHash, PDO::PARAM_STR);

      if ($pdoStatement->execute() === false) {
        print_r($pdoStatement->errorInfo());
        exit;
      }



      echo "vous avez bien inséré le user";
      $_SESSION['username'] = $email;
      $_SESSION['IP'] = $_SERVER['SERVER_ADDR'];
      header("Location: index.php");
    }else {
      echo "email  existe déja";
    }
  }

}





require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/signup.php';
require_once __DIR__.'/../view/footer.php';
