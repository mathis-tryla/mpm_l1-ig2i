<?php

			//////////////////////////////////////////////////////
			//FICHIER PERMETTANT DE CREER PLUSIEURS BALISES HTML//
			//////////////////////////////////////////////////////


function mkA($nom_avecExtension,$contenu,$id="",$onclick=""){
	echo "<a href=\"$nom_avecExtension\" id=\"$id\" onclick=\"$onclick\">".$contenu."</a>";
}

function mkSpan($id,$name,$contenu=""){
	echo "<span id=\"$id\" name=\"$name\">".$contenu."</span>";
}

function mkBr($nbreBr){
	$i=0; for($i=0;$i<$nbreBr;$i++) echo "<br />";
}

function mkForm($action="",$method=""){
	echo "<form action=\"$action\" method=\"$method\">";
}

function endForm(){
	echo "</form>";
}

function mkDiv($id=""){
	echo "<div id=\"$id\">";
}

function endDiv(){
	echo "</div>";
}

function mkH($numH,$contenu){
	echo "<h$numH>$contenu</h$numH>";
}

function mkInput($type,$name="",$value="",$ph="",$id="",$onclick=""){
    echo "<input type=\"$type\" name=\"$name\" value=\"$value\" placeholder=\"$ph\" id=\"$id\" onclick=\"$onclick\"/>";
}

function mkLabel($for,$contenu){
	echo "<label for=\"$for\">".$contenu."</label>";
}

function mkImg($src,$id="",$title="",$alt="",$width="",$style=""){
	echo "<img src=\"$src\" id=\"$id\" title=\"$title\" alt=\"$alt\" width=\"$width\" style=\"$style\"/>";
}

function mkTd($class="",$id="",$contenu="",$onclick=""){
	echo "<td class=\"$class\" id=\"$id\" onclick=\"$onclick\">$contenu</td>";
}

function mkTr($id=""){
	echo "<tr id=\"$id\">";
}

function endTr(){
	echo "</tr>";
}

function mkTh($contenu="",$class=""){
	echo "<th class=\"$class\">$contenu</th>";
}

function mkSelect($nomChampSelect,$id,$tabData,$onfocus="",$multiple="",$class=""){

	echo "<select $multiple name=\"$nomChampSelect\" id=\"$id\" onfocus=\"$onfocus\">\n";
	echo "<option>--Choisissez une option--</option>\n";
	foreach ($tabData as $data){
		echo "<option>$data</option>\n";
	}
	echo "</select>";
}

function mkLigne($tabAsso,$listeChamps=false)
{
	// Fonction appelée dans mkTable, produit une ligne
	// contenant les valeurs des champs à afficher dans mkTable
	// Les champs à afficher sont définis à partir de la liste listeChamps
	// si elle est fournie ou du tableau tabAsso

	if (!$listeChamps)	// listeChamps est faux  : on utilise le not : '!'
	{
		// tabAsso est un tableau associatif
		echo "\t<tr>\n";
		foreach ($tabAsso as $cle => $val)
		{
			echo "\t\t<td>$val</td>\n";
		}
		echo "\t</tr>\n";
	}
	else	// les champs à afficher sont dans $listeChamps
	{
		echo "\t<tr>\n";
		foreach ($listeChamps as $nomChamp)
		{
			echo "\t\t<td>$tabAsso[$nomChamp]</td>\n";
		}
		echo "\t</tr>\n";
	}
}

function mkTable($id="")
{
	echo "<table id=\"$id\">";
}

function endTable(){
	echo "</table>";
}

?>
