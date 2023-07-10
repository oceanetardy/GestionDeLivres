<?php
require_once 'models/Utilisateur.php';
require_once 'models/Livre.php';

class ListeLivresUtilisateurController {
    private $connection;
    private $utilisateur;
    private $livre;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->utilisateur = new Utilisateur($connection);
        $this->livre = new Livre($connection);
    }

    public function getListeLivresUtilisateur($utilisateurId) {
        return $this->livre->getListeLivresUtilisateur($utilisateurId);
    }

    public function getViewData() {
        $utilisateurId = $_SESSION['utilisateur_id'];
        $utilisateur = $this->utilisateur->getUtilisateurById($utilisateurId);
        $livres = $this->getListeLivresUtilisateur($utilisateurId);

        return [
            'utilisateur' => $utilisateur,
            'livres' => $livres
        ];
    }
}
