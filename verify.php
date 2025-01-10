<?php
include 'db.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Vérifiez le code de vérification
    $stmt = $pdo->prepare("SELECT * FROM users WHERE verification_code = ?");
    $stmt->execute([$code]);
    $user = $stmt->fetch();

    if ($user) {
        // Mettez à jour le statut de vérification
        $stmt = $pdo->prepare("UPDATE users SET email_verified = 1, verification_code = NULL WHERE id = ?");
        $stmt->execute([$user['id']]);
        echo "Votre email a été vérifié avec succès!";
    } else {
        echo "Code de vérification invalide.";
    }
} else {
    echo "Aucun code de vérification fourni.";
}
?>