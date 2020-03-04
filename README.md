## SOMMAIRE
### <a href="#installation-du-tchat-js-1">Installation du TCHAT-JS<a>
##### <a href="#1-nous-allons-télécharger-et-installer-quelques-programmes-avant-de-passer-à-linstallation-du-tchat-js-1">1) Nous allons télécharger et installer quelques programmes avant de passer à l'installation du TCHAT-JS<a>
##### <a href="#2-installation-du-tchat-js-1">2) Installation du TCHAT-JS<a>
##### <a href="#3-quelques-paramètres-phpmyadmin-et-phpmysql-1">3) Quelques paramètres (phpMyAdmin et PHP/MySQL)<a>
### <a href="#utilisation-du-tchat-js-1">Utilisation du TCHAT-JS<a>
---

## Installation du TCHAT-JS
#### 1) Nous allons télécharger et installer quelques programmes avant de passer à l'installation du TCHAT-JS
- Télécharger un éditeur de texte (Notepad++, Sublime Text, ...)
- Assurez-vous d'avoir un navigateur Web (Mozilla Firefox, Internet Explorer, Google Chrome, Opera, Safari, ou tout autre navigateur auquel vous êtes habitués pour aller sur le web)
- Veuillez télécharger la dernière version du serveur WAMP http://www.wampserver.com/ si vous êtes sous Windows. Si ce n'est pas le cas, <a href="https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/4237816-preparez-votre-environnement-de-travail">appuyez ici</a> pour plus de renseignement.
#### 2) Installation du TCHAT-JS
Après avoir installé votre serveur Web correctement. Nous allons maintenant télécharger et ensuite installer notre <strong>Projet JS "TCHAT-JS"</strong>
- Lancez votre serveur WAMP, vérifier que vous avez un icone sur la barre de tâche à droit. Voir exemple d'icone : <img src="https://mytechnozone.com/wp-content/uploads/2015/01/wamp-status.jpg" width="15%">
- Télécharger le projet <a href="http://inssa-insa.ascmtsahara.fr/tchat-js.zip">ici</a>
- Placez-vous sur le répertoire de votre serveur Web (C:/wamp/www/). Celui-ci sera votre répertoire de travail.
- Créer un dossier <strong>"tchat-js"</strong>
- Extraire dans ce répertoire (tchat-js), le projet télécharger sous format .zip

#### 3) Quelques paramètres (phpMyAdmin et PHP/MySQL)
Nous allons par la suite créer notre base de données MySQL sur phpMyAdmin. Et ensuite faire la connexion PHP et MySQL pour pouvoir exploiter nos données.
- Sur votre navigateur Web, entrez l'URL : <span style="background-color:#000; color:#fff">http://localhost/phpmyadmin/index.php</span>.
- Vous allez vous connecter maintenant sur phpMyAdmin avec les coordonnées par defaut :
  - Utilisateur : root
  - Mot de passe : (champ vide)
  - S'il existe un choix du serveur : MySQL
  - Appuyez sur "Éxécuter"
- Créer une base de données : "tchat"
- Une fois la base créée, placez-vous sur la base et appuyez sur <strong>"importer"</strong>
- Choissiez un fichier. Allez dans votre espace de travail, dans bdd selectionnez le fichier <strong>"tchat.sql"</strong>. Et ensuite  appuyez sur <strong>"éxécuter"</strong>

Nous avons configuré notre base de données, maintenant nous allons faire la connexion avec PHP et MySQL
- Placez-vous sur votre répertoire de travail.
- Ouvrez le fichier <strong>"connexionPDO.php"</strong> sur votre éditeur de texte.
- Modifiez les paramètres de connexion à la base de données :<br>
```
  $host = 'localhost:PORT; 
  $db = 'tchat';
  $user = 'root';
  $pass = ''; 
```
<strong>//Remplacer PORT par le port utilisé par MySQL</strong><br>
<strong>//Le mot de passe que vous avez entré lors de la connexion sur phpMyAdmin. Par défautl le champ était vide</strong>
  
## Utilisation du TCHAT-JS
Nous avons installé et configuré notre projet sur notre serveur Web. Il reste plus qu'à découvrir les différentes fonctionnalités de notre application Web TCHAT-JS
- Ouvrir le fichier index.php dans votre répertoire de travail, avec un navigateur Web.
- Vous allez avoir un URL de ce genre : D:/wamp64/www/tchat-js/index.php
- Modifier l'URL : localhost/tchat-js/index.php . On remarque ici, que nous avons remplacé "D:/wamp64/www" par "localhost".
- Vous avez maintenant votre application Web TCHAT-JS sur la page index de votre projet.

Une fois sur la page index. Vous n'avez plus besoin du fichier README.md.

Bon Tchat 😉,

INSSA Insa, INSSA Moussa, HANIN Anthony 
