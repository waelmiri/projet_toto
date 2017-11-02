<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

if (!empty($_GET['id'])) {
  $update = isset($_GET['id']) ? intval($_GET['id']) : 0;
 $sql = "SELECT  stu_lastname, stu_firstname , stu_birthdate , stu_email , stu_friendliness , cit_name ,ses_number, loc_name
         FROM student
         INNER JOIN city ON city.cit_id = student.city_cit_id
         INNER JOIN session ON session.ses_id = student.session_ses_id
         INNER JOIN location ON location.loc_id = session.location_loc_id
         WHERE stu_id = :id ";
$pdoStatement = $pdo->prepare($sql);
$pdoStatement->bindValue(':id',$update , PDO::PARAM_INT);
if ($pdoStatement->execute() === false) {
   print_r($pdoStatement->errorInfo());
   exit;
}
$etudiant1 = $pdoStatement->fetch(PDO::FETCH_ASSOC);









}

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/edit.php';
require_once __DIR__.'/../view/footer.php';
