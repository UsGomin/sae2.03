<?php
$servername='localhost';
$user='admin';
$sqlpsswd='qwerty';
$database='sae';

$link=mysqli_connect($servername,$user,$sqlpsswd,$database);
if(!$link){
	die("Erreur:".mysqli_connect_error());
}

$email=$_POST['email'] ?? "";
$nom=$_POST['nom'] ?? "";
$prenom=$_POST['prenom'] ?? "";
$password=$_POST['password'] ?? "";

$stmt = mysqli_prepare($link, "INSERT INTO utilisateur (email, nom, prenom, password) VALUES (?, ?, ?, ?)");

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssss', $email, $nom, $prenom, $password);
    
    if (mysqli_stmt_execute($stmt)) {
        // Redirection vers l'index si ça fonctionne pour éviter la page blanche
        header('Location: index.html');
        exit();
    } else {
        echo "Erreur d'exécution : " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Erreur de préparation de la requête : " . mysqli_error($link);
}

mysqli_close($link);

?>   