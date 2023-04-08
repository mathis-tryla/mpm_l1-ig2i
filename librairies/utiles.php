<?php


function getChamp($champ,$nomTable,$suiteReq=""){
	$requete="SELECT $champ FROM $nomTable $suiteReq";
	$tab=parcoursRs(SQLSelect($requete));
	$i=0;
	foreach ($tab as $val){
		foreach ($val as $val1){
			$tab1[$i]=$val1;
			$i++;
		}
	}
	return $tab1;
}

//fonction permettant de savoir si user est admin ou non
function isAdmin($tabUser,$index){					
		if($tabUser[$index]==1){return "Oui";}
		else{return "Non";}
}

//fonction permettant de savoir si user est blacklisté ou non
function isBl($tabUser,$index){
		if($tabUser[$index]==1){return "Oui";}
		else{return "Non";}
}

function tprint($tab)
{
	echo "<pre>\n";
	print_r($tab);
	echo "</pre>\n";
}

?>
