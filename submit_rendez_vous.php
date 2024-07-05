<?php
// Vérifier si les données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = isset($_POST['nom_patient']) ? htmlspecialchars($_POST['nom_patient'], ENT_QUOTES, 'UTF-8') : '';
    $prenom = isset($_POST['prenom_patient']) ? htmlspecialchars($_POST['prenom_patient'], ENT_QUOTES, 'UTF-8') : '';
    $email = isset($_POST['email_patient']) ? htmlspecialchars($_POST['email_patient'], ENT_QUOTES, 'UTF-8') : '';
    $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone'], ENT_QUOTES, 'UTF-8') : '';
    $date_demande = isset($_POST['date_rendez_vous']) ? $_POST['date_rendez_vous'] : '';
    $commentaire = isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : '';

    // Connexion à la base de données
    $mysqli = new mysqli('localhost', 'root', '', 'clinique');

    // Vérifier la connexion
    if ($mysqli->connect_error) {
        die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
    }

    // Préparer la requête d'insertion
    $stmt = $mysqli->prepare("INSERT INTO rendez_vous (nom, prenom, email, telephone, date_demande, commentaire) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die('Erreur lors de la préparation de la requête : ' . $mysqli->error);
    }

    $stmt->bind_param("ssssss", $nom, $prenom, $email, $telephone, $date_demande, $commentaire);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Rendez-vous soumis avec succès.";
    } else {
        echo "Erreur lors de la soumission du rendez-vous : " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $mysqli->close();
} else {
    echo "Le formulaire n'a pas été soumis correctement.";
}
?>
