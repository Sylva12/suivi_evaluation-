<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO Patients (nom, prenom, date_naissance, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $date_naissance, $email]);

    echo '<div class="alert alert-success" role="alert">Patient ajouté avec succès!</div>';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Ajouter un Patient</h2>
        <table class="table table-bordered">
            <form method="post">
                <tbody>
                    <tr>
                        <td><label for="nom">Nom</label></td>
                        <td><input type="text" class="form-control" id="nom" name="nom" required></td>
                    </tr>
                    <tr>
                        <td><label for="prenom">Prénom</label></td>
                        <td><input type="text" class="form-control" id="prenom" name="prenom" required></td>
                    </tr>
                    <tr>
                        <td><label for="date_naissance">Date de Naissance</label></td>
                        <td><input type="date" class="form-control" id="date_naissance" name="date_naissance" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" class="form-control" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter Patient</button>
                        </td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
</body>
</html>