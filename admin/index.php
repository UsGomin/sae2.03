<?php
// Page admin protégée par Apache (.htpasswd) — aucune session PHP requise
$link = mysqli_connect('localhost', 'root', 'lannion', 'sae');
if (!$link) { die("Erreur BDD : " . mysqli_connect_error()); }

$res = mysqli_query($link, "SELECT login, email, nom, prenom, valide FROM utilisateur ORDER BY id_utilisateur DESC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Administration – SAE 2.03</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 2px solid var(--bg-color-3); padding: 10px 14px; text-align: left; }
        th { background-color: var(--bg-color-3); color: var(--bg-color-1); }
        tr:nth-child(even) { background-color: var(--color-5); }
        .badge-ok  { color: green; font-weight: bold; }
        .badge-ko  { color: red;   font-weight: bold; }
    </style>
</head>
<body>
    <header>
        <h1>SAE 2.03 – Administration</h1>
        <nav><a href="../index.html" style="color:var(--bg-color-1);">← Retour</a></nav>
    </header>
    <main>
        <h2>Liste des utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>Login</th><th>Email</th><th>Nom</th><th>Prénom</th><th>Validé</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['login']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['nom']) ?></td>
                    <td><?= htmlspecialchars($row['prenom']) ?></td>
                    <td class="<?= $row['valide'] ? 'badge-ok' : 'badge-ko' ?>">
                        <?= $row['valide'] ? '✔ Oui' : '✘ Non' ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
<?php mysqli_close($link); ?>
