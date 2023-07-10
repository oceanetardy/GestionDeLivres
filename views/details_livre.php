<?php
session_start();
require_once '../config.php';
require_once '../models/Livre.php';

if (isset($_GET['id'])) {
    $livreId = $_GET['id'];

    // Créez une instance du modèle Livre
    $livre = new Livre($connection);

    // Obtenez les détails du livre par son ID
    $detailsLivre = $livre->getDetailsLivre($livreId);

    // Affichez les détails du livre
    if ($detailsLivre) {
        // Affichez les détails du livre, par exemple :
        echo '<h1>Détails du livre</h1>';
        echo '<p>Titre : ' . $detailsLivre['titre'] . '</p>';
        echo '<p>Auteur : ' . $detailsLivre['auteur'] . '</p>';
        echo '<p>Description : ' . $detailsLivre['description'] . '</p>';
        // Autres informations à afficher
    } else {
        echo 'Livre introuvable.';
    }
} else {
    echo 'ID du livre manquant.';
}
?>
<a href="/gestionlivre" class="button">Retour</a>
