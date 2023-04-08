<?php

include_once "config.php";


function SQLUpdate($sql)
{
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;

	try {
		$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
	} catch (PDOException $e) 
		{
			die("<font color=\"red\">SQLUpdate/Delete: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

	$dbh->exec("SET CHARACTER SET utf8");
	$res = $dbh->query($sql);
	if ($res === false) 
	{
		$e = $dbh->errorInfo(); 
		die("<font color=\"red\">SQLUpdate/Delete: Erreur de requete : " . $e[2] . "</font>");
	}

	$dbh = null;
	$nb = $res->rowCount();
	if ($nb != 0) return $nb;
	else return false;
	
}

// Un delete c'est comme un Update
function SQLDelete($sql) {return SQLUpdate($sql);}


function SQLInsert($sql)
{
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;
	
	try {
		$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
	} catch (PDOException $e) 
		{
			die("<font color=\"red\">SQLInsert: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

	$dbh->exec("SET CHARACTER SET utf8");
	$res = $dbh->query($sql);
	if ($res === false) 
	{
		$e = $dbh->errorInfo(); 
		die("<font color=\"red\">SQLInsert: Erreur de requete : " . $e[2] . "</font>");
	}

	$lastInsertId = $dbh->lastInsertId();
	$dbh = null; 
	return $lastInsertId;
}

function SQLGetChamp($sql)
{
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;

	try {
		$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
	} catch (PDOException $e) 
		{
			die("<font color=\"red\">SQLGetChamp: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

	$dbh->exec("SET CHARACTER SET utf8");
	$res = $dbh->query($sql);
	if ($res === false) 
	{
		$e = $dbh->errorInfo(); 
		die("<font color=\"red\">SQLGetChamp: Erreur de requete : " . $e[2] . "</font>");
	}

	$num = $res->rowCount();
	$dbh = null;

	if ($num==0) return false;
	
	$res->setFetchMode(PDO::FETCH_NUM);

	$ligne = $res->fetch();
	if ($ligne == false) return false;
	else return $ligne[0];

}

function SQLSelect($sql)
{	
 	global $BDD_host;
	global $BDD_base;
 	global $BDD_user;
 	global $BDD_password;

	try {
		$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
	} catch (PDOException $e) 
		{
			die("<font color=\"red\">SQLSelect: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

	$dbh->exec("SET CHARACTER SET utf8");
	$res = $dbh->query($sql);
	if ($res === false) 
	{
		$e = $dbh->errorInfo(); 
		die("<font color=\"red\">SQLSelect: Erreur de requete : " . $e[2] . "</font>");
	}
	
	$num = $res->rowCount();
	$dbh = null;

	if ($num==0) return false;
	else return $res;
}


function parcoursRs($result)
{
	if  ($result == false) return array();

	$result->setFetchMode(PDO::FETCH_ASSOC);
	while ($ligne = $result->fetch()) 
		$tab[]= $ligne;

	return $tab;
}

?>
