<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Ceci est votre page d'accueil.</p>
        <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Vaccinations et Rendez-vous Médicaux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body><body>
    <header class="bg-dark text-white text-center py-4">
        <h1>Suivi des Vaccinations et Rendez-vous Médicaux</h1>
    </header>
    <div class="container mt-4">
        <div class="list-group">
            <a href="ajouter_patient.php" class="list-group-item list-group-item-action">Ajouter un Patient</a>
            <a href="ajouter_vaccination.php" class="list-group-item list-group-item-action">Ajouter une Vaccination</a>
            <a href="ajouter_rendezvous.php" class="list-group-item list-group-item-action">Ajouter un Rendez-vous</a>
            <a href="lister_patients.php" class="list-group-item list-group-item-action">Lister les Patients</a>
        </div>
    </div>
</body></body>