<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Ajouter un livre</h1>
<form method="POST" action="ajouter_livre.php">
    <label for="titre">Titre:</label>
    <input type="text" name="titre" required><br>

    <label for="auteurNom">Nom de l'auteur:</label>
    <input type="text" name="auteurNom" required><br>

    <label for="auteurPrenom">Prénom de l'auteur:</label>
    <input type="text" name="auteurPrenom" required><br>

    <label for="anneePublication">Année de publication:</label>
    <input type="text" name="anneePublication" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <button type="submit">Ajouter</button>
</form>
</body>
</html>


<a href="/gestionlivre" class="button">Retour</a>
</body>
</html>
