<?php
//J'inclus la config
require_once __DIR__.'/../inc/config.php';

if(!empty($_GET)){

  $email = isset($_GET['email']) ? $_GET['email'] : 0;

  $email = trim(strip_tags($email));

  $formOk = true;

  if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    $formOk = false;
    echo "Email incorrect";
  }

  if($formOk){
    $sql = " SELECT usr_id, usr_password , usr_email , usr_role
            FROM user
            WHERE usr_email  = :email ";

    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':email' , $email, PDO::PARAM_STR);
    // $pdoStatement->bindValue(':password' , $password , PDO::PARAM_STR);

    if($pdoStatement->execute() === false){
      print_r($pdoStatement->errorInfo());
      exit;
    }
    $testEmail = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    print_r($testEmail);
    // $testEmail = testEmail($email);
    $count = $pdoStatement->rowCount();
    echo $count;
    if($count == 0){
      echo "<div class ='alert alert-success'>$count.'Account founds'</div>";
    }else{
      $testEmail['usr_token'] = md5($testEmail['usr_id']);

      print_r($testEmail['usr_token']);
      $to  = $email;
      $subject = 'Password Reset Link (Projet_toto)';
      $textContent ='http://localhost/projet_toto/public/reset_password.php?token='.$testEmail['usr_token'];
      // 'Helle , You Have requested password reset!
      //please click this link to reset to enter a new password :
    //  http://projet-toto.dev/reset_password.php?token='.$testEmail['usr_token'];

      sendEmqil($to,$subject , $textContent);
      header("Location: reset_password.php");
    }

// if($testAll){}
  }
}



require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/forgetPassword.php';
require_once __DIR__.'/../view/footer.php';





































require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/forgetPassword.php';
require_once __DIR__.'/../view/footer.php';

 ?>
