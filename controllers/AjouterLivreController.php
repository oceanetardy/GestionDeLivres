<?php
require_once 'models/Livre.php';

class AjouterLivreController {
    private $connection;
    private $livre;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->livre = new Livre($connection);
    }

    public function handleAjouterLivre($titre, $auteur, $annee_publication, $description, $utilisateurId) {
        // Insertion du livre dans la base de données
        $ajoutLivre = $this->livre->ajouterLivreUtilisateur($titre, $auteur, $annee_publication, $description, $utilisateurId);

        if ($ajoutLivre) {
            // Redirection vers la liste des livres après l'ajout réussi
            header('Location: liste_livres_utilisateur.php');
            exit();
        } else {
            $viewData['message_erreur'] = 'Erreur lors de l\'ajout du livre.';
        }
    }
    public function getViewData() {
        return [];
    }
}
