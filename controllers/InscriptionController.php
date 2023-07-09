<?php

class InscriptionController {
    private $connection;
    private $utilisateur;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->utilisateur = new Utilisateur($connection);
    }

    public function handleInscription($nom_utilisateur, $email, $mot_de_passe) {
        $utilisateurExist = $this->utilisateur->getUtilisateurByEmail($email);

        if ($utilisateurExist) {
            $viewData['message_erreur'] = 'Cet email est déjà utilisé.';
        } else {
            $this->utilisateur->ajouterUtilisateur($nom_utilisateur, $email, $mot_de_passe);
            $_SESSION['utilisateur_id'] = $this->connection->lastInsertId();
            header('Location: index.php');
            exit();
        }
    }

    public function getViewData() {
        return [];
    }
}
