<?php

	$bdd = new PDO('mysql:host=localhost;dbname=ideal', 'ideal', 'IdealIdl');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs
	
	if(isset($_POST['formpublier'])) {
	   $nom = htmlspecialchars($_POST['nom']);
	   $mail = htmlspecialchars($_POST['mail']);
	   $date = date("Y-m-d",strtotime($_POST['date']));
	   $organisation = htmlspecialchars($_POST['organisation']);
	   $ville = htmlspecialchars($_POST['ville']);
	   $sujet = htmlspecialchars($_POST['sujet']);
	   if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['date']) AND !empty($_POST['organisation']) AND !empty($_POST['ville']) AND !empty($_POST['sujet'])) {
			$reqsujet = $bdd->prepare("SELECT * FROM publication WHERE sujet = ?");
			$reqsujet->execute(array($sujet));
			$sujetexist = $reqsujet->rowCount();
			if ($sujetexist == 0) {
				$insertmbr = $bdd->prepare("INSERT INTO publication(nom, mail, date, organisation, ville, sujet) VALUES(?, ?, ?, ?, ?, ?)");
				$insertmbr->execute(array($nom, $mail, $date, $organisation, $ville, $sujet));
				header("Location:./index.php");
				exit();
			} else {
				$erreur = "Le sujet de stage est déjà enregistré !";
			}
		} else {
		   $erreur = "Tous les champs doivent être complétés !";
	   }
	}
?>

<html>
	   <head>
	      <title>Publication</title>
		     <!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta http-equiv="x-ua-compatible" content="ie=edge">

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap-social.css">
			<link rel="stylesheet" href="css/styles.css">
	   </head>
<body>
<!------------------------------ NAVIGATION BAR -------------------------->
        <nav class="navbar navbar-light navbar-expand-sm fixed-top">
            <a class="navbar-brand mr-auto" href="./index.php"><img src="img/logo.png" height="120" width="120"></a>
        </nav>  
	<!----------------------register----------------------------------------->	
	<br></br><br></br>
	<div class="container">
		<div class="row row-content align-items-center">
			<div class = "form-group col-12 col-sm-12">
				<form class = "box rounded" method="POST" action="">
					<h4 align="center" class="box-title">Vous recrutez dans le Traitement Automatique des Langues et vous êtes à la recherche des stagiaires en TAL ?</h4> <br></br>
					<h5 align="center" class="box-title">Publier votre offre de stage en complétant le formulaire ci-dessous !</h5><br></br>
						<table>
							<tr>
								<td align="left">
									<label for="nom">Prénom & NOM </label>
								</td>
								<td>
									<input type="text" class="box-input" placeholder="Prénom & Nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" required />
								</td>
							</tr>
							<tr>
								<td align="left">
									<label for="mail">Mail </label>
								</td>
								<td>
									<input type="mail" class="box-input" placeholder="Mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" required />
								</td>
							</tr>
							<tr>
								<td align="left">
									<label for="date">Date du début de stage </label>
								</td>
								<td>
									<input type="date" class="box-input" placeholder="Date" id="date" name="date" value="<?php if(isset($date)) { echo $date; } ?>" required />
								</td>
							</tr>
							<tr>
								<td align="left">
									<label for="organisation">Organisation </label>
								</td>
								<td>
									<input type="organisation" class="box-input" placeholder="Organisation" id="organisation" name="organisation" value="<?php if(isset($organisation)) { echo $organisation; } ?>" required />
								</td>
							</tr>
							<tr>
								<td align="left">
									<label for="ville">Lieu du stage </label>
								</td>
								<td>
									<input type="ville" class="box-input" placeholder="Lieu" id="ville" name="ville" value="<?php if(isset($ville)) { echo $ville; } ?>" required />
								</td>
							</tr>

							<tr>
								<td align="left">
									<label for="sujet">Sujet du stage </label>
								</td>
								<td>
									<textarea rows="9" cols="34" class="box-input1" placeholder="Veuillez spécifier ci-dessous le sujet du stage, la durée, ainsi que le dossier de candidature et les contacts : " id="sujet" name="sujet" value=" <?php if(isset($sujet)) { echo $sujet; } ?>" required /></textarea>
							</tr>
						</table>
						<br></br>
					<input type="submit" name="formpublier" value="Envoyer" class ="box-button"/>
				</form>
				<?php
				 if(isset($erreur)) {
					echo '<font color="red">'.$erreur."</font>";
				 }
				?>
			</div>
		</div>
	</div>

</body>
</html>	