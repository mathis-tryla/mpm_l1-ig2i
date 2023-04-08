<?php
	include_once("librairies/balises.php");
	include_once("librairies/maLibSQL.pdo.php");
  include_once("librairies/utiles.php");
	session_start();
	/*$sCode = $_SESSION['code'];
	$sMdp = $_SESSION['mdp'];*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Utilisateurs</title>
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

    #tableauInfos{
      margin-top: 5%;
      background-color: white;
      border: 3px dodgerblue solid;
      border-radius: 20px;
      width: 70%;
      margin-left: auto;
      margin-right: auto;
      padding: 1%;
    }

    th,td{
      text-align: center;
    }

    th{
      border: 2px solid black;
      width: 10%;
    }

    td{
      border: 1px dashed black;
      padding: 1%;
    }

    select{
      max-width: 80%;
    }

  </style>
</head>
<body>

<a href="connexion.php" id="lien_deco"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<span id="deconnexion">Déconnexion</span></a>

  <br />

  <h1>Utilisateurs</h1>
  <hr>

  <?php
    $tabNom = getChamp("nom","utilisateurs","WHERE numCarte!='1000'");
    $tabPrenom = getChamp("prenom","utilisateurs","WHERE numCarte!='1000'");
    $tabNumCarte = getChamp("numCarte","admin","WHERE numCarte!='1000'");
    $tabMdp = getChamp("mdp","admin","WHERE numCarte!='1000'");
    $tabAdmin = getChamp("administrateur","admin","WHERE numCarte!='1000'");
    $tabBk = getChamp("blacklisté","admin","WHERE numCarte!='1000'");
    $actions = array('','Administrateur','Blacklisté');


    echo "<div id='tableauInfos' align='center'>";
      mkTable("tableau");
        mkTr("entetes");
          mkTh("Nom");
          mkTh("Prénom");
          mkTh("Numéro de carte");
          mkTh("Mot de passe");
          mkTh("Administrateur");
          mkTh("Blacklisté");
          mkTh("Action");
        endTr();
        
        $i=0;
        for($i=0; $i<3; $i++){
          mkTr();
            mkTd("","",$tabNom[$i]);
            mkTd("","",$tabPrenom[$i]);
            mkTd("","",$tabNumCarte[$i]);
            mkTd("","",$tabMdp[$i]);
            mkTd("","",isAdmin($tabAdmin,$i));
            mkTd("","",isBl($tabBk,$i));
            mkTd("action","","<select name='select$i' id='select_$i'><option>$actions[0]</option><option>$actions[1]</option><option>$actions[2]</option></select>");
          endTr();
        }
        
      endTable();
			mkBr(1);
			mkInput("button","bouton","Appliquer les modifications","","boutonModif","rendreAdmin()");
    endDiv();


							if(isset($_GET['select0'])){
								$choix0 = $_GET['select0'];
								if($choix0=="Administrateur"){
									$SQL = "UPDATE admin SET administrateur=1 WHERE numCarte='0008'";
									SQLUpdate($SQL);
								}
								if($choix0=="Blacklisté"){
									$SQL = "UPDATE admin SET blacklisté=1 WHERE numCarte='0008'";
									SQLUpdate($SQL);
								}
							}

							if(isset($_GET['select1'])){
								$choix1 = $_GET['select1'];
								echo $choix1;
								if($choix1=="Administrateur"){
									$SQL = "UPDATE admin SET administrateur=1 WHERE numCarte='0057'";
									SQLUpdate($SQL);
								}
								if($choix1=="Blacklisté"){
									$SQL = "UPDATE admin SET blacklisté=1 WHERE numCarte='0057'";
									SQLUpdate($SQL);
								}
								echo "<script>
												function rendreAdmin(){
													alert(".'$choix1'.");
												}
											</script>";
							}

							if(isset($_GET['select2'])){
								$choix2 = $_GET['select2'];
								if($choix2=="Administrateur"){
									$SQL = "UPDATE admin SET administrateur=1 WHERE numCarte='1000'";
									SQLUpdate($SQL);
								}
								if($choix2=="Blacklisté"){
									$SQL = "UPDATE admin SET blacklisté=1 WHERE numCarte='1000'";
									SQLUpdate($SQL);
								}
							}

  ?>

</body>
</html>
