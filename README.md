# Projet Montage d'ordinateurs

Nous allons mettre en place un projet Php, rendu sur Github/Gitlab, en utilisant des tickets (outil à définir). Le processus de travail doit être comme suit :

-   utiliser Git pour enregistrer les modifications de chaque développeur
-   une branche doit être créée pour chaque ticket de code
    -   lorsque le ticket est terminé, une Pull/Merge Request (appelée MR par la suite) doit être créée
    -   cette MR doit être relue par un autre développeur pour :
        -   remonter des incohérences
        -   vérifier que le code écrit répond à la demande
        -   vérifier que le code écrit correspond aux normes de codage défini au sein de l'équipe (et peut permettre de les définir)

Ce projet est prévu pour une équipe de 2 à 3 personnes.

## La demande client

Nous avons reçu la demande d'un client et notre équipe commerciale a décidé d'accepter le projet. Il convient maintenant de répartir le travail au sein de votre équipe et de le réaliser. Il doit être mis en place en Php procédural et Objets et le design est à votre convenance, mais doit rester au plus simple.

Le client, CLDL, vend des ordinateurs préparés par leurs équipes, à partir de pièces détachées qu'ils achètent en gros. Leurs équipes sont partagées entre les **concepteurs** (qui prévoient l'assemblage des ordinateurs) et les **monteurs** (qui vont récupérer les directives des concepteurs et préparer les machines). On considère qu'un ordinateur qui doit être monté doit avoir les pièces suivantes :

-   carte mère (1)
-   processeur (1)
-   mémoire vive (au moins 1)
-   carte graphique (1)
-   clavier (1)
-   souris / pad (1)
-   écran (au moins 1)
-   alimentation (1)
-   disque dur / SSD (au moins 1)

C'est un site réservé à ces deux équipes et personne ne doit pouvoir accéder à ses pages sans être identifié. Chaque équipe aura un identifiant et un mot de passe différent pour se connecter et utiliser des fonctionnalités différentes.

Pour ce site, il suffira d'intégrer des styles bootstrap, pas besoin d'ajouter des éléments de style supplémentaire. Le but est d'avoir un projet fonctionnel et le client reviendra éventuellement vers nous plus tard, pour améliorer le design du site.

## Partie Concepteur

Les concepteurs auront accès à un ensemble de fonctionnalités :

-   Voir des statistiques de base sur les machines conçues / préparées
-   Ajouter les pièces et gérer leur stock
-   Créer ou modifier de nouveaux modèles (ordinateur portable ou tour)
-   Répondre aux commentaires des monteurs

### Statistiques

Lorsqu'il se connecte, un concepteur a accès à plusieurs blocs, lui indiquant :

