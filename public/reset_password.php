<?php
//J'inclus la config
require_once __DIR__.'/../inc/config.php';

$token = isset($_GET['token']) ? trim($_GET['token']) : '';

if(empty($token)){
  echo "<div class ='alert alert-success'>ERREUR : Vous n'etes pas autorisé </div>";

  }else{

    $sql = " SELECT usr_id
            FROM user
            WHERE usr_token  = :token ";

    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':token' , $token, PDO::PARAM_STR);
    // $pdoStatement->bindValue(':password' , $password , PDO::PARAM_STR);

    if($pdoStatement->execute() === false){
      print_r($pdoStatement->errorInfo());
      exit;
    }
    $id = $pdoStatement->fetch(PDO::FETCH_ASSOC);


    if(!empty($_POST)){

        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

        $formOk = true;

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

        $passHash = password_hash($password, PASSWORD_BCRYPT);

          if($formOk){

            $sql = " UPDATE user
                      SET usr_token = :token,
                          usr_password = :password
                      WHERE usr_id = :id";

          // $updateNew = $pdo->exec($sql);
          // print_r($update['usr_token']);
          // if ($updateNew === false) {
          //  print_r($pdo->errorInfo());
          // }

          $pdoStatement = $pdo->prepare($sql);
          $pdoStatement->bindValue(':id', $id['usr_id'], PDO::PARAM_INT);
          $pdoStatement->bindValue(':token', '', PDO::PARAM_STR);
          $pdoStatement->bindValue(':password', $passHash, PDO::PARAM_STR);

          if($pdoStatement->execute() === false){
            print_r($pdoStatement->errorInfo());
          }

        }
    }

}

















require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/reset_password.php';
require_once __DIR__.'/../view/footer.php';
