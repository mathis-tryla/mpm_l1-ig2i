<?php

	session_start();

	try{
	    $db = new PDO('mysql:host=localhost;dbname=mpmTennis_final;charset=utf8','root','***');
	}
	catch(Exception $e){
	    die('Erreur: ' . $e->getMessage());
	}

	$req = $db->prepare('UPDATE utilisateurs SET ?=? WHERE numCarte=?');
	$req->execute(array($_GET['sModif'], $_GET['nouvellevaleur'], $_SESSION['code']));

	header('Location: ../monCompte.php');
