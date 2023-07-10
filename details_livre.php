<?php
session_start();

require_once 'config.php';
require_once 'controllers/DetailsLivreController.php';

// Création de l'instance du contrôleur
$controller = new DetailsLivreController($connection);

// Vérification de l'ID du livre dans la requête
if (!isset($_GET['livreId'])) {
    // Redirection en cas d'ID de livre manquant
    header('Location: index.php');
    exit();
}

$livreId = $_GET['livreId'];

// Récupération des détails du livre
$livre = $controller->afficherDetailsLivre($livreId);

// Gestion de l'ajout de commentaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $livreId = $_POST['livreId'];
    $utilisateurId = $_SESSION['utilisateur_id'];
    $contenu = $_POST['contenu'];

    $controller->handleAjouterCommentaire($livreId, $utilisateurId, $contenu);
}

// Récupération des commentaires du livre
$commentaires = $controller->getCommentairesLivre($livreId);

// Affichage de la vue
include 'views/details_livre.php';
?>
