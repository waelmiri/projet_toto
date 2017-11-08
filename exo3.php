<?php

/*
EXERCICE 3
------------------------
- lors de l'inscription, donner le role "user"
- inscrire en tout au moins 2 comptes utilisateur
- changer le rôle d'un des 2 comptes en "admin"
- on va restreindre l'accès aux pages selon le role du user connecté :
	* si un user est connecté mais n'a pas le droit de voir une page =>
   afficher une page "403 Forbidden"
	* si un user est connecté et a le droit de voir la page,
   ne rien faire de plus (juste afficher la page normalement)
	* si aucun user est connecté et que la page nécessite un user
   (peu importe le role), alors rediriger vers la page de "Signin"
	* voici la liste des pages et des roles pouvant y accéder :
		** index : tout le monde
		** signin : tout le monde
		** signup : tout le monde
		** add/edit : role "admin"
		** toutes les autres pages : role "user" ou "admin"

EXERCICE++
------------------------
- dans la navbar et dans list, n'afficher les liens (add, edit, etc.)
  que si l'utilisateur connecté a le droit d'accéder à la page
  de destination du lien

EXERCICE-extra
------------------------
- vous pouvez vous amusez à "styliser" la page "403 Forbidden"
- ajouter une page "users" (public+view), restreinte au role "admin" et
  permettant de gérer les utilisateurs :
	* liste (<table>) de tous les users
	* pour chaque user, on a un menu déroulant des roles possibles et le role de chaque user est "selected"
	* permettre, avec un formulaire, de changer le role d'un user
*/
