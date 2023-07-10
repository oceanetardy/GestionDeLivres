<?php
class Livre
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
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

    public function ajouterLivreUtilisateur($titre, $auteur, $annee_publication, $description, $utilisateurId) {
        $query = "INSERT INTO livres (titre, auteur, annee_publication,description, utilisateur_id) VALUES (:titre, :auteur ,:annee_publication, :description, :utilisateurId)";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':titre', $titre, PDO::PARAM_STR);
        $statement->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $statement->bindParam(':annee_publication', $annee_publication, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':utilisateurId', $utilisateurId, PDO::PARAM_INT);
        $statement->execute();

        return $this->connection->lastInsertId();
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
