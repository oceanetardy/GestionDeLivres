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

    public function handleAjouterLivre($titre, $auteurId, $nomAuteur, $prenomAuteur, $annee_publication, $description, $utilisateurId) {
        // Vérifier si l'auteur existe déjà
        $auteurExiste = $this->auteur->getAuteurById($auteurId);

        if (!$auteurExiste) {
            // Vérifier si le nom de l'auteur n'est pas vide
            if (!empty($nomAuteur)) {
                // L'auteur n'existe pas, on l'ajoute à la table des auteurs
                $this->auteur->ajouterAuteur($nomAuteur, $prenomAuteur);
            }
        }

        // Insertion du livre dans la base de données
        $ajoutLivre = $this->livre->ajouterLivre($titre, $auteurId, $annee_publication, $description, $utilisateurId);

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

