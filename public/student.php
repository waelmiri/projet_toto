<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';
require_once __DIR__.'/../inc/functions.php';

$studentId = isset($_GET['id']) ? intval($_GET['id']) : 0 ;
  $etudiant = student($studentId);

  $day = $etudiant['stu_birthdate'];
  $tody = date('Y');
  $result = $tody - $day;

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/student.php';
require_once __DIR__.'/../view/footer.php';
