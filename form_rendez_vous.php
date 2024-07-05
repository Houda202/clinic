<!DOCTYPE html>
<html>
<head>
    <title>Prendre un Rendez-vous</title>
</head>
<body>
    <h1>Prendre un Rendez-vous</h1>
    <form action="submit_rendez_vous.php" method="post">
        Nom: <input type="text" name="nom_patient" required><br>
        Email: <input type="email" name="email_patient" required><br>
        telephone: <input type="telephone" name="telephone_patient" required><br>
        Date: <input type="date" name="date_demande" required><br>
      
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
