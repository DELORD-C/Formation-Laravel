# Laravel

## Liens Utiles

Github
> https://github.com/DELORD-C/laravel-2023

Documentation
> https://laravel.com/docs/9.x

Conférence
> https://bbb.dawan.fr/b/cle-hci-tyj-dqt

Php
> https://php.net

Composer
> https://getcomposer.org/

NodeJs
> https://nodejs.org/en/download/

Programme de formation
> https://www.dawan.fr/formations/php/framework-php/Laravel--Initiation-Approfondissement

Règles de validation
> https://laravel.com/docs/9.x/validation#available-validation-rules

Doc Carbon
> https://carbon.nesbot.com/docs/

Ahaslides
> https://ahaslides.com/fdj

## Commandes utiles
Créer un fichier sql pour appliquer une migration
```shell=
php artisan migrate --pretend --no-ansi > migrate.sql
```

## Installation

```shell=
composer create-project laravel/laravel:^9.0 laravel
```

Installer la database :

- Activer l'extenstion sqlite pdo de php
- Modifier `.env` :
```shell=
DB_CONNECTION=sqlite
##Enlever le reste des DB_
```
- Créer un fichier vide `database/database.sqlite`

## Architecture
https://laravel.com/docs/9.x/structure
```php
app/                       //Coeur du code de notre app
bootstrap/
    app.php                    //Fichier de lancement de notre app
    cache/                     //Cache des fichiers auto générés
config/                    //Fichiers de configuration
    app.php                    //Plusieurs options générales utiles
database/                  //Fichiers de migration
lang/                      //Fichier de language
public/                    //Racine web du serveur
    index.php                  //Point d'entrée des requètes
resources/                 //Contient les vues et les assets non compilés
routes/                    //Définition des routes
    web.php                    //Middleware web
    api.php                    //Middleware api
    console.php                //Commandes
    channels.php               //Diffusion d'évennements
storage/                   //Logs, blade compilé, sessions, caches
tests/                     //Tests automatisés
vendor/                    //Dépendances composer
.env                       //Configuration spécifique à l'environnement
```

### Starter Kit
```shell=
composer require laravel/breeze
php artisan breeze:install
npm install
npm run dev
php artisan migrate
php artisan serve
```

Accéder à l'url http://localhost:8000


### Composants à créer pour authentification

- Model User
- Migration
- Controller
    - Register
    - Store
    - Login
    - Auth
    - Logout
- Routes
    - Register
    - Store
    - Login
    - Auth
    - Logout
- Vues
    - Login
    - Register


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

![](https://hedgedoc.dawan.fr/uploads/upload_0806898cea5565faad9f52eac3c1c4d0.png)

## Tests

Penser à utiliser `php artisan config:clear` après modification du fichier de configuration des tests `phpunit.xml`

## En plus du programme :

Telescope
Ajax
Events
Logs
Gestion des fichiers
API packages ?
laravel-permission
Pagination


## Exercice

Ajouter la fonctionnalité des likes :
- Un utilisateur connecté doit pouvoir "liker" ou "unliker" un commentaire
- Le nombre de like doit apparaitre sur chaque commentaire
- (optionnel) Empecher un utilisateur de "liker" son propre commentaire

Ajouter un rôle modérateur :
- Un modérateur possède les même droits qu'un utilisateur connecté mais en plus il peut modifier et supprimer n'importe quel commentaire

Ajouter un système de parrainnage
- Lorsqu'un utilisateur créé un compte il peut renseigner un mail de son parrain, si le compte existe, alors une relation est créée entre les deux comptes (One to Many intra table users)
