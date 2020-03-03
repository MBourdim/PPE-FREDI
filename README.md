# FREDI

FREDI est une application web afin de gérer les adhérents de la Maison des Ligues de Lorraine.
On y retrouve des CRUD (Create Read Update Delete) pour les périodes et les notes de frais.

## Installation

Afin d'installer le projet sur votre Xampp, veuillez en premier récupérer le fichier SQL dans ```Documentation/SQL```. Importer le fichier dans votre base de données.
Récupérer ensuite, les fichiers de l'application et les placer dans un répertoire dans votre ```htdocs```

## Droit d'utilisateur

 - Administrateur -> compte@administrateur.fr / administrateur
 - Controleur -> compte@controlleur.fr / controlleur
 - Adherent -> compte@adherent.fr / adherent

### Cas d'utilisation de FREDI

| Droit | Libelle |
| ------ | ------ | 
| ADMINISTRATEUR | Importer les données des users ADHERENT |
| ADMINISTRATEUR | Importer les données des CLUBS |
| ADMINISTRATEUR | Importer les données des LIGUES |
| ADMINISTRATEUR | Importer les données MOTIF DE FRAIS |
| ADMINISTRATEUR | Créer une PERIODE |
| ADMINISTRATEUR | Modifier une PERIODE |
| ADMINISTRATEUR | Désactiver une PERIODE |
| ADMINISTRATEUR | Consulter une PERIODE |
| ADMINISTRATEUR | Se connecter à l'application |
| ADMINISTRATEUR | Se déconnecter à l'application |
| ADMINISTRATEUR | Demander le renvoi du mot de passe |
| CONTROLEUR | Changer le statut d'une LIGNE DE FRAIS |
| CONTROLEUR | Consulter de la LISTE DE FRAIS sur l'application WEB |
| CONTROLEUR | Consulter de la LISTE DE FRAIS sur l'application MOBILE |
| CONTROLEUR | Générer le CERFA 11580-02 |
| CONTROLEUR | Se connecter à l'application |
| CONTROLEUR | Se déconnecter à l'application |
| ADHERENT | Créer une LIGNE DE FRAIS |
| ADHERENT | Modifier une LIGNE DE FRAIS |
| ADHERENT | Supprimer une LIGNE DE FRAIS |
| ADHERENT | Changer le statut d'une LIGNE DE FRAIS |
| ADHERENT | Consulter les LIGNES DE FRAIS sur une application WEB|
| ADHERENT | Consulter les LIGNES DE FRAIS sur une application MOBILE |
| ADHERENT | Générer le bordereau d'un adhérent majeur avec responsable légal |
| ADHERENT | Demander le renvoi du mot de passe |
| ADHERENT | Se connecter à l'application |
| ADHERENT | Se déconnecter à l'application |


### Tech

Le front-end de FREDI est developpé avec Bootstrap, HTML/CSS. Pour le back-end, il est developpé en PHP avec des classes.
