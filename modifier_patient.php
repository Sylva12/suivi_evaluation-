<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations du patient
    $stmt = $pdo->prepare("SELECT * FROM Patients WHERE id = ?");
    $stmt->execute([$id]);
    $patient = $stmt->fetch();

    // Si le patient n'existe pas, rediriger ou afficher un message d'erreur
    if (!$patient) {
        echo "Patient non trouvé.";
        exit;
    }
}

// Traiter le formulaire de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE Patients SET nom = ?, prenom = ?, date_naissance = ?, email = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $date_naissance, $email, $id]);

    echo "Patient modifié avec succès!";
    header("Location: lister_patients.php"); // Redirection après modification
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier Patient</h2>
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $patient['nom']; ?>" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $patient['prenom']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $patient['date_naissance']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $patient['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier Patient</button>
        </form>
    </div>
</body>
</html>