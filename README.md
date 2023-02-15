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