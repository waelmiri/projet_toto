<pre>

<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';

$sql = 'SELECT *
        FROM student ';

  $pdoStatement = $pdo->query($sql);
  // Si erreur dans la requête
  if ($pdoStatement === false) {
  	print_r($pdo->errorInfo());
  	exit;
  }
  // Récupération des résultats
  $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  print_r($student);
  echo '<br>';

//A la fin, j'afficher
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';















?>

</pre>
