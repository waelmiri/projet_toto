<?php

//J'inclus la config
require_once __DIR__.'/../inc/config.php';
require_once __DIR__.'/../inc/functions.php';


if (!empty($_GET['search'])) {

    $student = search($_GET['search']);

}elseif (!empty($_GET['de'])){

  $delete = isset($_GET['de']) ? intval($_GET['de']) : 0;
  $student = delete($delete);
}else{
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

  $student = showAll($page);

}











//A la fin, j'afficher
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';

?>
