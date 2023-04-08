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
	<title>Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/accueil.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="icon" type="text/css" href="images/icon_raquettes.jpg">
	<style type="text/css">
		html{
			font-family: 'Quicksand', sans-serif;
		}

		body{
			background: linear-gradient(to bottom, rgba(242,249,254,1) 0%,rgba(214,240,253,1) 100%);
		}

		.barre{
			display: inline-block;
			border: 3px black hidden;
			margin-right: 0%;
			padding: 1% 2% 1% 2%;
			text-align: center;
			padding-top: 2%;
			padding-bottom: 2%;
		}

		.barre:hover{
			display: inline-block;
			margin-right: 0%;
			padding: 1% 2% 1% 2%;
			text-align: center;
			padding-top: 2%;
			padding-bottom: 2%;
			background-color: rgba(128,128,128,0.3);
			border-radius: 40px;
		}

		a{
			text-decoration: none;
			color: black;
		}

		#num_carte{
			color: red;
			font-weight: bold;
		}

		#barre_onglets{
			margin-top: 5%;
			margin-left: auto;
			margin-right: auto;
			padding: 0;
			text-align: center;
			background-color: rgb(200,90,25,0.5);
			width: 34%;
			border-radius: 40px;
		}

		#contact{
			position: fixed;
			border: 2px dodgerblue ridge;
			width: 26%;
			padding-top: 1%;
			padding-bottom: 2%;
			z-index: 1000;
			top: 30%;
			background-color: rgba(200,90,25,0.5);
		}

		#contact-content{
			margin-left: 3.5%;
			margin-right: 3.5%;
		}

		#contact-content label{
			font-size: 70%;
			text-decoration: underline;
			font-weight: bold;
		}

		#contact-content span{
			font-size: 80%;
			float: right;
		}

		#blocMilieu{
			border: 2px dodgerblue solid;
			background-color: rgba(128,128,128,0.2);
			width: 65%;
			margin-left: 30%;
		}

		#blocMilieu img{
			box-shadow: 5px 5px 10px rgba(200,90,25,0.5);
		}

		iframe{
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 2%;
			margin-top: 4%;
			border: 5px rgba(200,90,25,0.5) inset;
		}

		h1,.soustitre{
			margin-left: 5%;
		}

		#motPres p{
			margin-top: 4%;
			margin-left: 8%;
			margin-right: 8%;
			margin-bottom: 6%;
		}

		.descriptifs{
			list-style-type: circle;
			display: block;
			font-size: 80%;
		}

	</style>
