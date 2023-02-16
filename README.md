# Symfony TP3

---

## Partie 1

> Quelles sont les fonctionnalités principales du Symfony CLI ?

- Créer des nouveaux projets Symfony
- Développer des projets avec un serveur web local avec un support TLS
- Vérifier des vulnérabilités de sécurité
- Avoir une intégration complète avec Platform.sh

---

## Partie 2

> Expliquer ce qu'est le fichier .env

Un fichier `.env` contient des variables d'environnement utilisables dans tout le projet.

> Expliquer pourquoi il faut changer le connecteur à la base de données

Parce qu'on veut utiliser une DB SQLite ? 

> Commencer à réfléchir aux relations à définir entre les entités (Many To One/Many To Many/...) ?

Entre `Reaction` et `Link` : ManyToOne. Un `Link` peut avoir plusieurs `Reaction`, mais une `Reaction` ne peut avoir qu'un `Link`  
Entre `User` et `Reaction` : OneToMany. Un `User` peut avoir plusieurs `Reaction`, mais une `Reaction` ne peut avoir qu'un `User`  
Entre `User` et `Link` : OneToMany. Un `User` peut avoir plusieurs `Link`, mais un `Link` ne peut avoir qu'un `User`  

---

## Partie 3

> Première réflexion : quelles routes qui vont devoir être créées dans l’application en fonction des différentes vues ?

| Method | Route        | Controller     |
|--------|--------------|----------------|
| GET    | /            | HomeController |
| GET    | /user/{user} | UserController |
| POST   | /user        | UserController |
| DELETE | /user/{user} | UserController |
| POST   | /link        | LinkController |
| DELETE | /link/{id}   | LinkController |
| GET    | /link        | LinkController |

> Qu'est-ce que le ParamConverter ? À quoi sert le Doctrine ParamConverter ?

Le `ParamConverter` est une annotation. Il sert à convertir une string donnée dans l'url en objet correspondant

---

## Partie 4

> Qu'est-ce qu'un formulaire Symfony ?

Un formulaire Symfony fait tout ce qu'un formulaire classique fait, avec des fonctionnalités en plus, comme la vérification de la provenance de la requête, ou la méthode pour récupérer directement un objet avec `getData`. 

> Quels avantages offrent l'usage d'un formulaire ?

On peut ajouter, modifier ou supprimer des entrées à la DB facilement

> Quelles sont les différentes personnalisations de formulaire qui peuvent être faites dans Symfony ?

Il y a des thèmes de base intégrés à Symfony. Certains sont organisés simplement avec des `<div>` ou des `<table>`. Il y a aussi des thèmes utilisant des classes Bootstrap, 2 par version (entre la 3 et la 5), un layout horizontal et un vertical. Il y a aussi deux thèmes pour le framework Foundation CSS, pour les versions 5 et 6. Enfin, il y a un thème utilisant TailwindCSS