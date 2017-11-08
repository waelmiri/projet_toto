<?php
require_once __DIR__.'/../inc/config.php';
session_start();

if(empty($_SESSION['username'])){
  header('Location: signin.php');
  }elseif(isset($_SESSION['username']) && $_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin' ){
    echo 'Welcome monsieur ' . $_SESSION['username'];
  } elseif(isset($_SESSION['username']) && $_SESSION['IP'] == $_SERVER['SERVER_ADDR']){
      echo "voutre IP n'est pas correct";
      session_destroy();
    } else{
        header('Location: signin.php');
      }

if(!empty($_POST['upload'])){

  print_r($_POST);

  print_r($_FILES);
  // Si des fichiers ont été envoyés
  if(!empty($_FILES)){

  	$fileForm = isset($_FILES['fileForm']) ? $_FILES['fileForm'] : array();

    if ($fileForm['size'] < 100000){
    	$formOk = true;
    	$allowedExtensions = array('csv');
    	if ($fileForm['type'] != 'application/octet-stream') {
    		echo "Fichier incorrect<br>";
    		$formOk = false;
    	}

    	$dotPosition = strrpos($fileForm['name'], '.');

    	$extension = substr($fileForm['name'], $dotPosition +1);

    	if(!in_array($extension, $allowedExtensions)){
    		echo "Extension incorrect<br>";
    		$formOk = false;
    	}

    	if ($formOk){

    		$newFileName = md5(uniqid().'w').'.'.$extension;

    		if (move_uploaded_file($fileForm['tmp_name'], __DIR__.'/upload/'.$newFileName)){

          $fileOpen = fopen(__DIR__.'/upload/'.$newFileName,r);
          if($fileOpen){
            while (($line = fgets($fileOpen, 4096)) !== false) {
              $explode = explode(';',$line);
              print_r($explode);

              $sql = "INSERT INTO `student`(`stu_lastname`, `stu_firstname`, `stu_email`,`stu_friendliness` ,`stu_birthdate`,`session_ses_id`, `city_cit_id`, `stu_inserted`)
              VALUES (:lastname,:firstname,:email,:friendliness,:birthday,1,4,CURRENT_TIMESTAMP)";

              $pdoStatement = $pdo->prepare($sql);
              $pdoStatement->execute(array(
                'lastname'     => $explode[0],
                'firstname'    => $explode[1],
                'email'        => $explode[2],
                'friendliness' => $explode[3],
                'birthday'     => $explode[4],

              ));
                        // $svc = $pdoStatement->fetch(PDO::FETCH_ASSOC);
                // // $lastId = $pdo->lastInsertId();
                // // header("Location: student.php?id={$lastId}");

                // if ($insert === false) {
                //   print_r($pdo->errorInfo());
                // }
            }
            fclose($fileOpen);
          }
    		}else {
    			echo "error :<br>";
    		}
  	}
  }
    else {
      echo "la taille de votre fichier est plus que 100KB";
    }
  }
}


    if(!empty($_POST['export'])){

      $expotFilename = 'export-'.date('Ymd').'.csv';

      if(file_exists($expotFilename)){
        unlink($expotFilename);
      }

    $fileForm = isset($_FILES['export']);
    $sql1 = "SELECT *
    FROM student ";
    $pdoStatement = $pdo->prepare($sql1);
    $pdoStatement -> execute(array());

    while($ligneencours = $pdoStatement->fetch(PDO::FETCH_ASSOC)){

      $export[] = array($ligneencours["stu_lastname"],$ligneencours["stu_firstname"],$ligneencours["stu_email"],$ligneencours["stu_friendliness"],$ligneencours["stu_birthdate"]);

    }
    $chemin = 'export-'.date('Ymd').'.csv';

    $fichier_csv = fopen($chemin, 'w+');
    foreach($export as $ligneaexporter){

      fputcsv($fichier_csv, $ligneaexporter, ';');
      print_r($ligneaexporter);
    }
    fclose($fichier_csv);
  }







require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/upload.php';
require_once __DIR__.'/../view/footer.php';


 ?>
