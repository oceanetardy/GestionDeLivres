<?php
session_start();
require_once 'config.php';
require_once 'controllers/AjouterLivreController.php';

// Création de l'instance du contrôleur
$controller = new AjouterLivreController($connection);

// Gestion de la requête d'ajout de livre
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $description = $_POST['description'];
    $annee_publication = $_POST['annee_publication'];
    $utilisateurId = $_SESSION['utilisateur_id'];

    $controller->handleAjouterLivre($titre, $auteur, $description, $annee_publication, $utilisateurId);
}

// Affichage de la vue
$viewData = $controller->getViewData();
include 'views/ajouter_livre.php';
?>
