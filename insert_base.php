<?php
$link = mysqli_connect('localhost', 'admin', 'qwerty', 'sae');
if (!$link) { die("Erreur:" . mysqli_connect_error()); }

$login    = $_POST['login']    ?? "";
$email    = $_POST['email']    ?? "";
$nom      = $_POST['nom']      ?? "";
$prenom   = $_POST['prenom']   ?? "";
$password = $_POST['password'] ?? "";

if ($login === "" || $email === "" || $password === "") {
    die("Veuillez remplir tous les champs.");
}

$hash  = password_hash($password, PASSWORD_DEFAULT);  // comme ca le mdp est caché 
$token = bin2hex(random_bytes(32));                   // ici ca fait le token

$stmt = mysqli_prepare($link,
    "INSERT INTO utilisateur (login, email, nom, prenom, password, valide, token)
     VALUES (?, ?, ?, ?, ?, 0, ?)");
mysqli_stmt_bind_param($stmt, 'ssssss', $login, $email, $nom, $prenom, $hash, $token);

if (mysqli_stmt_execute($stmt)) {
    $lien = "http://" . $_SERVER['HTTP_HOST'] . "/valider.php?token=" . $token;
    echo "Compte créé. Cliquez sur ce lien pour valider votre compte :<br>
          <a href=\"$lien\">$lien</a>";
} elseif (mysqli_errno($link) === 1062) {
    echo "Erreur : ce login ou cet email existe déjà.";
} else {
    echo "Erreur : " . mysqli_stmt_error($stmt);
}
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
