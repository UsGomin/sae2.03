<?php
/**
 * Script de nettoyage automatique – exécuté chaque nuit à 3h par cron
 * Supprime les comptes non validés créés depuis plus de 24h
 *
 * Ajouter dans crontab (crontab -e sur la VM) :
 *   0 3 * * * php /var/www/sae203/cron_nettoyage.php >> /var/log/cron_sae.log 2>&1
 */

$link = mysqli_connect('localhost', 'root', 'lannion', 'sae');
if (!$link) {
    die("[ERREUR] Connexion BDD impossible : " . mysqli_connect_error() . "\n");
}

$stmt = mysqli_prepare($link,
    "DELETE FROM utilisateur WHERE valide = 0 AND token IS NOT NULL");
mysqli_stmt_execute($stmt);
$nb = mysqli_stmt_affected_rows($stmt);

echo "[" . date('Y-m-d H:i:s') . "] Nettoyage : $nb compte(s) non validé(s) supprimé(s).\n";

mysqli_stmt_close($stmt);
mysqli_close($link);
