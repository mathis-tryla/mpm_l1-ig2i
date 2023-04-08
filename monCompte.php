<?php
	include_once("librairies/balises.php");
	include_once("librairies/maLibSQL.pdo.php");
	include_once("librairies/utiles.php");
	session_start();
	$sCode = $_SESSION['code'];
	$sMdp = $_SESSION['mdp'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Mon Compte</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="icon" type="text/css" href="images/icon_raquettes.jpg">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<style type="text/css">
		html{
			background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c);
			font-family: 'Quicksand', sans-serif;
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

		h2{
			color:dodgerblue;
		}

		hr{
			margin-left: auto;
			margin-right: auto;
			width: 80%;
		}

		#identite	label, #infos label{
			color: black;
		}

		#carte_identite{
			display: flex;
		}

		#infos{
			border: 3px #f69d3c solid;
			border-radius: 20px;
			margin-top: 5%;
			margin-left: 17.5%;
			padding: 2%;
			width: 20%;
			height: 50%;
			background-color: white;
		}

		#infos span{
			float: right;
			font-weight: bold;
		}

		#infos i{
			float: right;
		}

		#infos i:hover{
			cursor: pointer;
		}

		#identite{
			border: 3px #3f87a6 solid;
			border-radius: 20px;
			margin-top: 5%;
			margin-left: 17.5%;
			padding: 0.6%;
			width: 20%;
			background-color: white;
		}

		#identite h2{
			text-align: center;
		}

		#modifier{
			display: none;
			margin-left: auto;
			margin-right: auto;
			border: 2px black dotted;
			border-radius: 20px;
			margin-top: 3%;
			padding: 2% 2% 3% 2%;
			width: 30%;
			background-color: white;
		}

		#modifier input, #modifier select{
			float: right;
			margin-right: 3%;
		}

		#modifier label, #modifier input[type="button"]{
			font-style: italic;
			font-size: 80%;
		}

	</style>
</head>
<body>

<a href="connexion.php" id="lien_deco"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<span id="deconnexion">Déconnexion</span></a>

	<br />

	<h1>Mes informations personnelles</h1>
	<hr>

	<?php
		$champs = Array("numLicence","ligue","adresse","telephone","mail");

		echo "<div id='modifier'>";
			mkForm("maj_db/monCompte.php","GET");
				mkLabel("selectModif","Champ à modifier:");
				mkSelect("sModif","selectModif",$champs);
				mkBr(2);
				mkLabel("nvValeur","Nouvelle valeur:");
				mkInput("text","nouvellevaleur");
				mkBr(2);
			mkInput("submit","validernvinfos","Appliquer");
			endForm();
		endDiv();
	?>

	<div id="carte_identite">
		<div id="infos">
			<?php
					mkLabel("num_license","N°Licence:");
					$leNumLicence = getChamp("numLicence","utilisateurs","WHERE numCarte=$sCode");
					echo "<span>".$leNumLicence[0]."</span>";
				mkBr(2);

					mkLabel("ligue","Ligue:");
					$laLigue = getChamp("ligue","utilisateurs","WHERE numCarte=$sCode");
					echo "<span>".$laLigue[0]."</span>";
				mkBr(2);

					mkLabel("adresse","Adresse:");
					$lAdresse = getChamp("adresse","utilisateurs","WHERE numCarte=$sCode");
					echo "<span>".$lAdresse[0]."</span>";
				mkBr(2);

					mkLabel("num_tel","Téléphone:");
					$leTelephone = getChamp("telephone","utilisateurs","WHERE numCarte=$sCode");
					echo "<span>".$leTelephone[0]."</span>";
				mkBr(2);

					mkLabel("mail","Mail:");
					$leMail = getChamp("mail","utilisateurs","WHERE numCarte=$sCode");
						echo "<span>".$leMail[0]."</span>";
				mkBr(2);
			?>
			<i class="fas fa-edit" onclick="modifierInfos()" title="Modifier les informations"></i>
		</div>

		<div id="identite">
			<h2>
				<?php
					$leNom = getChamp("nom","utilisateurs","WHERE numCarte=$sCode");
					echo "<u><label>Nom:</label></u> ".$leNom[0];
				?>
			</h2>
			<h2>
				<?php
					$lePrenom = getChamp("prenom","utilisateurs","WHERE numCarte=$sCode");
					echo "<u><label>Prénom:</label></u> ".$lePrenom[0];
				?>
			</h2>
			<h2>
				<?php
					$lAge = getChamp("age","utilisateurs","WHERE numCarte=$sCode");
					echo "<u><label>Âge:</label></u> ".$lAge[0]." ans";
				?>
			</h2>
			<h2>
				<?php
					$leClub = getChamp("club","utilisateurs","WHERE numCarte=$sCode");
					echo "<u><label>Club:</label></u> ".$leClub[0];
				?>
			</h2>
		</div>
	</div>


	<script>
		function modifierInfos(){
			document.getElementById('modifier').style.display="block";
		}
	</script>

</body>
</html>


<!-- if(isset($_POST['sModif']) && isset($_POST['nouvellevaleur'])){
					$selected=$_POST['sModif'];
					$nouvelleValeur=$_POST['nouvellevaleur'];
					$j=0;
					foreach($champs as $cle => $val){
						if($val==$selected){
							$index=$j;
						}
						$j++;
					}

					$i=0;
					foreach ($champs as $key => $value) {
						$chBdd[$i]=$key;
						$i++;
					}
				}*/


