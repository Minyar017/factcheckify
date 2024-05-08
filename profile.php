<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Profil de l'utilisateur</title>
    <link rel="stylesheet" href="profile.css" />
    <!-- Inclure un fichier CSS pour le style -->
</head>
<body>
<header>
    <div class="logo-and-title">
        <img src="logo.png" height="68" width="68" alt="FactChekiFy Logo" />
        <h1 class="titre-expert">FactChekiFy</h1>
    </div>
</header>

<center>
    <div class="card" >
        <div class="card__img" ></div>
        <div class="card__avatar">
            <img src="profile (2).png">
            <circle cx="89" cy="65" fill="#fbc0aa" r="7"></circle>
        </div>
        <div class="card__title" id="first-name"></div>
        <div class="card__subtitle"></div>

        <?php
// Connexion
$conx = mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("projetfedere") or die(mysql_error());

$email = isset($_POST['email']) ? $_POST['email'] : ' ';
// Vérifie si un email a été passé en paramètre GET
if (isset($_POST["email"])) {
  $email = $_POST['email'];
}
    // Requête SQL
    $req = "SELECT first_name, last_name, gender, age, email, bio, category FROM users where email='$email'";

    // Exécution de la requête
    $res = mysql_query($req);

    // Vérifier s'il y a des résultats
    if (mysql_num_rows($res) > 0) {
        // Tracer le conteneur principal
        echo '<div style="border: 1px solid black; padding: 10px; margin-bottom: 10px;">';
    }
        // Boucle pour afficher les résultats
        while ($tab = mysql_fetch_array($res)) {
    // Tracer chaque élément avec des div
    echo '<div style="margin-bottom: 5px;">';
    echo '<b>Nom:</b> ' . $tab[0] . '<br>';
    echo '<b>Prenom:</b> ' . $tab[1] . '<br>';
    echo '<b>Gender:</b> ' . $tab[2] . '<br>';
    echo '<b>Age:</b> ' . $tab[3] . '<br>';
    echo '<b>Email:</b> ' . $tab[4] . '<br>';
    echo '<b>Bio:</b> ' . $tab[5] . '<br>';
    echo '<b>Category:</b> ' . $tab[6] . '<br>';
    echo '</div>';
}

// Fermer le conteneur principal
echo '</div>';

// Fermer la connexion
mysql_close($conx);
?>
<div class="card__wrapper">
            <button class="card__btn"><a href="expert.html">Accueil</a></button>
            <button class="card__btn"><a href="donnees.html">Modifier</a></button>
            <button class="card__btn card__btn-solid"><a href="connection.html">Déconnexion</a></button>
        </div>
    </div>
</center>

<footer>
    <p>&copy; 2024 Votre Site. Tous droits réservés.</p>
</footer>
<script src="javaScript.js"></script>
</body>
</html>
