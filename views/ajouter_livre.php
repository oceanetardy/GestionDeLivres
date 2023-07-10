<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Livre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Ajouter un Livre</h1>
<form method="POST" action="../ajouter_livre.php">
    <label for="titre">Titre:</label>
    <input type="text" name="titre" required>
    <label for="auteur">Auteur:</label>
    <input type="text" name="auteur" required>
    <label for="annee_publication">Année de publication:</label>
    <input type="text" name="annee_publication" required>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <button type="submit">Ajouter</button>
</form>

<a href="/gestionlivre" class="button">Retour</a>
</body>
</html>
