# Laravel

### Rappels :


Qu'est ce qu'une library / bibliothèque ?
> Une boîte à outils pour vous aider à développer

Qu'est ce qu'un framework ?
> Une infrastructure logicielle clés en main pour coder plus vite

Laravel est un framework possédant une structure MVC

Qu'est ce que la structure MVC ?
> Un motif de développement utilisant 3 composants principaux : Modèle, Vue et Controlleur

Qu'est ce qu'une architecture centrée HTTP (REST) ?
> Ensemble de contraintes web permettant aux services d'agir en utilisant les méthodes HTTP (GET, POST, etc...)

### Versions de laravel : https://laravelversions.com/fr

## Installation :
https://laravel.com/docs/9.x/installation#installation-via-composer

Créer un projet composer :
```shell
composer create-project laravel/laravel example-app
 
cd example-app
 
php artisan serve
```

*Il existe d'autres méthodes (laravel bin, docker)*

Installer la database :

- Activer l'extenstion sqlite pdo de php
- Modifier `.env` :
```shell
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

## Outils

Mode Maintenance : https://laravel.com/docs/9.x/configuration#maintenance-mode

Starter kits :
https://laravel.com/docs/9.x/starter-kits

## Commandes utiles

Lancer le serveur artisan
```php
php artisan serve
```
Lister les routes
```php
php artisan route:list
```
Créer une migration
```php
php artisan make:migration [nom_de_la_migration] --options
```
Créer un controlleur
```php
php artisan make:controller [NomController] --resource --model=[Nom du modèle]
```
Vider les caches laravel
```php
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
```

## Controlleurs
https://laravel.com/docs/9.x/controllers


## Routes
https://laravel.com/docs/9.x/routing#basic-routing
> Important : nommer les paramètres par le type d'objet qu'on veut recevoir (ex : **/edit/{id}** ne marchera pas alors que **/edit/{post}** fonctionnera)

## Auth
https://www.positronx.io/laravel-custom-authentication-login-and-registration-tutorial/

## CRUD
https://www.itsolutionstuff.com/post/laravel-9-crud-application-tutorial-exampleexample.html

- Blade
    - Inclusion
    - Structures de contrôle
    - Gestion des assets
- ORM
    - Custom Query


## Call API
```php
$response = Http::get('https://api.fr/infos');
echo $response->body();
```

## Seeders

https://laravel.com/docs/9.x/seeding#writing-seeders

## Middleware

## Roles & Permissions


## Tests
https://laravel.com/docs/9.x/testing#main-content
>Afin d'éviter les changements en Base de donnée, utiliser :
```php
use databaseTransactions;
```

## Dusk
https://laravel.com/docs/9.x/dusk#main-content

## Traduction
https://laravel.com/docs/9.x/localization#defining-translation-strings

## Mails
https://laravel.com/docs/9.x/mail

adresse gmail : testdawan69@gmail.com
mot de passe : hrykbtlkhvjdjhjz

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=testdawan69@gmail.com
MAIL_PASSWORD=hrykbtlkhvjdjhjz
MAIL_ENCRYPTION=ssl

---
---
---

# Projet Intranet
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

---

## Architecture
- Dashboard (auth)
    - CRUD Comptes utilisateurs
    - CRUD Client
    - CRUD Formations
    - CRUD Sessions
        - View => Clients
- Login / Register

## Modèles
Client
```
- firstname (String)
- lastname (String)
- society (String)
- user_id (Int)
- phone_number (String)
- session_count (Fonction)
- turnover (Fonction)
- passed_sessions (Fonction)
```
Formation
```
- name (String)
- program (String)
- price (Int)
- sold_count (Int)
- PFA_available (Bool)
```
Session
```
- start_date (Timestamp)
- end_date (Timestamp)
- formation (Formation)
- seller (User)
- attendents (Fonction / Client list)
- total_price (Fonction)
```
(optionnel) Participations
```php
- client_id
- session_id
```

## Précisions
- Un header et une navbar doivent être présents sur chaque page du site excepté sur la page login/register, le nom et l'image de profil de la personne connectée doit apparaitre.
- Utiliser l'inclusion blade pour éviter la redondance de code dans les templates
- Il est préférable de créer des modèles pour chaque entité
- Sur chaque page de liste, il doit être possible de rechercher une entrée spécifique

---

### Bonus
- Faire apparaître la date du jour formatée en fr/FR dans le header
- Faire apparaître la météo du jour en fonction de la zone géographique du client dans le header
