<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Détails du Livre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Détails du Livre</h1>
<h2><?php echo $livre['titre']; ?></h2>
<p><strong>Auteur:</strong> <?php echo $livre['auteur']; ?></p>
<p><strong>Année de publication:</strong> <?php echo $livre['annee_publication']; ?></p>
<a href="liste_livres.php" class="button">Retour à la liste des livres</a>
</body>
</html>
