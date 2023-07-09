<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: login.php');
    exit();
}

require_once '../config.php';
require_once '../models/Livre.php';

$livre = new Livre($connection);
$listeLivres = $livre->getAllLivres();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tous les Livres</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Tous les liivres Livres</h1>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Description</th>
    </tr>
    <?php foreach ($listeLivres as $livre) : ?>
        <tr>
            <td><?php echo $livre['titre']; ?></td>
            <td><?php echo $livre['auteur']; ?></td>
            <td><?php echo $livre['description']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
