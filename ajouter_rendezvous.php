<?php
include 'db.php';

// Récupérer la liste des patients
$stmt = $pdo->query("SELECT * FROM Patients");
$patients = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_POST['patient_id'];
    $date_rendezvous = $_POST['date_rendezvous'];
    $heure = $_POST['heure'];
    $commentaire = $_POST['commentaire'];

    $stmt = $pdo->prepare("INSERT INTO Rendezvous (patient_id, date_rendezvous, heure, commentaire) VALUES (?, ?, ?, ?)");
    $stmt->execute([$patient_id, $date_rendezvous, $heure, $commentaire]);

    echo "<div class='alert alert-success' role='alert'>Rendez-vous ajouté avec succès!</div>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Ajouter un Rendez-vous</h2>
        <form method="post">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><label for="patient_id">Patient</label></td>
                        <td>
                            <select name="patient_id" id="patient_id" class="form-control" required>
                                <?php foreach ($patients as $patient): ?>
                                    <option value="<?php echo $patient['id']; ?>">
                                        <?php echo htmlspecialchars($patient['nom'] . ' ' . $patient['prenom']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date_rendezvous">Date du Rendez-vous</label></td>
                        <td><input type="date" name="date_rendezvous" id="date_rendezvous" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="heure">Heure</label></td>
                        <td><input type="time" name="heure" id="heure" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="commentaire">Commentaire</label></td>
                        <td><textarea name="commentaire" id="commentaire" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter Rendez-vous</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>