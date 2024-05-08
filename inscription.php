<?php
// Connexion à la base de données avec l'ancienne extension MySQL
$conn = mysql_connect("localhost", "root", "");
if (!$conn) {
    die("Connexion échouée : " . mysql_error());
}

// Sélectionner la base de données
$db_selected = mysql_select_db("projetfedere", $conn);
if (!$db_selected) {
    die ("Sélection de la base de données échouée : " . mysql_error());
}

// Récupération des données envoyées par POST
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$gender = $_POST['account-type'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['new-password'];

// Vérifier si le fichier 'diploma' est téléchargé
if (!isset($_FILES['file']) || $_FILES['file']['error'] != UPLOAD_ERR_OK) {
    die("Le champ 'diploma' est obligatoire et ne peut pas être vide.");
}

// Si tout est en ordre, obtenir les données du fichier
$diploma = $_FILES['file']['name'];  // Récupération du nom du fichier du diplôme

// Si le champ est obligatoire, vérifiez qu'il a une valeur
if (empty($diploma)) {
    die("Le champ 'diploma' est obligatoire et ne peut pas être vide.");
}

// Autres données
$profile_picture = isset($_FILES['file']) ? $_FILES['file']['name'] : null;
$category = $_POST['referrer'];
$bio = $_POST['bio'];
$terms_and_conditions = isset($_POST['terms-and-conditions']) ? 1 : 0;

// Préparer la requête SQL
$sql = "INSERT INTO users (first_name, last_name, gender, age, email, password, profile_picture, diploma, category, bio, terms_and_conditions)
        VALUES ('$first_name', '$last_name', '$gender', $age, '$email', '$password', '$profile_picture', '$diploma', '$category', '$bio', $terms_and_conditions)";

/// Exécution de la requête
if (mysql_query($sql, $conn)) {
    header("Location: profile.php");
    exit;
} else {
    die("inscription échouée : " . mysql_error());
}
// Fermer la connexion
mysql_close($conn);
?>
