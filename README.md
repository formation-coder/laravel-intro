# Clonage et installation du dépôt 

Copier le fichier `.env.example` en `.env` : 
```sh 
cp .env.example .env
```

Installer le projet à l'aide de composer : 
```sh
composer install
```

Créer une clé pour le .env
```sh
php artisan key:generate
```

À vous de jouer !!!

## La BDD dans Laravel

Il va y avoir  2 grands concepts : la gestion des bases de données en tant que telles et les requêtes **pleines** c'est à dire pure SQL. 

Et aussi le concept d'ORM (cf Cordelia et sa team pour la restit :p ) : Eloquent ORM. 

La toute toute première étape : 
 - se connecter à MySQL
   - créer une base de données, 
   - créer un utilisateur en base de données pour notre application
   - donner les droits à l'utlisateur sur la base créée. 

```sh
sudo mysql # ou mysql -u root -p 
```

```sql
CREATE DATABASE `simplon_laravel_tuto`; 
CREATE USER simplon_laravel@localhost IDENTIFIED BY 'password'; 
GRANT ALL ON `simplon_laravel_tuto`.* TO simplon_laravel@localhost; 
```

La configuration de laravel se fait dans le fichier `.env`. On va l'éditer pour y configurer la base de donnée :
```
DB_DATABASE=simplon_laravel_tuto
DB_USERNAME=simplon_laravel
DB_PASSWORD=password
```

Maintenant regardons le dossier `database\migrations`. 
Il y a par défaut 3 fichiers, chaque fichier commence par un **timestamp** (horodatage).
Il y a notamment un fichier qui permet de créer une table `users` avec entre autre un id, un nom, un email, un mot de passe, etc ...

Pour que cette table soit créée, on utilise la commande 
```sh
php artisan migrate
```

## Un ORM, keskekoidonk ?


Table <-> Model
---------------
users <-> User
categories <-> Category
pictures <-> Picture
videos <-> Video
animals <-> Animal
salaries <-> Salary

La clé primaire, c'est `id`, en entier non signé (c'est à dire positif) en `auto_increment`. 

Pour créer notre modèle, on va (encore) utiliser la commande artisan : 
```php
php artisan make:model User
```
(en fait il existe déjà). 

On peut l'utiliser comme un objet et il est lié à la table `users`, on peut le 
 - sauver : `$user->save()`
 - modifier : `$user->update()`
 - rechercher : `User::find(1)` -> recherche l'utilisateur dont l'id vaut 1 
 - supprimer : `$user->delete()`


// TODO : parler des manipulations possibles sur les modèles 

// TODO : parler de la validation des formulaires

Maintenant que nous disposons de modèle et d'une base de données, nous créons un contrôleur pour gérer l'enrigstrement. 
Il contient 2 fonctions : 
 - `create` => cette fonction renvoi le formulaire d'enregistrement
 - `register` => cette fonction traite le formulaire d'enregistrement et l'utilisateur est créé si tout s'est bien passé. 

Bien entendu, comme nous sommes bien élevés et de bon développeurs, toutes les méthodes de nos contrôleurs (et autres) sont **commentées** !!