-   Les derniers commentaires des monteurs (avec une indication s'ils sont répondus ou non), les plus récents en premier
-   Les différents modèles et le nombre d'exemplaires montés, ainsi que des liens pour modifier ou archiver un modèle (on ne supprime jamais un modèle)

Il aura également un lien vers les interfaces de gestion des modèles (liste complète des modèles, avec possibilité de les modifier/archiver et d'en créer de nouveaux) et un lien pour créer un nouveau modèle.

Il aura également un lien vers les interfaces de gestion des pièces (liste complète des pièces, avec possibilité de les modifier/archiver et d'en créer de nouvelles) et un lien pour entrer des pièces dans le stock.

### Gestion des pièces

#### Lister les pièces

Cette interface affiche d'abord un tableau listant toutes les pièces, avec les éléments suivants :

-   nom de la pièce
-   marque
-   quantité en stock
-   prix
-   nombre de modèles créés avec cette pièce
-   catégories

Cette liste peut être triée par :

-   quantité en stock
-   nom
-   marque
-   prix
-   date d'ajout
-   modèles créés avec cette pièce

Cette liste peut être filtrée par :

-   en stock (case à cochée, cochée par défaut. Si cochée n'affiche que les pièces dont le stock n'est pas vide)
-   marque
-   prix (entre un minimum et un maximum)
-   catégorie(s) (processeur, carte graphique, etc.)
-   les types d'ordinateur compatibles (tour ou portable)

Des actions sont possibles sur les pièces, avec certaines restrictions :

-   Suppression / archivage :
    -   une pièce qui a déjà été utilisée dans un modèle ne peut pas être supprimée
    -   une pièce qui a déjà été utilisée dans un modèle peut être archivée (elle apparait dans l'interface, mais ne peut plus être modifiée et disparait quand son stock atteint 0)
-   modifier
-   modifier le stock

#### Ajouter / Modifier une pièce

Un formulaire permettant de modifier les propriétés de la pièce :

-   son nom
-   sa marque
-   sa description (optionnelle)
-   ses catégories associées
-   son prix d'achat (HT)
-   les types d'ordinateur compatibles (tour ou portable)

Chaque type de pièces a également des caractéristiques spécifiques :

-   Carte mère
    -   Socket / chipset
    -   Format (ATX, micro-ATX, etc.)
-   Processeur
    -   Fréquence CPU (en GHz)
    -   Nombre de cœurs
    -   Chipsets compatibles
-   Mémoire vive
    -   Capacité (en Go)
    -   Nombre de barrettes
    -   Type + Fréquence + norme mémoire (exemple : DDR4 3200 MHz PC4-25600)
-   Carte graphique
    -   Chipset
    -   Mémoire (en Go)
-   Clavier
    -   Avec ou sans fil
    -   Avec ou sans pavé numérique
    -   Type de touches
-   Souris / pad
    -   Avec ou sans fil
    -   Nombre de touches
-   Écran
    -   Taille de la diagonale
-   Alimentation
    -   Puissance (en W)
-   Disque dur / SSD
    -   Type (SSD ou disque dur)
    -   Capacité (en Go)

⚠️ Une pièce n'est plus modifiable si elle est archivée.

#### Modifier le stock d'une pièce

Un formulaire permettant d'ajouter ou de retirer du stock un certain nombre d'exemplaires d'une pièce. On veut un historique des entrées et sorties de chaque pièce, incluant la date et le nombre d'exemplaires entrés ou sortis. Cette historique sera affiché sous le formulaire de modification de stock.

#### Suppression / archivage d'une pièce

Plusieurs règles définissent si une pièce peut être supprimée ou archivée (pour l'utilisateur, il s'agira du même bouton "supprimer") :

-   Une pièce peut être supprimée si et seulement si aucun ordinateur n'a été préparé par l'équipe des monteurs **et** si son stock atteint 0.
-   Si un ordinateur a déjà été préparé avec une pièce, cette dernière peut être archivée : elle n'est plus disponible pour la création de nouveaux modèles, ni pour le montage, mais reste visible pour les monteurs.

### Modèles

Les concepteurs peuvent créer / modifier des modèles de machines à créer par les monteurs. Ils auront donc accès à un CRUD leur permettant de voir les modèles existants, les modifier, les archiver, ou en créer de nouveaux.

#### Liste

Cette interface affiche d'abord un tableau listant tous les modèles, avec les éléments suivants :

-   nom du modèle
-   nombre d'ordinateurs créés avec ce modèle
-   prix total des pièces du modèle
-   quantité en stock
-   date d'ajout
-   nombre de modèles créés avec cette pièce
-   nombre de commentaires (avec une indication si des commentaires n'ont pas été lus)

Cette liste peut être triée par :

-   quantité en stock
-   nom
-   prix
-   date d'ajout
-   nombre de modèles créés avec cette pièce

Cette liste peut être filtrée par :

-   prix (entre un minimum et un maximum)
-   catégorie(s) (processeur, carte graphique, etc.)
-   commentaires non lus (si cochée, n'affiche que les modèles avec des commentaires non lus par les concepteurs)

Des actions sont possibles sur les modèles, avec certaines restrictions :

-   Suppression / archivage :
    -   un modèle qui a déjà été monté ne peut être supprimé
    -   un modèle qui a déjà été monté peut être archivée (il apparait dans l'interface, mais ne peut plus être modifié et l'information est clairement indiquée aux monteurs, afin qu'ils n'en montent plus)
-   modifier
-   modifier le stock

#### Création / modification d'un modèle

Un formulaire permettant de modifier les propriétés du modèle :

-   son nom
-   son type (ordinateur portable ou tour)
-   sa description (optionnelle)
-   choisir les différentes pièces :
    -   carte mère (1)
    -   processeur (1)
    -   mémoire vive (au moins 1)
    -   carte graphique (1)
    -   clavier (1)
    -   souris / pad (1)
    -   écran (au moins 1)
    -   alimentation (1)
    -   disque dur / SSD (au moins 1)

Lors de la validation du formulaire (après l'envoi, avant insertion en BdD), il faut vérifier que toutes les pièces choisies sont compatibles avec le type d'ordinateur choisi.

⚠️ Un modèle n'est plus modifiable s'il est archivé.

Une page de détails sur un modèle doit donner rapidement les informations nécessaires au montage (nom et type de la pièce sont les informations importantes). Sous ces informations, afficher un formulaire de commentaire et la liste des commentaires précédents (le plus récent en haut), avec la date et le nom d'utilisateur l'ayant créé. Ouvrir cette page marque les commentaires comme lus par l'équipe concepteur.

## Partie Monteur

Les monteurs auront accès à un ensemble de fonctionnalités :

-   Voir les modèles proposés par les concepteurs
-   Leur faire des retours (commentaires) sur les différents modèles
-   Indiquer les modèles montés (et le nombre d'exemplaires)

### Liste des modèles

Une liste des modèles sous forme de tableau, indiquant sur chaque modèle :

-   le nom du modèle
-   la description
-   la liste des pièces
-   le nombre de commentaires **non lus** par les monteurs sur le modèle
-   des actions :
    -   ajouter des modèles montés
    -   voir le modèle

Une page de détails sur un modèle doit donner rapidement les informations nécessaires au montage (nom et type de la pièce sont les informations importantes). Sous ces informations, afficher un formulaire de commentaire et la liste des commentaires précédents (le plus récent en haut), avec la date et le nom d'utilisateur l'ayant créé. Ouvrir cette page marque les commentaires comme lus par l'équipe montage.

### Marquer un modèle comme monté

Sur le détail du modèle ou la liste des modèles, un bouton doit être présent pour qu'un monteur puisse indiquer que ce modèle a été fabriqué.

⚠️ Il faut alors que les pièces utilisées soient déduites du stock.

## Critères d'acceptation (notation)

Pour valider le rendu, voici ce qui est attendu par votre chef de projet, pour chacun d'entre vous :

-   Création/manipulation d'au moins une classe/objet
-   Création de requêtes de BdD (au moins une insertion, une mise à jour et une récupération de données)
-   Manipulation d'un formulaire complexe (filtre, création/modification d'un objet, etc.)
-   Respect des normes PSR (1, 12 et 4) pour tout le code
-   Chaque ticket fait l'objet d'une PR

Éléments communs à fournir :

-   Un schéma de base de données
-   un dump de la base de données finale

## Conseils techniques

### Tickets
Pour les tickets, l'idéal reste de faire des user stories, si ça vous rappelle quelque chose 😉 

Je suis un administrateur, je veux créer un nouveau produit
J'ai accès à un formulaire me permettant d'ajouter un produit avec 
- un prix
- une description
etc.

### Structure du code du projet
 Pour la structure du code du projet, vous pouvez vous baser sur ce que vous avez déjà fait sur le projet Bonnets, voir même sur la correction du projet, pour ceux qui aiment/veulent le MVC : 
https://github.com/Dreeckan/beanies/tree/main/src

### Configurer InnoDB par défaut
Dans Wamp, vous allez avoir besoin de InnoDB pour vos tables par défaut. Pour ça, vous pouvez ouvrir le fichier my.ini et modifier la ligne default_storage_engine. Il faut décommenter la ligne InnoDB et commenter la ligne MyISAM

## MCD 
![ schéma du MCD](/assets/img/mcd.png "MCD")