<?php
session_start();

if (isset($_SESSION['utilisateur_id'])) {
    // L'utilisateur est connecté
    require_once 'config.php';
    require_once 'models/Utilisateur.php';

    $utilisateur = new Utilisateur($connection);
    $utilisateurConnecte = $utilisateur->getUtilisateurById($_SESSION['utilisateur_id']);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Accueil</h1>
<?php if (isset($utilisateurConnecte)) : ?>
    <div>
        <p>Bienvenue, <?php echo $utilisateurConnecte['nom_utilisateur']; ?>!</p>
        <p>Email: <?php echo $utilisateurConnecte['email']; ?></p>
        <a href="logout.php" class="button">Déconnexion</a>
        <a href="views/liste_livres_utilisateurs.php" class="button">Mes Livres</a>
        <a href="views/liste_livres.php" class="button">Tous les livres</a>

    </div>
<?php else : ?>
    <a href="login.php" class="button">Se connecter</a>
    <a href="inscription.php" class="button">S'inscrire</a>
<?php endif; ?>
</body>
</html>
