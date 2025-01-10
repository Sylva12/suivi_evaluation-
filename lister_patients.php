
<?php
include 'db.php';

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM Patients WHERE id = ?");
    $stmt->execute([$delete_id]);
    echo "Patient supprimé avec succès!";
    header("Location: lister_patients.php"); // Redirection après suppression
    exit;
}

$stmt = $pdo->query("SELECT * FROM Patients");
$patients = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Patients</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Liste des Patients</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td><?php echo $patient['id']; ?></td>
                        <td><?php echo $patient['nom']; ?></td>
                        <td><?php echo $patient['prenom']; ?></td>
                        <td><?php echo $patient['date_naissance']; ?></td>
                        <td><?php echo $patient['email']; ?></td>
                        <td>
                            <a href="modifier_patient.php?id=<?php echo $patient['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="?delete_id=<?php echo $patient['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce patient ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>