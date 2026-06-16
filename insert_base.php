<?php
$servername='localhost';
$user='root';
$sqlpsswd='lannion';
$database='sae';

$link=mysqli_connect($servername,$user,$sqlpsswd,$database);
if(!$link){
	die("Erreur:".mysqli_connect_error());
}


if(isset($_POST['login']) AND isset($_POST['email']) AND  isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['password'])){

	$stmt = mysqli_prepare($link, "INSERT INTO utilisateur (login, email, nom, prenom, password) VALUES (?, ?, ?, ?, ?)");

	if ($stmt) {
    	mysqli_stmt_bind_param($stmt, 'sssss',$_POST['login'] ,$_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['password']);
    
    	if (mysqli_stmt_execute($stmt)) {
        	header('Location: acceuil.html');
        	exit();
    	}
    	mysqli_stmt_close($stmt);
	}

}

mysqli_close($link);

?>   