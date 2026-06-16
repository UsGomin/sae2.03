<?php
session_start();
if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: index.html');   // pas connecté → on renvoie à l'accueil
    exit();
}

require 'variable_connexion.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Espace privé</title>
</head>
<body>
    <header>
        <h1>Espace privé</h1>
        <p>Connecté en tant que <?php echo htmlspecialchars($_SESSION['login']); ?>
           — <a href="deconnexion.php">Se déconnecter</a></p>
    </header>
    <main>
        <h2>Liste des utilisateurs</h2>
        <table border="1">
            <tr><th>Login</th><th>Nom</th><th>Prénom</th><th>Email</th></tr>
            <?php
            $res = mysqli_query($link, "SELECT login, nom, prenom, email FROM utilisateur");
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr><td>" . htmlspecialchars($row['login'])  . "</td>"
                   . "<td>"     . htmlspecialchars($row['nom'])    . "</td>"
                   . "<td>"     . htmlspecialchars($row['prenom']) . "</td>"
                   . "<td>"     . htmlspecialchars($row['email'])  . "</td></tr>";
            }
            ?>
        </table>
    </main>
</body>
</html>
<?php mysqli_close($link); ?>
