<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendEmqil($to, $subject, $htmlContent , $textContent=''){
  global $config;
// TODO move the phpmailer code here , and replace name strings with parametres


//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);  //objet                            // Passing `true` enables exceptions
try {
  //Server settings
  $mail->SMTPDebug = 2;                                 // Enable verbose debug output
  $mail->isSMTP();                // method                            // Set mailer to use SMTP
  $mail->Host     = $config['MAIL_HOST'];  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = $config['MAIL_USERNAME'];                 // SMTP username
  $mail->Password = $config['MAIL_PASSWORD'];                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  // Add this and it will works
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'verify_self_signed' => true,
    )
  );

  //Recipients
  $mail->setFrom('theblack.north1989@gmail.com', 'Mailer');       // method setform
  $mail->addAddress($to);     // Add a recipient  // method


  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = $subject;
  $mail->Body    = $htmlContent;
  $mail->AltBody = $textContent;

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}


function showAll($page){
  global $pdo;

  $offset = ($page-1) * 5;

  if ($offset <= 0 ) {
    $offset = 0;
  }

  $sql = "SELECT *
  FROM student
  LIMIT 5
  offset $offset ";

  $pdoStatement = $pdo->query($sql);
  // Si erreur dans la requête
  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }
  // Récupération des résultats
  $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

  return $student;

  }


function student($id){
  global $pdo;
  $sql = "SELECT stu_lastname, stu_firstname , stu_birthdate , stu_email , ses_id,
   stu_friendliness , cit_name, cit_id ,ses_number, loc_name, ses_end_date , ses_start_date
          FROM student
          INNER JOIN city ON city.cit_id = student.city_cit_id
          INNER JOIN session ON session.ses_id = student.session_ses_id
          INNER JOIN location ON location.loc_id = session.location_loc_id
          WHERE stu_id = :id ";


  $pdoStatement = $pdo->prepare($sql);
  $pdoStatement->bindValue(':id',$id , PDO::PARAM_INT);

  if ($pdoStatement->execute() === false) {
    print_r($pdoStatement->errorInfo());
    exit;
  }
  $etudiant = $pdoStatement->fetch(PDO::FETCH_ASSOC);

return $etudiant;
}


function search($search){
  global $pdo;
  $search = preg_replace("#[^0-9a-z]#i","",$search);
  $sql = " SELECT *
  FROM student
  INNER JOIN city ON city.cit_id = student.city_cit_id
  WHERE stu_lastname LIKE '%$search%'
  OR stu_firstname LIKE '%$search%'
  OR stu_email LIKE '%$search%'
  OR cit_name LIKE '%$search%'  ";


  $pdoStatement = $pdo->query($sql);

  // Si erreur dans la requête
  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }

//while ($pdoStatement->fetch(PDO::FETCH_ASSOC)) {
  $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  //$row['stu_lastname']. $row['stu_firstname'].$row['stu_email'];
//}

  return $student;
}

function training(){

global $pdo;

$sql1 = 'SELECT *
FROM training';
$pdoStatement = $pdo->prepare($sql1);
$pdoStatement->execute();
$training =$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

return $training;

}


function session(){

global $pdo;

$sql = " SELECT ses_id, ses_number, ses_start_date, ses_end_date, tra_name
        FROM session
        INNER JOIN training ON training.tra_id = session.training_tra_id";
$pdoStatement = $pdo->prepare($sql);

if ($pdoStatement->execute() === false) {
  print_r($pdoStatement->errorInfo());
  exit;
}
$session =$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
return $session;
}

function sessionId($ses_id){

  global $pdo;
  $sql2 = " SELECT *
            FROM student
            INNER JOIN session ON session.ses_id = student.session_ses_id
            WHERE ses_id = :id";
  $pdoStatement = $pdo->prepare($sql2);
  $pdoStatement->bindValue(':id',$ses_id,PDO::PARAM_INT);

  if ($pdoStatement->execute() === false) {
    print_r($pdoStatement->errorInfo());
    exit;
  }
  $sessionId = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  return $sessionId;
}

function countt(){

global $pdo;

$sql = "SELECT count(*) AS nb, cit_name, cit_id
        FROM student
        INNER JOIN city ON city.cit_id = student.city_cit_id
        GROUP BY cit_name ";
$pdoStatement = $pdo->query($sql);

if ($pdoStatement === false) {
  print_r($pdo->errorInfo());
  exit;
}
$count = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

  return $count;
}

function delete($de){

global $pdo;

$sql3 = " DELETE
          FROM student
          WHERE stu_id = :de ";
    $pdoStatement = $pdo->prepare($sql3);
    $pdoStatement->bindValue(':de', $de , PDO::PARAM_INT);

    if ($pdoStatement->execute() === false) {
      print_r($pdoStatement->errorInfo());
    exit;
    }
    $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    echo $pdoStatement->rowCount();
    header("location: list.php");

  return  $student;
}

function city(){

  global $pdo;

  $sql = "SELECT cit_name ,cit_id FROM city";
  $pdoStatement = $pdo->prepare($sql);
  $pdoStatement->execute();
  $cities = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

  return $cities;
}


function verification($email){

  global $pdo;

  $sql ="SELECT * FROM user WHERE usr_email = :email";
  $pdoStatement = $pdo->prepare($sql);
  $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);

  if ($pdoStatement->execute() === false) {
    print_r($pdoStatement->errorInfo());
    exit;
  }
  $test = $pdoStatement->fetch(PDO::FETCH_ASSOC);

  return $test;

}

function testEmail($email){
  global $pdo;

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


  return $testEmail;
}




?>
