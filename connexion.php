<?php
	include_once("librairies/balises.php");
	include_once("librairies/maLibSQL.pdo.php");
	include_once("librairies/utiles.php");
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<link rel="icon" type="text/css" href="images/icon_raquettes.jpg">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<style>
		html{
			background-image: url('images/connexion.jpg');
			background-repeat: no-repeat;
			background-size: 100%;
			font-family: 'Quicksand', sans-serif;
		}

		img{
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: 3%;
			width: 10%;
		}

		form{
			border: 3px white solid;
			border-radius: 5%;
			background-color: rgb(255,255,0);
			padding-top: 0.5%;
			padding-bottom: 1%;
			margin-top: 10%;
			margin-left: auto;
			margin-right: auto;
			width: 25%;
			text-align: center;
		}

		input[type="submit"]{
			border: 0;
			border: 2px solid purple;
			border-radius: 20px;
			text-align: center;
			font-family: 'Quicksand', sans-serif;
			width: 35%;
			padding: 3% 4%;
			color: black;
			font-weight: bold;
			background: none;
			cursor: pointer;
			transition: 0.75s;
		}

		input[type="submit"]:hover{
			border: 0;
			border: 2px solid purple;
			border-radius: 20px;
			font-family: 'Quicksand', sans-serif;
			width: 35%;
			padding: 3% 4%;
			color: black;
			font-weight: bold;
			background-color: purple;
			cursor: pointer;
		}

		input[type="text"],input[type="password"]{
			border: 0;
			background: none;
			text-align: center;
			border: 2px solid dodgerblue;
			padding: 3% 4%;
			width: 35%;
			color: black;
			font-weight: bold;
			border-radius: 20px;
			font-family: 'Quicksand', sans-serif;
			transition: 0.25s;
		}

		input[type="text"]:focus,input[type="password"]:focus{
			width: 45%;
			border-color: purple;
		}
	</style>
</head>
<body>

	<?php
		mkImg("images/logo-fft.png","logoFft");
		mkForm("connexion.php","GET");
			echo "<h1><u>Connexion:</u></h1>";
			echo "<div>";
			mkInput('text','code','','N° de carte','Code');mkBr(2);
			mkInput('password','mdp','','Mot de passe','MotDePasse');
			echo "</div>";mkBr(1);mkInput('submit','','Se connecter');

			$tab_num=getChamp("numCarte","utilisateurs");
			$tab_pwd=getChamp("mdp","admin");
			$tab_adm=getChamp("administrateur","admin");
			$tab_bl=getChamp("blacklisté","admin");

			$i=0;

			for($i=0;$i<count($tab_num);$i++){
				if(isset($_GET["code"]) && isset($_GET["mdp"])){
					$code=$_GET["code"];
					$mdp=$_GET["mdp"];

					if($tab_num[$i] == $code && $tab_pwd[$i] == $mdp){
						if(isAdmin($tab_adm,$i)=="Oui"){
							header("Location: admin.php?code=\"$code\"&mdp=\"$mdp\"");
							$_SESSION['code']=$code;
							$_SESSION['mdp']=$mdp;
							setcookie("code",$code,time()+3600*24*90);
							setcookie("mdp",$mdp,time()+3600*24*90);
						}
						else{
							if(isBl($tab_bl,$i)=="Oui"){
								header("Location: blackliste.php?code=\"$code\"&mdp=\"$mdp\"");
								$_SESSION['code']=$code;
								$_SESSION['mdp']=$mdp;
								setcookie("code",$code,time()+3600*24*90);
								setcookie("mdp",$mdp,time()+3600*24*90);
							}
							else{
								header("Location: accueil.php?code=\"$code\"&mdp=\"$mdp\"");
								$_SESSION['code']=$code;
								$_SESSION['mdp']=$mdp;
								setcookie("code",$code,time()+3600*24*90);
								setcookie("mdp",$mdp,time()+3600*24*90);
							}
						}
					}
				}
			}
		endForm();
	?>
</body>
</html>
