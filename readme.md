_Je suis une méthode magique appelé implicitement à la fin d’un script PHP. Qui suis-je ?_

je pense a la methode __destruct car si il n'y a p^lus d'appels a une instance de classe cette classe est detruite.

_Donnez 3 types de visibilité sur un attribut expliquez la différence._

private: seule la classe a accès a ces attributs.
protected: seule la classe et ses enfants ont accès.
public: c'est la fête tout le monde peut se servir ^^.

_Expliquez les avantages de l’utilisation d’un pattern MVC_

Le code est plus facilement maintenable
Des fichiers distincts permettent de mieux reperer d'ou viens un bug
La conception est plus claire et plus lisible pour d'autres devs

_Détaillez les éléments qui composent un pattern MVC_

Le Modele gere l'acces a la base de données

Le controlleur la vue appelle le controlleur qui interroge le modele et recupere les données pour les transmettre a la vue

La Vue se charge d'afficher le contenu a l'ecran

