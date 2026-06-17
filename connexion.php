<?php
session_start();

require('variable_connexion.php');

if (!$link) { die("Erreur:" . mysqli_connect_error()); }

$login    = $_POST['login']    ?? "";
$password = $_POST['password'] ?? "";

$stmt = mysqli_prepare($link,
    "SELECT id_utilisateur, password, valide FROM utilisateur WHERE login = ?");
mysqli_stmt_bind_param($stmt, 's', $login);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if ($user && password_verify($password, $user['password'])) {
    if ($user['valide'] == 0) {
        echo "Votre compte n'est pas encore validé.";
    } else {
        $_SESSION['id_utilisateur'] = $user['id_utilisateur'];  // on ouvre la session
        $_SESSION['login'] = $login;
        header('Location: acceuil.php');
        exit();
    }
} else {
    echo "Login ou mot de passe incorrect.";
}
?>