</head>
<body>



	<div id="num_carte" style="float: right;">Carte <?php echo $sCode ?> :
		<?php
			$prenom="SELECT prenom FROM utilisateurs WHERE numCarte=$sCode";
			$lePrenom=parcoursRs(SQLSelect($prenom));
			$i=0;

			foreach($lePrenom as $cle => $val)
				foreach($val as $cle1 => $val1)
					echo $val1." ";

			$nom="SELECT nom FROM utilisateurs WHERE numCarte=$sCode";
			$leNom=parcoursRs(SQLSelect($nom));
			$i=0;

			foreach($leNom as $cle2 => $val2)
				foreach($val2 as $cle3 => $val3)
					echo "<span style='text-transform: uppercase'>".$val3."</span>";
		?>
	</div>
	<?php mkBr(2) ?>
	<div id="blocMilieu">
		<ul id="barre_onglets">
			<li class="barre"><i class="fas fa-user-circle"></i><br /><?php mkA("monCompte.php","Mon compte") ?></li>
			<li class="barre"><i class="fas fa-play"></i><br /><?php mkA("jouer.php","Jouer") ?></li>
      		<li class="barre"><i class="fas fa-sign-out-alt"></i><br /><?php mkA("connexion.php","Déconnexion") ?></li>
		</ul><?php mkBr(2) ?>

		<h1>Bienvenue au TC Courrières !</h1><br />

		<i><h2 class="soustitre">Nos installations</h2></i>
		<div align="center" style="margin-top: 5%">
			<?php
			 	mkImg("images/devantureSalle.png","","","Entrée de la salle de tennis");
			 	mkImg("images/courtsInterieurs.png","","","Courts intérieurs de la salle","35%","margin-left: 5%;max-width: 40%");
			 	echo "</div>";mkBr(1);
			 ?>
		<div style="font-size: 80%;margin-left: 25%;margin-bottom: 5%"><i><span>Un club house avec bar</span><span style="margin-left: 10%;">3 courts intérieurs en dur, 2 courts extérieurs en dur</span></i></div>

		<i><h2 class="soustitre">Mot du président</h2></i>
		<div id="motPres">
			<p>Depuis plus de 25 ans, le TC COURRIERES propose de vous faire découvrir le tennis grâce à un site équipé de 5 courts refaits à neuf, 3 en intérieur et 2 en extérieur. Son club house central et chaleureux vous offre des moments conviviaux.<br />25 ans que nous nous efforçons de maintenir l'esprit de cette association sportive et amicale, de 230 membres.<br /><br />L'esprit du club est de passer des moments sympathiques tout en ayant une prestation sportive de qualité qui s'établie en 6 axes:</p>
			<ul>
				<li class="descriptifs">Une école de tennis de 100 jeunes toujours en évolution du débutant au groupe compétition</li>
				<li class="descriptifs">Des actions vers le milieu scolaire et les adultes débutants</li>
				<li class="descriptifs">Des cours individuels et collectifs pour tous</li>
				<b><li class="descriptifs">De nombreuses équipes jeunes et adultes</li></b>
				<b><li class="descriptifs">Un tournoi Open et jeune en Décembre - Janvier</li></b>
				<b><li class="descriptifs">Réservation en ligne des courts pour une accessibilité totale</li></b>
			</ul>
			<p>L'implication des bénévoles permet au Tennis Club de Courrières d'être reconnu comme un club formateur mais aussi dynamique, alors, nouveaux adhérents, joueurs occasionnels ou compétiteurs, rejoignez nous pour des moments sportifs et de plaisirs.<br /><br /><br />Amicalement<br /><br />Eric MASQUELEZ</p>
		</div>


		<i><h2 class="soustitre">Où nous trouver ?</h2></i>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.432350416243!2d2.947139550763759!3d50.451673195057886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd32ed030e5927%3A0xad660b1e0a34b0d1!2sTennis+Club+de+Courri%C3%A8res!5e0!3m2!1sfr!2sfr!4v1557741958646!5m2!1sfr!2sfr" width="300" height="300" frameborder="0" allowfullscreen></iframe>

	</div>



	<div id="contact">
		<h2 align="center">Contact</h2><?php mkBr(1) ?>
		<div id="contact-content">
			<?php
				mkLabel("nom_club","Nom du club :");
				mkSpan("nom_club","nomClub","TC Courrières");

				mkBr(2);

				mkLabel("num_tel_fixe","N°téléphone fixe :");
				$leTelClub=getChamp("telClub","clubs");
        mkSpan("num_tel_fixe","numTelFixe",$leTelClub[0]);

				mkBr(2);

				mkLabel("num_tel_pres","N°téléphone président :");
				$leTelPres=getChamp("telPresident","clubs");
				mkSpan("num_tel_pres","numTelPres",$leTelPres[0]);

				mkBr(2);

				mkLabel("adresse_club","Adresse club :");
				$lAdresse=getChamp("adresseClub","clubs");
				mkSpan("adresse_club","adresseClub",$lAdresse[0]);

				mkBr(2);

				mkLabel("ville_club","Ville :");
				$laVille=getChamp("villeClub","clubs");
				mkSpan("ville_club","villeClub",$laVille[0]);

				mkBr(2);

				mkLabel("horaires","Horaires :");
				$lesHoraires=getChamp("horaires","clubs");
				mkSpan("horaires","Horaires",$lesHoraires[0]);

        mkBr(2);

        mkLabel("blackliste","Blacklisté:");
        mkSpan("blackliste","Blackliste","Oui");
      endDiv();
		endDiv();
			?>

</body>
</html>
