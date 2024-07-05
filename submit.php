<?php
include('config.php'); // Inclure le fichier de configuration de la base de données

// Récupérer les données du formulaire
$name = $_POST['name'];

// Vérifier que le nom n'est pas vide
if (empty($name)) {
    die("Le nom ne peut pas être vide");
}

// Préparer et exécuter la requête d'insertion
$sql = "INSERT INTO appointment (name) int (?)";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Erreur de préparation de la requête : " . $conn->error);
}
$stmt->bind_param("s", $name);

if ($stmt->execute()) {
    echo "Nouvelle entrée créée avec succès.";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
