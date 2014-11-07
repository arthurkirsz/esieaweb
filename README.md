Webesiea
=========

Webesiea est un projet de développemment d'un service web dans le cadre du cours programmation web de 5ème année à l'ESIEA. 

Il est demandé de réaliser une application web MVC orientée objet.

Ce projet est un gestionnaire de congés pour les entreprises. La structure de base de l'application est un fork de PHP-LOGIN (base MVC).


La base de donnée est composé de quatre table: user, request, company et exercice. Les utilisateurs appartiennent à une société. Ils font des requêtes qui ont un impact sur le solde de congés, qui est crédité à chaque changement d'exercice. Les requêtes sont validées par un manager (la table user possède un attribut validateur qui fait référence à l'id d'un autre utilisateur). 


Fonctionnalités implémentées
  - Gestion des utilisateur
  - Gestion de la hiérarchie
  - Gestion des demandes de congés
