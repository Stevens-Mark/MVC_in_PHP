# Adopt an MVC architecture in PHP

This is the Git repository that supports the **Adopt an MVC architecture in PHP** course. From this repository, you will be able to retrieve the source code, located in the `blog/` folder, at each step of the project.

We provide a list of Github links, in the [Steps](#steps) section of this document, to each of the _previous_ steps. Also, to find a future step, you will have to go back to the [last step](https://github.com/OpenClassrooms-Student-Center/4670706-architecture-mvc-php). If you want to navigate through the steps directly from your local repository, be aware that this repository uses [Git tagging](https://git-scm.com/book/fr/v2/Les-bases-de-Git-%C3%89tiquetage) to define each step.

This document will also provide you with some tips and information on how to install the project.

## Steps

* [Learn the limitations of beginner code](https://github.com/OpenClassrooms-Student-Center/4670706-architecture-mvc-php/tree/apprehendez-limites-code-debutant)

## Installation

### Prerequisites

First of all, this project is designed to work with the latest versions of PHP (currently `^8.0`). You will need to install it on your machine.

Furthermore, this project requires the use of a MySQL database. You will need to install AND configure your database, and create a user. If you want to refresh your memory, you can reread the chapter [Setting up a database with phpMyAdmin](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/913893-mettez-en-place-une-base-de-donnees-avec-phpmyadmin)! By default, the application uses a database named `blog`, accessible to a user `blog` whose password is `password`.

### Configuration

Once you have installed your MySQL server, you can replace the credentials used in the code with your own. In the `blog/index.php` file, on line 17:

``php
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'password');
```

You should also populate your database. You can load the default schema (and some data), contained in the file `db.sql`. To do this, you can use your MySQL administration interface, or run the following command, if you are on Linux:

``bash
mysql -ublog -p blog < db.sql
```

### Launching

You can use PHP's built-in web server to launch this project. Go to the `blog/` folder, then run the command `php -S localhost:8080` (you can choose any port you like if `8080` is already in use).

Alternatively, and if you have a _stack_ WAMP or LAMP installed, you can configure your Apache server to handle the `blog/` folder.





# Adoptez une architecture MVC en PHP

Voici le dépôt Git qui sert de support au cours **Adoptez une architecture MVC en PHP**. À partir de ce dépôt, vous pourrez récupérer le code source, situé dans le dossier `blog/`, à chaque étape de l'avancement du projet.

Nous vous fournissons une liste de liens Github, dans la section [Étapes](#etapes) de ce document, vers chacune des étapes _précédentes_. Aussi, pour trouver une étape future, vous devrez obligatoirement repasser par la [dernière étape](https://github.com/OpenClassrooms-Student-Center/4670706-architecture-mvc-php). Si vous souhaitez naviguer dans les étapes directement depuis votre dépôt local, sachez que ce dépôt utilise l'[étiquettage Git](https://git-scm.com/book/fr/v2/Les-bases-de-Git-%C3%89tiquetage) pour définir chaque étape.

Ce document vous fournira aussi quelques astuces et informations sur la manière d'installer le projet.

## Étapes

* [Appréhendez les limites d'un code de débutant](https://github.com/OpenClassrooms-Student-Center/4670706-architecture-mvc-php/tree/apprehendez-limites-code-debutant)

## Installation

### Prérequis

Tout d'abord, ce projet est fait pour fonctionner avec les dernières versions de PHP (actuellement `^8.0`). Il vous faudra donc l'installer sur votre machine.

De plus, ce projet nécessite l'utilisation d'une base de données MySQL. Vous devrez donc installer ET configurer votre base de données, et créer un utilisateur. Si vous voulez vous rafraîchir la mémoire, vous pouvez relire le chapitre [Mettez en place une base de données avec phpMyAdmin](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/913893-mettez-en-place-une-base-de-donnees-avec-phpmyadmin) ! Par défaut, l'application utilise une base de données dénommée `blog`, accessible à un utilisateur `blog` dont le mot de passe est `password`.

### Configuration

Une fois que vous avez installé votre serveur MySQL, vous pouvez remplacer les identifiants utilisés dans le code par les votre. Dans le fichier `blog/index.php`, à la ligne 17 :

```php
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'password');
```

Vous devriez aussi remplir votre base de données. Vous pouvez charger le schéma par défaut (et quelques données), contenu dans le fichier `db.sql`. Pour ce faire, vous pouvez utiliser votre interface d'administration MySQL, ou bien lancer la commande suivante, si vous êtes sous Linux :

```bash
mysql -ublog -p blog < db.sql
```

### Lancement

Vous pouvez utiliser le serveur web intégré à PHP pour lancer ce projet. Placez vous dans le dossier `blog/`, puis lancez la commande `php -S localhost:8080` (vous pouvez choisir le port que vous souhaitez si `8080` est déjà utilisé).

Alternativement, et si vous avez une _stack_ WAMP ou LAMP installée, vous pouvez configurer votre serveur Apache pour qu'il gère le dossier `blog/`.
