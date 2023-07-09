<?php
class Livre
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getListeLivresUtilisateur($utilisateurId)
    {
        $query = "SELECT id, titre, auteur, annee_publication FROM livres WHERE utilisateur_id = :utilisateurId";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':utilisateurId', $utilisateurId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function ajouterLivreUtilisateur($titre, $auteur, $annee_publication, $description, $utilisateurId)
    {
        $query = "INSERT INTO livres (titre, auteur, annee_publication, description, utilisateur_id) VALUES (:titre, :auteur, :annee_publication, :description, :utilisateurId)";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':titre', $titre, PDO::PARAM_STR);
        $statement->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $statement->bindParam(':annee_publication', $annee_publication, PDO::PARAM_INT);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':utilisateurId', $utilisateurId, PDO::PARAM_INT);
        $statement->execute();
    }
}
