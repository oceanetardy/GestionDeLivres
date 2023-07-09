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
}

?>
