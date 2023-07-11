<?php
require_once 'models/Livre.php';
require_once 'models/Auteur.php';

class AjouterLivreController {
    private $connection;
    private $livre;
    private $auteur;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->livre = new Livre($connection);
        $this->auteur = new Auteur($connection);
    }

    public function handleAjouterLivre($titre, $auteurId, $annee_publication, $description, $utilisateurId) {
        // Vérifier si l'auteur existe déjà
        $auteurExiste = $this->auteur->getAuteurById($auteurId);

        if (!$auteurExiste) {
            // L'auteur n'existe pas, on l'ajoute à la table des auteurs
            $auteurId = $this->auteur->ajouterAuteur($auteurId);
        }

        // Insertion du livre dans la base de données
        $ajoutLivre = $this->livre->ajouterLivreUtilisateur($titre, $auteurId, $annee_publication, $description, $utilisateurId);

        if ($ajoutLivre) {
            // Redirection vers la liste des livres après l'ajout réussi
            header('Location: index.php');
            exit();
        } else {
            $viewData['message_erreur'] = 'Erreur lors de l\'ajout du livre.';
        }
    }

    public function getViewData() {
        return [];
    }
}

