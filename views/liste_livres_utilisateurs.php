<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Livres de l'Utilisateur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Liste des Livres de l'Utilisateur</h1>
<?php if (isset($viewData['utilisateur'])) : ?>
    <p>Bienvenue, <?php echo $viewData['utilisateur']['nom_utilisateur']; ?>!</p>
<?php endif; ?>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année de publication</th>
    </tr>
    <?php foreach ($viewData['livres'] as $livre) : ?>
        <tr>
            <td><?php echo $livre['titre']; ?></td>
            <td><?php echo $livre['auteur']; ?></td>
            <td><?php echo $livre['annee_publication']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Ajouter un Livre</h2>
<form method="POST" action="liste_livres_utilisateur.php">
    <label for="titre">Titre:</label>
    <input type="text" name="titre" required>
    <label for="auteur">Auteur:</label>
    <input type="text" name="auteur" required>
    <label for="annee_publication">Année de publication:</label>
    <input type="number" name="annee_publication" required>
    <button type="submit">Ajouter</button>
</form>

<a href="index.php" class="button">Retour</a>
</body>
</html>
