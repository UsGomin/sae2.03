<?php
$jours = ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];
$mois  = ['','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];

$jour      = $jours[date('w')];
$date      = date('d') . ' ' . $mois[(int)date('n')] . ' ' . date('Y');
$heure     = date('H:i:s');

$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$mobile = preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $ua);
$terminal = $mobile ? 'Mobile / Tablette' : 'Ordinateur de bureau';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Accueil – SAE 2.03</title>
    <style>
        .info-box {
            background-color: var(--bg-color-2);
            color: var(--bg-color-1);
            border: 2px solid var(--bg-color-3);
            border-radius: 8px;
            padding: 20px 30px;
            display: inline-block;
            margin-top: 30px;
            box-shadow: -4px 4px var(--bg-color-3);
        }
        .info-box p {
            margin: 8px 0;
            font-size: 16px;
        }
        .info-box strong {
            color: var(--bg-color-1);
        }
        #geoloc {
            margin-top: 10px;
            font-style: italic;
            color: #555;
        }
        nav a {
            margin-right: 15px;
            color: var(--bg-color-3);
            font-weight: bold;
            text-decoration: none;
        }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <header>
        <h1>SAE 2.03</h1>
        <nav>
            <a href="index.html">Connexion / Inscription</a>
            <a href="acceuil.php">Accueil</a>
        </nav>
    </header>

    <main>
        <h2>Bienvenue sur notre site SAE 2.03</h2>

        <div class="info-box">
            <p><strong>Jour :</strong> <?= htmlspecialchars($jour) ?></p>
            <p><strong>Date :</strong> <?= htmlspecialchars($date) ?></p>
            <p><strong>Heure :</strong> <?= htmlspecialchars($heure) ?></p>
            <p><strong>Terminal :</strong> <?= htmlspecialchars($terminal) ?></p>
            <p id="geoloc">Localisation : chargement…</p>
        </div>
    </main>

    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    const lat = pos.coords.latitude.toFixed(4);
                    const lon = pos.coords.longitude.toFixed(4);
                    document.getElementById('geoloc').textContent =
                        'Localisation : ' + lat + '° N, ' + lon + '° E';
                },
                function() {
                    document.getElementById('geoloc').textContent =
                        'Localisation : accès refusé ou non disponible';
                }
            );
        } else {
            document.getElementById('geoloc').textContent =
                'Localisation : non supportée par ce navigateur';
        }
    </script>
</body>
</html>
