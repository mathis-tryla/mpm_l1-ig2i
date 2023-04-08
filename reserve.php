<?php
	include_once("librairies/balises.php");
	include_once("librairies/maLibSQL.pdo.php");
	include_once("librairies/utiles.php");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Réservation</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="icon" type="text/css" href="images/icon_raquettes.jpg">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<style type="text/css">
		html{ font-family: 'Quicksand', sans-serif; background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c); }

		h1{ margin-top: 8%; }

		hr{
			margin-left: auto;
			margin-right: auto;
			width: 80%;
		}

		a[href="game.php"]{
			position: absolute;
			top: 30%;
			width: 80%;
		}

		a[href="game.php"] span{
			position: absolute;
			text-decoration: none;
			color: white;
			font-size: 80%;
			text-transform: lowercase;
			left: 2%;
			cursor: pointer;
		}

		a[href="game.php"] span:hover{ text-decoration: underline; }

		a[href="game.php"]>i{ color: white; }

		#date_heure{
			position: absolute;
			display: block;
			top: 2%;
			left: 2%;
			padding: 1%;
			text-align: center;
			background: linear-gradient(#f69d3c, white);
			border: 2px ridge #f69d3c;
			border-radius: 20px;
			width: 10%;
			max-height: 5%;
		}

		#lien_deco{
			position: absolute;
			right: 1%;
			top: 2%;
			float: right;
			text-decoration: none;
			color: grey;
			width: 10%;
			cursor: pointer;
		}

		#deconnexion:hover{ text-decoration: underline; }

		.case_vide{
			border: 1px grey solid;
			background-color: rgba(0,255,0,0.3);
			font-size: 60%;
		}

		.case_heures{
			border: 1px grey solid;
			background-color: #232346;
			color: white;
			width: 10%;
		}

		.case_heures:hover , th:hover{ cursor: default; }

		td{ border-radius: 20px; }

		h2,h1,td{ text-align: center; }

		input[type="submit"]{
			position: absolute;
			top: 2%;
			left: 3%;
		}

		select{
			border: 0;
			border: 1px solid white;
			font-family: 'Quicksand', sans-serif;
			background-color: white;
			float: right;
			margin-right: 4%;
			max-width: 60%;	
			
		}

		input[type="button"],#zoneReserver{
			display: block;
			margin-left: auto;
			margin-right: auto;
			font-family: 'Quicksand', sans-serif;
		}

		input[type="button"]{
			border: 0;
			background-color: white;
			transition: 0.20s;
		}

		input[type="button"]:hover{
			border-radius: 10px;
			text-decoration: underline;
			cursor: pointer;
		}

		#zoneReserver{
			border: 5px double white;
			background-color: #232346;
			color: white;
			padding: 0% 2% 1% 2%;
			width: 22%;
		}

		#erreur{
			font-weight: bold;
			font-size: 80%;
			text-align: center;
			margin-bottom: 5%;
		}

		#erreur i{ margin-right: 3%; }

		.rouge{ color: red; }

		.vert{ color: green; }

		#legend{
			margin: 0 auto;
			width: 90%;
			text-align: center;
		}

		.rectCouleur{
			text-align: center;
			width: 7%;
			padding: 0.5%;
			border-radius: 20px;
			font-size: 75%;
			font-style: italic;
		}

		#green{ background-color: rgba(0,255,0,0.3); display: inline-block; }

		#red{ background-color: rgba(255,0,0,0.3); display: inline-block; }

		#chat{
			position: fixed;
			bottom: 2%;
			right: 2%;
			border: 4px #3f87a6 solid;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			width: 20%;
			background: url('images/fond_chat.jpg') no-repeat;
			background-size: 100%;
		}
		
		p{
			color: white;
			text-align: center;
			text-transform: uppercase;
			text-decoration: underline;
			font-weight: bold;
			font-size: 150%;
		}

		#chat i{
			font-size: 120%;
			margin-left: 2%;
			padding-bottom: 2%;
			padding-top: 1%;
			cursor: pointer;
		}

		.fa-paper-plane:hover{
			color: #3f87a6;
		}

		/* zone ecriture message + icon send*/
		p+div+div+div{
			border-top: 1px grey solid;
			background-color: white;
			padding-top: 2%;
			padding-bottom: 2%;
		}

		/* chat-content*/
		p+div+div{
			margin-top: 3%;
			margin-bottom: 3%;
			max-height: 250px;
		}

		#destinataire{
			border: 1px solid green;
			margin-bottom: 1%;
			background-color: white;
		}

		input[type="text"]{
			font-family: 'Quicksand', sans-serif;
			border: 0;
			padding: 1%;
			width: 70%;
		}

		#destinataire i{
			padding-bottom: 2%;
			padding-top: 2%;
			cursor: inherit;	
		}

		i+select{
			font-size: 70%;
			color: #757575;
			font-weight: bold;
			margin-right: 35%;
		}

		/* gif salut dans chat */
		img[alt="Salut!"]{
			width: 10%;
			margin-left: 2%;
			cursor: pointer;
		}

		/* div resultats */
		script+div{
			display: none;
			position: fixed;
			background-color: #232346;
			border: 2px #f69d3c double;
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
			padding: 1%;
			width: 20%;
			bottom: 2%;
			left: 0%;
			text-align:center;
		}

		/* tableau resultats */
		#resultats table{
			border-collapse: collapse;
		}

		/* cellules du tableau resultats */
		div table td, .main{
			border-radius: 0px;
			border: 1px solid black;
			width: 1%;
		}

		table select{
			margin-right: 30%;
		}

		h4{ 
			text-align: center; 
			text-decoration: underline; 
			color: white; 
		}
		
		.orange{ background-color: #f69d3c; }

		.white, { background-color: white; }

		#boutonScore{ 
			display: none; 
			text-align: center;
		}

		#resultats label, #resultats input[type="button"]{
			font-size: 80%;
		}	

		#resultats label{ color: white; }

		#resultats p{
			color: white;
			text-transform: uppercase;
			font-weight: bold;
			text-align: center;
			font-size: 100%;
		}

	</style>
