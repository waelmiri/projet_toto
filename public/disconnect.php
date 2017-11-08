<?php

require_once __DIR__.'/../inc/config.php';

session_start();
if($_SESSION['username']){
echo 'Welcome monsieur ' . $_SESSION['username'];
}


session_unset();

session_destroy();
echo "vous etes déconnecté";
header("Location: index.php");











 ?>
