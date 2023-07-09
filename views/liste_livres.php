<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Livres</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Liste des Livres</h1>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année de publication</th>
    </tr>
    <?php foreach ($livres as $livre) : ?>
        <tr>
            <td><?php echo $livre['titre']; ?></td>
            <td><?php echo $livre['auteur']; ?></td>
            <td><?php echo $livre['annee_publication']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="index.php" class="button">Retour</a>
</body>
</html>