</head>
<body onload="init()">

	<script>

		var select_heure;
		var select_court;
		var select_partenaire0;
		var select_partenaire;
		var erreur;
		var score;
		var joueur1;
		var joueur2;
		var boutonScore;
		var gagnant;


		function init(){
			select_heure = document.getElementById('selectHeure');
			select_court = document.getElementById('selectCourt');
			select_partenaire0 = document.getElementById('selectPartenaire0');
			select_partenaire = document.getElementById('selectPartenaire');
			erreur = document.getElementById('erreur');
			score = document.getElementById('resultats');
			joueur1 = document.getElementById('joueur1');
			joueur2 = document.getElementById('joueur2');
			boutonScore = document.getElementById('boutonScore');
			
			date_heure('date_heure');
		}

		function date_heure(id){
			date = new Date;
			annee = date.getFullYear();
			moi = date.getMonth();
			mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
			j = date.getDate();
			jour = date.getDay();
			jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
			h = date.getHours();
			if(h<10)
			{
							h = "0"+h;
			}
			m = date.getMinutes();
			if(m<10)
			{
							m = "0"+m;
			}
			s = date.getSeconds();
			if(s<10)
			{
							s = "0"+s;
			}
			j=jours[jour];
			resultat = j+'<br />'+h+':'+m+':'+s;
			document.getElementById(id).innerHTML = resultat;
			setTimeout('date_heure("'+id+'");', 1000);
			return true;
		}

		function majTab(){

			var indexH = select_heure.selectedIndex;
			var indexC = select_court.selectedIndex;
			var indexP = select_partenaire.selectedIndex;
			var indexP0 = select_partenaire0.selectedIndex;
			var lHeure = select_heure[indexH].value;
			var leCourt = select_court[indexC].value;
			var lePartenaire0 = select_partenaire0[indexP0].value;
			var lePartenaire = select_partenaire[indexP].value;

			if(leCourt==select_court[0].value){
				erreur.innerHTML='<i style=\'color:red\' class=\'fas fa-exclamation-circle\'></i><span class=\'rouge\'>Tu ne vas tout de même pas jouer sur de l\'eau !</span>';
			}
			else if(lHeure==select_heure[0].value){
				erreur.innerHTML='<i style=\'color:red\' class=\'fas fa-exclamation-circle\'></i><span class=\'rouge\'>Tu ne vas tout de même pas jouer toute la journée !</span>';
			}
			else if(document.getElementById(lHeure+'.'+indexC).innerHTML!=''){
				erreur.innerHTML='<i style=\'color:red\' class=\'fas fa-exclamation-circle\'></i><span class=\'rouge\'>Le créneau renseigné est déjà réservé !</span>';
			}
			else if(lePartenaire==lePartenaire0){
				erreur.innerHTML='<i style=\'color:red\' class=\'fas fa-exclamation-circle\'></i><span class=\'rouge\'>Difficile de jouer avec soi-même !</span>';
			}
			else if(lePartenaire0=="--Choisissez une option--" || lePartenaire=="--Choisissez une option--"){
				erreur.innerHTML='<i style=\'color:red\' class=\'fas fa-exclamation-circle\'></i><span class=\'rouge\'>Difficile de jouer tout seul !</span>';
			}
			else if(document.getElementById(lHeure+'.'+indexC).style.backgroundColor!='rgba(255,0,0,0.3)' && lePartenaire!=lePartenaire0 && lePartenaire0!=select_partenaire0[0].value && lePartenaire!=select_partenaire[0].value && lHeure!=select_heure[0].value && leCourt!=select_court[0].value){
				document.getElementById(lHeure+'.'+indexC).style.backgroundColor='rgba(255,0,0,0.3)';
				document.getElementById(lHeure+'.'+indexC).innerHTML=lePartenaire0+' VS '+lePartenaire;
				erreur.innerHTML='<i style=\'color:green\' class=\'fas fa-check-circle\'></i><span class=\'vert\'>Réservation validée !</span>';
				boutonScore.style.display="block";
			}

			return lePartenaire0;
		}

		function cacherMessage(){
			erreur.innerHTML="";
		}

		function afficherScore(){
			
			var indexP = select_partenaire.selectedIndex;
			var lePartenaire = select_partenaire[indexP].value;
			
			score.innerHTML="";		
			score.style.display="block";
			boutonScore.style.display="none";

			joueur1.innerHTML=majTab();
			joueur2.innerHTML=lePartenaire;
			score.innerHTML+="<h4>Score du match:</h4><form action='maj_db/reserve_post.php' method='POST'><table><tr><th></th><th class='main orange'>1er set</th><th class='main orange'>2ème set</th></tr><tr><td name='joueur1' class='petit orange' id='joueur1'>"+majTab()+"</td><td class='main white'><select name='set1Pl1'><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option></select></td><td class='main white'><select name='set2Pl1'><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option></select></td></tr><tr><td name='joueur2' class='petit orange' id='joueur2'>"+lePartenaire+"</td><td class='main white'><select name='set1Pl2'><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option></select></td><td class='main white'><select name='set2Pl2'><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option></select></td></tr></table><br /><label for='gagnant'>Le/la gagnant(e): </label><select id='gagnant'><option>"+majTab()+"</option><option>"+lePartenaire+"</option></select><br /><br /><input type='submit' value='Valider' onclick='dispCongrats()'/></form>";

		}

		function dispCongrats(){
			
			var gagnant = document.getElementById('gagnant');
			var selected = gagnant.selectedIndex;
			var winner = gagnant[selected].value;
			score.innerHTML="";
			score.innerHTML+="<p>BRAVO "+winner+" !!!<p>";
			score.innerHTML+="<br /><img src='images/gif_bravo.gif' alt='Gif Bravo' style='width: 30%; text-align: center'/>";
			setTimeout("hideScore()", 3000);
		}

		function hideScore(){
			score.style.display="none";
			score.innerHTML="";
		}

	</script>


	<div id="date_heure"></div>

	<a href="connexion.php" id="lien_deco"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<span id="deconnexion">Déconnexion</span></a>

	<h1>Réserver un court</h1>
	<hr>

	<a href="game.php"><i class="fas fa-directions"></i><span>Liste des matchs terminés<span></a>
	
	<?php
		mkBr(3);

		$lesHeures = Array("8","9","10","11","12","13","14","15","16","17","18","19","20");
		$lesCourts=getChamp("nom","courts");
		$lesPartenaires=getChamp("nom","utilisateurs");

		echo "<div id='zoneReserver'>";
			echo "<h2 style='text-decoration:underline'>Jouer</h2>";
			mkLabel("selectPartenaire0","Je suis:");
			mkSelect("partenaires0","selectPartenaire0",$lesPartenaires,"cacherMessage()");
			mkBr(2);
			mkLabel("selectHeure","Heure:");
			mkSelect("heures","selectHeure",$lesHeures,"cacherMessage()");
			mkBr(2);
			mkLabel("selectCourt","Court: ");
			mkSelect("courts","selectCourt",$lesCourts,"cacherMessage()");
			mkBr(2);
			mkLabel("selectPartenaire","Partenaire: ");
			mkSelect("partenaires","selectPartenaire",$lesPartenaires,"cacherMessage()");
			mkBr(2);
			echo "<div id='erreur'>";endDiv();
			mkInput("button","","Réserver","","reserver","majTab()");
		endDiv();
		mkBr(2);
	?>

	<input type="button" value="Soumettre le score du match" id="boutonScore" onclick="afficherScore()"/>

	<br />

	<div id="legend">
		<div class="rectCouleur" id="green">disponible</div>
		<div class="rectCouleur" id="red">réservé</div>
	</div>		

	<br />

	<table align="center">
		<thead>
			<tr>
				<?php	echo "<th></th>";	$nom=getChamp("nom","courts"); foreach ($nom as $court) echo "<th>$court</th>";	?>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php
				$j=1;
				for($i=8; $i<21; $i++){
					mkTr();
						mkTd("case_heures","","$i:00","");
						mkTd("case_vide","$i.$j");$j++;					
						mkTd("case_vide","$i.$j");$j++;
						mkTd("case_vide","$i.$j");$j++;
						mkTd("case_vide","$i.$j");$j++;
					endTr();
					$j=1;
				}
			?>
			</tr>
		</tbody>
	</table>


	<div id='chat'> 
		<p>chat ten'2i</p>
		<div id="destinataire">
			<i class="far fa-address-book" title="Destinataire"></i>
			<?php 
				$tabDest = getChamp("nom","utilisateurs");
				mkSelect("Destinataire","selectDest",$tabDest);
			?>
		</div>
		<div id="chat-content"></div>
		<div>	
			<input type="text" id="message" placeholder="Écrivez un message" onkeypress="if(event.keyCode == 13)afficherMessage()"/>
			<i class="far fa-paper-plane" title="Envoyer" onclick="afficherMessage()"></i>
			<img src="images/gif_salut.gif" alt="Salut!" id="gif" onclick="gifOuNon()"/>
		</div>	
	</div>	

	<script>
		var message = document.getElementById('message');
		var chatContent = document.getElementById('chat-content');
		var left = 1;
		var positionG = 1;

		function gifOuNon(){
			if(positionG == 1){ 
				chatContent.innerHTML+="<img src='images/gif_salut.gif' alt='Salut!' id='gif' onclick='gifOuNon()' style='float:left'/><br />";
				positionG = 0;
			}
			else{
				chatContent.innerHTML+="<img src='images/gif_salut.gif' alt='Salut!' id='gif' onclick='gifOuNon()' style='float:right'/><br />";
				positionG = 1;
			}
		}

		function afficherMessage(){
			if(left == 1){
				if(message.value !== ''){
					chatContent.innerHTML+="<span style='float:left'>> "+message.value+"</span><br />";
					message.value='';
					left = 0;
				}
				else{
					message.placeholder="Aucun message n'a été écrit";
				}
			}
			else{
				if(message.value !== ''){
					chatContent.innerHTML+="<span style='float:right'>"+message.value+" <</span><br />";
					message.value='';
					left = 1;
				}
				else{
					message.placeholder="Aucun message n'a été écrit";
				}
			}
		}

	</script>


	<?php
		$jeux = Array("0","1","2","3","4","5","6","7");
		$gagnant = Array("Joueur.se°1","Joueur.se°2");
		$i=0;
		$options="";

		for($i=0; $i<count($jeux); $i++) $options.="<option>$jeux[$i]</option>";
		
		mkDiv("resultats");
			mkH(4,"Score du match:");
			mkTable(); 
				mkTr("entetes");
					mkTh("");
					mkTh("1er set","main orange");
					mkTh("2ème set","main orange");
				endTr();
				mkTr();
					mkTd("petit orange","joueur1","Joueur1");
					mkTd("main white","","<select>$jeux</select>");
					mkTd("main white","","<select>$jeux</select>");
				endTr();
				mkTr();
					mkTd("petit orange","joueur2","Joueur2");
					mkTd("main white","","<select>$jeux</select>");
					mkTd("main white","","<select>$jeux</select>");
				endTr();
			endTable();
		endDiv();
	?>

</body>
</html>