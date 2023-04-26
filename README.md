                            Notice d'utilisation du site : "Gestion des stocks St-Martin"

Le site est codé sous le format de programmation "PHP" avec une base de donnée "PHPMyAdmin"

*Partie du README :*

1. Les comptes
2. La Base de donnée (BDD)


---

1. Les comptes :
* Compte admin

- Vous pourrez créer des comptes UNIQUEMENT grâce au compte qui dispose d'un "grade administrateur", le grade administrateur se donne via la création de compte (uniquement les compte admin on accès a cette page )

Une fois la page de création de compte accéder, on pourra définir un identifiant au choix, anisi qu'un mot de passe, ce mot de passe sera haché dans la base de donnée, donc il ne faut pas perdre ce dernier, sinon la connexion à ce compte ne sera plus disponible.

Le compte administrateur pourra effectuer toute la partie administration de la gestion des stocks, ajouter, modifier, supprimer des stocks

* Compte utilisateur (alias stagiaire)

Le compte utilisateur (alias stagiaire), pourra effectuer **uniquement** ajouter, modifier la gestion du stock, il ne disposera pas de la fonction supprimer, au niveau sécurité pour la gestion des stocks

---

2. La base de donnée (BDD) :

La base de donnée est nommée : "gestion_stock_st_martin" qui dispose de plusieurs tables.

- Une table "user" où sera répertorier les utilisateurs avec les mots de passe haché

- Une table "materiel' où sera répertorier tous les stocks, ces stocks seront différencier par le "tag_appareil".
La base de données est relationelle, pour éviter la répetition de données, la relationelle des tables se fait via des int. (l'id)

- Les tables relationelle sont : type_appareil, marque, site, processeur, disque_dur qui sont reliée avec la table materiel
---
