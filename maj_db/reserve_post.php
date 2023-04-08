<?php

try{
	$bdd = new PDO('mysql:host=localhost;dbname=mpmTennis_final;charset=utf8','root','root');
} 
catch(Exception $e){
	die('Erreur: ' . $e->getMessage());
}

$req0 = $bdd->prepare('INSERT INTO resultats(set1P1,set1P2,set2P1,set2P2,joueur1,joueur2) VALUES(?,?,?,?,?,?)'); 
$req0->execute(array($_POST['set1P1'], $_POST['set2P1'], $_POST['set2P1'], $_POST['set2P2'], $_POST['joueur1'], $_POST['joueur2']));
print_r($_POST);
//header('Location: ../reserve.php');