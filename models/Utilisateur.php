<?php

class Utilisateur
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getUtilisateurById($utilisateurId)
    {
        $query = "SELECT id, nom_utilisateur, email FROM utilisateurs WHERE id = :utilisateurId";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':utilisateurId', $utilisateurId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function getUtilisateurByEmail($email)
    {
        $query = "SELECT id, mot_de_passe FROM utilisateurs WHERE email = :email";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
    public function ajouterUtilisateur($nom_utilisateur, $email, $mot_de_passe) {

        $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (:nom_utilisateur, :email, :mot_de_passe)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nom_utilisateur', $nom_utilisateur);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':mot_de_passe', $mot_de_passe);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>
