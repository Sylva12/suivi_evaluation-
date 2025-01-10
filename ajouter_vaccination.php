<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM Patients");
$patients = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_POST['patient_id'];
    $vaccin = $_POST['vaccin'];
    $date_vaccination = $_POST['date_vaccination'];
    $prochaine_dose = $_POST['prochaine_dose'];

    $stmt = $pdo->prepare("INSERT INTO Vaccinations (patient_id, vaccin, date_vaccination, prochaine_dose) VALUES (?, ?, ?, ?)");
    $stmt->execute([$patient_id, $vaccin, $date_vaccination, $prochaine_dose]);

    echo "<div class='alert alert-success' role='alert'>Vaccination ajoutée avec succès!</div>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Vaccination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Ajouter une Vaccination</h2>
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
                        <td><label for="vaccin">Vaccin</label></td>
                        <td><input type="text" name="vaccin" id="vaccin" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="date_vaccination">Date de Vaccination</label></td>
                        <td><input type="date" name="date_vaccination" id="date_vaccination" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="prochaine_dose">Prochaine Dose</label></td>
                        <td><input type="date" name="prochaine_dose" id="prochaine_dose" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter Vaccination</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
