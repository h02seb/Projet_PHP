<?php
	session_start();
	
	$bdd = new PDO('mysql:host=localhost;dbname=ideal', 'ideal', 'IdealIdl');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	if(isset($_POST['formconnexion'])) {
	   $mailconnect = htmlspecialchars($_POST['mailconnect']);
	   $mdpconnect = sha1($_POST['mdpconnect']);
	   if(!empty($mailconnect) AND !empty($mdpconnect)) {
		  $requser = $bdd->prepare("SELECT * FROM inscription WHERE mail = ? AND mdp = ?");
		  $requser->execute(array($mailconnect, $mdpconnect));
		  $userexist = $requser->rowCount();
		  if($userexist == 1) {
			 $userinfo = $requser->fetch();
			 $_SESSION['id'] = $userinfo['id'];
			 $_SESSION['pseudo'] = $userinfo['pseudo'];
			 $_SESSION['mail'] = $userinfo['mail'];
			 $_SESSION['access'] = $userinfo['access'];
			 if ($_SESSION['access'] == 2) {
				 $access= True;
			 }
			 header("Refresh:0");

		  } else {
			 $erreur = "Mauvais mail ou mot de passe !";
		  }
	   } else {
		  $erreur = "Tous les champs doivent être complétés !";
	   }

	}
?>


