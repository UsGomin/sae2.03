<?php
$servername='localhost';
$user='root';
$password='lannion';
$database='sae';

$link=mysqli_connect($servername,$user,$password,$database);
if(!$link){
	die("Erreur:".mysqli_connect_error());
}
?>