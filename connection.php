<?php
// Connexion à la base de données
$conn = mysql_connect("localhost", "root", "");
if (!$conn) {
    die("Connexion échouée : " . mysql_error());
}

// Sélectionner la base de données
$db_selected = mysql_select_db("projetfedere", $conn);
if (!$db_selected) {
    die("Sélection de la base de données échouée : " . mysql_error());
}

// Récupération des données envoyées par POST
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['new-password']) ? $_POST['new-password'] : '';

// Vérifier que les champs requis ne sont pas vides
if (empty($email)) {
    die("L'email ne peut pas être vide.");
}
if (empty($password)) {
    die("Le mot de passe ne peut pas être vide.");
}

// Échapper les valeurs pour éviter les attaques par injection SQL (pas sécurisé, mais juste pour l'exemple)
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);

// Préparer la requête SQL pour la connexion
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysql_query($sql, $conn);

// Vérifier si l'utilisateur existe
if (mysql_num_rows($result) > 0) {
    // Rediriger vers la page de profil
    header("Location: profile.php");
    exit; // Toujours ajouter "exit" après une redirection
} else {
    echo "Erreur de connexion : vérifiez votre email ou mot de passe.";
}

// Fermer la connexion
mysql_close($conn);
?>
