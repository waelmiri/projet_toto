<?php

/*
EXERCICE 4
------------------------
- ajouter un champ (dans phpMyAdmin) nomm� "usr_token" qui
 sera une chaine de 32 caract�res
- ajouter une page "mot de passe oubli�"
(public+view) dans le projet TOTO (+lien sur page signin)
- cr�er le formulaire avec email
- lorsque le formulaire est soumis en POST :
	* r�cup�rer les donn�es
	* v�rifier qu'elles soient valides
	* faire une requ�te pour r�cup�rer le user avec cet email
		** si aucun r�sultat, affich� un message d'erreur
		** sinon :
			$ r�cup�rer l'id du user
			$ remplir par un md5() al�atoire le champ "token" de ce user
			$ g�n�rer le lien suivant : http://projet-toto.dev/reset_password.php?token=#TOKEN# (o� #TOKEN# est le md5() g�n�r� pour ce user

- ajouter une page "reset_password.php" (public+view) dans le projet TOTO (aucun lien)
- tester si le token est pr�sent dans l'URL (GET)
- si non, => erreur
- si oui :
	* r�cup�rer le token et r�cup�rer l'ID du user correspondant au token
	* afficher le formulaire avec password et confirmation de password
	* une fois le formulaire soumis :
		** r�cup�rer les donn�es
		** valider les donn�es (taille du password et 2 passwords �gaux)
		** changer le password dans le table user (ne pas oublier le hash)
		** vider le champ token dans la table pour le user
		** rediriger sur la page de signin

EXERCICE-extra
------------------------
- lorsque le nouveau mot de passe est soumis, connecter aussit�t le user
- lors du signup, connecter aussit�t le user
*/
