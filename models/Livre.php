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

    public function rechercherLivres($recherche) {
        $query = "SELECT * FROM livres WHERE titre LIKE :recherche OR auteur LIKE :recherche";
        $statement = $this->connection->prepare($query);
        $recherche = '%' . $recherche . '%';
        $statement->bindParam(':recherche', $recherche, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
    public function getLivresUtilisateur($utilisateurId)
    {
        $query = "SELECT * FROM livres WHERE utilisateur_id = :utilisateurId";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':utilisateurId', $utilisateurId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getAllLivres()
    {
        $query = "SELECT * FROM livres";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }


}
