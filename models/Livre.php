<?php
class Livre
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getDetailsLivre($livreId)
    {
        $query = "SELECT * FROM livres WHERE id = :livreId";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':livreId', $livreId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function ajouterCommentaire($livreId, $utilisateurId, $contenu)
    {
        $query = "INSERT INTO commentaires (livre_id, utilisateur_id, contenu) VALUES (:livreId, :utilisateurId, :contenu)";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':livreId', $livreId, PDO::PARAM_INT);
        $statement->bindParam(':utilisateurId', $utilisateurId, PDO::PARAM_INT);
        $statement->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $statement->execute();
    }

    public function getCommentairesLivre($livreId)
    {
        $query = "SELECT * FROM commentaires WHERE livre_id = :livreId";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':livreId', $livreId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
