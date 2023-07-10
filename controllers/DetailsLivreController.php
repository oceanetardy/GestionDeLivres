<?php
require_once 'models/Livre.php';
require_once 'models/Commentaire.php';

class DetailsLivreController {
    private $connection;
    private $livre;
    private $commentaire;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->livre = new Livre($connection);
        $this->commentaire = new Commentaire($connection);
    }

    public function afficherDetailsLivre($livreId) {
        // Récupération des détails du livre
        $livre = $this->livre->getDetailsLivre($livreId);

        if ($livre) {
            // Récupération des commentaires du livre
            $commentaires = $this->livre->getCommentairesLivre($livreId);

            // Affichage de la vue des détails du livre avec les données
            include 'views/details_livre.php';
        } else {
            // Livre non trouvé
            echo 'Livre non trouvé.';
        }
    }


    public function handleAjouterCommentaire($livreId, $contenu) {
        // Ajout du commentaire dans la base de données
        $ajoutCommentaire = $this->commentaire->ajouterCommentaire($livreId, $contenu);

        if ($ajoutCommentaire) {
            // Redirection vers la page des détails du livre
            header('Location: details_livre.php?livreId=' . $livreId);
            exit();
        } else {
            echo 'Erreur lors de l\'ajout du commentaire.';
        }
    }
}
