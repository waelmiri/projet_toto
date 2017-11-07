<?php


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


function student($studentId){
  global $pdo;
  $sql = "SELECT stu_lastname, stu_firstname , stu_birthdate , stu_email , ses_id,
   stu_friendliness , cit_name, cit_id ,ses_number, loc_name, ses_end_date , ses_start_date
          FROM student
          INNER JOIN city ON city.cit_id = student.city_cit_id
          INNER JOIN session ON session.ses_id = student.session_ses_id
          INNER JOIN location ON location.loc_id = session.location_loc_id
          WHERE stu_id = :id ";


  $pdoStatement = $pdo->prepare($sql);
  $pdoStatement->bindValue(':id',$studentId , PDO::PARAM_INT);

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




?>
