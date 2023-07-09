<?php
session_start();
require_once 'config.php';
require_once 'controllers/LoginController.php';

// Création de l'instance du contrôleur
$controller = new LoginController($connection);

// Gestion de la requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleLogin($_POST['email'], $_POST['mot_de_passe']);
}

// Affichage de la vue
$viewData = $controller->getViewData();
include 'views/index.php';
?>
