<?php
require 'variable_connexion.php';

$token = $_GET['token'] ?? "";

$stmt = mysqli_prepare($link, "UPDATE utilisateur SET valide = 1, token = NULL WHERE token = ? AND valide = 0");
mysqli_stmt_bind_param($stmt, 's', $token);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) === 1) {
    echo "Compte validé ! Vous pouvez maintenant vous connecter.";
} else {
    echo "Lien invalide ou compte déjà validé.";
}
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
