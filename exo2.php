<?php

/*
EXERCICE 2
------------------------
- ajouter une page de sign in (public+view) dans le projet TOTO (+lien navbar)
- créer le formulaire avec email et mot de passe
- lorsque le formulaire est soumis en POST :
	* récupérer les données
	* vérifier qu'elles soient valides
	* faire une requête pour récupérer le user avec cet email et ce mot de passe
		** si aucun résultat, affiché un message d'erreur
		** sinon, afficher l'id et l'adresse IP de l'utilisateur

- pour garder la connexion du user, il faut utiliser un système de sessions en PHP
	* rechercher quelle fonction doit être placée au début
   de chaque fichier appelé (public/*.php)
	* ensuite, rechercher quelle variable superglobale (un array) on peut
  utiliser pour persister des données d'une page à l'autre (avec les sessions)
	* comment est fait le lien entre l'utilisateur et la session auquel il est lié ?
	* modifier le code du signin pour mettre en session l'id du user
	* dans la navbar, afficher l'id de l'utilisateur connecté s'il y en a un

EXERCICE++
------------------------
- si ce n'est pas déjà le cas, encoder le mot de passe lors du signup avec
 password_hash() et vérifier le mot de passe (dans le signin) avec password_verify()
- si il y a un user connecté, alors cacher les liens "Signin" & "Signup" de la navbar
- dans la navbar, si il y a un user connecté, ajouter un lien de déconnexion vers
 public/disconnect.php (qui va supprimer toutes les données en session)
- lors de la connexion, mettre en session l'adresse IP en plus de l'id du user

EXERCICE-extra
------------------------
- à chaque page, vérifier que l'adresse IP de l'utilisateur connecté et
 bien la même que celle en session. Sinon => déconnexion
*/
