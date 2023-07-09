<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Accueil</h1>
<?php if (isset($viewData['utilisateur'])) : ?>
    <p>Bienvenue, <?php echo $viewData['utilisateur']['nom_utilisateur']; ?>!</p>
    <a href="logout.php" class="button">Déconnexion</a>
<?php else: ?>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" name="mot_de_passe" required>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore inscrit? <a href="inscription.php">S'inscrire</a></p>
<?php endif; ?>
</body>
</html>
