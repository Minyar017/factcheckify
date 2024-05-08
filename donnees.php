<?php
// Connexion à la base de données
$conn = mysql_connect("localhost", "root", "");

// Vérifier la connexion
if (!$conn) {
    die("Connexion échouée : " . mysql_error());
}

// Sélectionner la base de données
$db_selected = mysql_select_db("projetfedere", $conn);

if (!$db_selected) {
    die ("Sélection de la base de données échouée : " . mysql_error());
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $new_first_name = isset($_POST['new_first_name']) ? $_POST['new_first_name'] : '';
    $new_last_name = isset($_POST['new_last_name']) ? $_POST['new_last_name'] : '';
    $nage = isset($_POST['nage']) ? $_POST['nage'] : '';
    $nreferrer = isset($_POST['nreferrer']) ? $_POST['nreferrer'] : '';
    $nage = isset($_POST['nage']) ? $_POST['nage'] : '';
    // Construction de la requête SQL
    $update_query = "UPDATE users SET first_name = '$new_first_name', last_name = '$new_last_name' ,age='$nage', referrer='$nreferrer',bio='$nbio'  WHERE email = '$email'";

    // Exécution de la requête
    $result = mysql_query($update_query, $conn);

    if ($result) {
        header("Location: profile.php");
    exit;
    } else {
        die("Mise à jour échouée : " . mysql_error());
    }
}

// Fermeture de la connexion
mysql_close($conn);
?>
