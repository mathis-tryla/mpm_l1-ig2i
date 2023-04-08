<?php
	include_once("librairies/balises.php");
	include_once("librairies/maLibSQL.pdo.php");
	include_once("librairies/utiles.php");
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Jouer</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/accueil.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<link rel="icon" type="text/css" href="images/icon_raquettes.jpg">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<style type="text/css">
			*{
				font-family: 'Quicksand', sans-serif;
			}

			html{
				background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c);
			}

			#lien_deco{
				float: right;
				text-decoration: none;
				color: grey;
				width: 10%;
			}

			#deconnexion:hover{ text-decoration: underline; }

			h1{
				text-align: center;
			}

			hr{
				margin-left: auto;
				margin-right: auto;
				width: 80%;
			}

			label{
				margin-right: 5%;
			}

			fieldset{
				border: 2px orange double;
				margin-top: 7%;
				margin-left: auto;
				margin-right: auto;
				max-width: 50%;
				padding-bottom: 2%;

			}

			fieldset>div{
				margin-left: auto;
				margin-right: auto;
				margin-top: 5%;
				max-width: 70%;
			}

			input[type="button"]{
				display: block;
				margin-left: auto;
				margin-right: auto;
				margin-top: 7%;
				border-radius: 60px;
				border: 1px black solid;
				background:white;
				text-align:center;
				max-width:50%;
				padding-top: 0%;
				transition: 0.5s;
			}

			input[type="button"]:hover{
				background-color: #EBFF00;
				cursor: pointer;
			}

			input[type="button"]+span{
				font-style: italic;
			}

			input[type="submit"]{
				position: absolute;
				top: 2%;
				left: 3%;
			}

			#clubs,#tournois{
				border: hidden;
				border-radius: 10px;
				padding: 2%;
				background-color: #232346;
			}

			#clubs h2{
				font-weight: bold;
				text-decoration: underline;
				color: #EBFF00;
			}

			#clubs span{
				text-align: center;
				margin-left: 3%;
				color: white;
			}

			#clubs span:hover{
				color: #EBFF00;
				cursor: default;
			}

			#rDepartement{
				display: none;
			}
		</style>

	</head>
<body onload="init()">

	<script>
		function init(){
			var clubs;
			var contenu;
			var selectLigue;
			var index;
			var bouton;

			var select1Ligue;
			var index;
			var divDpt;
			var boutonDpt;
			var boutonRechercher;
		}
	</script>

	<a href="connexion.php" id="lien_deco"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<span id="deconnexion">Déconnexion</span></a>

	<br />

	<h1>Jouer</h1>
	<hr>

<!------------------------------ PREMIER FIELDSET ------------------------------>
	<fieldset>
		<legend>Rechercher un club</legend>
			<?php
				echo "<div>";
					mkLabel("ligue","Ligue:");
					$tabLigues=getChamp("nomLigue","ligues");
					$tabClub=getChamp("nomClub","les_clubs");
					$tabClubLigue=getChamp("nomClub,ligue","les_clubs");

					$i=0;
					mkSelect("ligues","ligue",$tabLigues);
					mkInput("button","","Rechercher","","boutonRechercher","afficherClub()");
					mkBr(2);

					$i=0;
					foreach($tabLigues as $ligue){
						$tabClubs=getChamp("nomClub","les_clubs","WHERE ligue='$ligue'");
						$tabLigues[$i]=$tabClubs;
						$i++;
					}


					$json=json_encode($tabLigues);

					echo "<script>

							bouton=document.getElementById('boutonRechercher');
							var i=0;

							function afficherClub(){
								clubs=document.getElementById('clubs');
								selectLigue=document.getElementById('ligue');
								index=selectLigue.selectedIndex;
								contenu='<h2>'+selectLigue.value+'</h2><br />';
								for(i=0; i<".$json."[index-1].length; i++){
									contenu+='<span>> '+".$json."[index-1][i]+'</span><br /><br />';
								}
								clubs.innerHTML=contenu;
							}
						</script>";
				endDiv();
			?>

		<div id="clubs"></div>
	</fieldset>


<!------------------------------ DEUXIEME FIELDSET ------------------------------>
	<fieldset>
		<legend>Rechercher un tournoi</legend>
	<?php
		echo "<div>";
			mkLabel("ligue1","Ligue:");
			$tabLigues1=getChamp("nomLigue","ligues");
			$tabClub=getChamp("nomClub","les_clubs");
			$tabTournois=getChamp("nomTournoi","tournois");
			$i=0;



			mkSelect("ligues","ligue1",$tabLigues1);
			mkBr(2);
			mkInput("button","","Rechercher par département","","boutonRechercherDpt","afficherDepartement()");
			mkBr(2);
			echo "<div id='rDepartement'>";
				mkLabel("departement","Département:");
				mkSelect("sDpts","select1Departement");
				mkInput("button","","Rechercher","","boutonRechercher","afficherTournoi()");
			endDiv();
		endDiv();
		echo "<div id='tournois'>";
		endDiv();

		$i=0;
		/*foreach($tabLigues1 as $ligue1){
			$tabDpt=getChamp("departement","tournois","WHERE ligue='$ligue1'");
			$tabDpts[$i]=$tabDpt;
			$i++;
		}*/


		foreach($tabLigues1 as $ligue1){
			$requete="SELECT departement FROM tournois WHERE ligue='$ligue1'";
			$tab=parcoursRs(SQLSelect($requete));
			$i=0;
			foreach ($tab as $val){
				foreach ($val as $val1){
					$tabDpts[$i]=$val1;
					$i++;
				}
			}
		}



		$json1=json_encode($tabDpts);

		echo "<script>

						divDpt=document.getElementById('rDepartement');
						boutonDpt=document.getElementById('boutonRechercherDpt');
						boutonRechercher=document.getElementById('boutonRechercher');


						function afficherDepartement(){
							divDpt.style.display='block';
							boutonDpt.style.display='none';
							select1Ligue=document.getElementById('ligue1');
							index=select1Ligue.selectedIndex;
							";mkSelect("sDpts","select1Departement",$tabDpts)."
						}

						function afficherTournoi(){
							boutonDpt.style.display='block';
							divDpt.style.display='none';
						}
					</script>";
	?>

	</fieldset>

	<?php	mkForm("accueil.php","POST");	mkInput("submit","","Retour"); endForm(); ?>


</body>
</html>
