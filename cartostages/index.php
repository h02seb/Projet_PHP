<!------------Inscription------------------------------->
<?php include 'inscription.php';?>
<!----------------- se connecter ----------------------->
<?php include 'seconnecter.php';?>

<!-- THIS FILE IS A STARTING PAGE WITH GENERAL INFORMATION -->

<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- BOOTSTRAP AND CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
	<link rel = "icon" href = "img/icon.png" type = "image/x-icon"> 
    <title>Carto-stages IDéaL</title>
    </head>


    <body>
<!------------------------------ NAVIGATION BAR -------------------------->
        <nav class="navbar navbar-light navbar-expand-sm fixed-top">
            <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="./index.php"><img src="img/logo.png" height="120" width="120"></a>
            <div class="collapse navbar-collapse" id="Navbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">
                    <span class="fa fa-home fa-lg"></span> ACCUEIL
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./stages.php">
                    <span class="fa fa-folder fa-lg"></span> STAGES
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./archive.php">
                    <span class="fa fa-info fa-lg"></span> ARCHIVE
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./map.html">
                    <span class= "fa fa-map fa-lg"></span> CARTE
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if (isset($_SESSION['access'])){echo 'href="./form.php"';}else{echo 'id="myBtn2"';}?>>  
                    <span class="fa fa-address-card fa-lg" ></span> PUBLIER
                    </a>
                </li>
				<li class="nav-item"  <?php if (!isset($_SESSION['access']) or $_SESSION['access']==1){echo 'style="display: none;"';}?>>
					<a class="nav-link" href="./newprop.php">
						<span class="fa fa-address-card fa-lg"></span> PROPOSITIONS 
					</a>
				</li>
            </ul>

<!------------------------------ INSCRIPTION -------------------------------->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" <?php if (isset($_SESSION['access'])){echo 'style="display: none;"';}?>>
                    <a class="nav-link" id="myBtn">
                    <span class="fa fa-user fa-lg"></span> S'INSCRIRE  |
                    </a>			
                </li>
                <li class="nav-item" <?php if (isset($_SESSION['access'])){echo 'style="display: none;"';}?>>
                    <a class="nav-link" id="myBtn1">
                    <span class="fa fa-sign-out fa-lg"></span> SE CONNECTER  | 
                    </a>
                </li>
				<li class="nav-item" <?php if (!isset($_SESSION['access'])){echo 'style="display: none;"';}?>>
					<a class="nav-link" href="deconnexion.php">
                    <span class="fa fa-sign-out fa-lg" ></span> SE DECONNECTER 
                    </a>
                </li>
            </ul>
            </div>
            </div>
        </nav>
		
		<!-----------------------------------------INSCRIPTION-------------------------------------->
		<div id="myModal" class="modal">
			<div align="center" class="modal-content">
			 <form class = "box" method="POST" action="">
			 <h3>S'inscrire</h3>
			 <span class="close">&times;</span>
				<table>
				   <tr>
					  <td align="right">
						 <label for="pseudo"></label>
					  </td>
					  <td>
						 <input type="text" class="box-input" placeholder="Votre nom d'utilisateur" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required />
					  </td>
				   </tr>
				   <tr>
					  <td align="right">
						 <label for="mail"></label>
					  </td>
					  <td>
						 <input type="email" class="box-input" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" required />
					  </td>
				   </tr>
				   <tr>
					  <td align="right">
						 <label for="mail2"></label>
					  </td>
					  <td>
						 <input type="email" class="box-input" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" required />
					  </td>
				   </tr>
				   <tr>
					  <td align="right">
						 <label for="mdp"></label>
					  </td>
					  <td>
						 <input type="password" class="box-input" placeholder="Votre mot de passe" id="mdp" name="mdp" required />
					  </td>
				   </tr>
				   <tr>
					  <td align="right">
						 <label for="mdp2"></label>
					  </td>
					  <td>
						 <input type="password" class="box-input" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2" required />
					  </td>
				   </tr>
				   <tr>
					  <td></td>
					  <td align="center">
						 <br />
						 <input type="submit" name="forminscription" value="Je m'inscris" class ="box-button"/>
					  </td>
				   </tr>
				</table>
			 </form>
			 <?php
			 if(isset($erreur)) {
				echo '<script>alert("'.$erreur.'")</script>'; 
			 }
			 ?>
			</div>
		</div>
		
		<!-------------------------------------------Se connecter ------------------------------------------------->
		<div id="myModal1" class="modal">
			<div align="center" class="modal-content">
				<form class="center" method="POST" action="">
				 <h2>Connexion</h2>
					<span class="close">&times;</span>
					 <table>
						<tr>
							<td align="right">
								<label for="email"></label>
							</td>
							<td>
								<input type="email" class="box-input" placeholder="Mail" name="mailconnect"  required />
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for="mdp"></label>
							</td>
							<td>
								<input type="password" class="box-input" placeholder="Mot de passe" name="mdpconnect"  required />
							</td>
						</tr>
						<tr>
						<td align="right">
							<label for="submit"></label>
						</td>
						<td align="right">
						 <input type="submit" name="formconnexion" value="Se connecter" class ="box-button" />
						</td>
						</tr>			
					</table>
				</form>
			</div>
		</div>
		<?php
			if(isset($erreur)) {
			echo '<font color="red">'.$erreur."</font>";
			}
		?>

<!---------------------------- BACKGROUND IMAGE ----------------------->  
        <header class="jumbotron">
            <div class="container">
                <div class="row row-header">
                    <div class="col-sm">
                        <div class="card">
                            <h5 class="card-header text-white text-justify">
							La plateforme « Carto-stages IDéaL » permet aux étudiants IdL/TAL d’identifier les recruteurs potentiels
                            pour leurs stages, prendre connaissance des informations relatives aux stages proposés et aux stages réalisés
                            par les anciennes promotions IdL/TAL, et pouvoir trouver des offres de stages dans le domaine du TAL.
                            Carto-stages IDéaL est une ressource alternative pour faciliter la recherche d'un stage dans le domaine du TAL
                            et s’appuie essentiellement sur deux sources, la liste LN et la base DUMAS.
                            </h5>
                        </div>
                    </div>  

                    <div class="col-12 col-sm-12  align-self-center">
                        <a href="./map.html"> <img src = "img/map.png" class = "img-responsive" width = "100%"></a>
                    </div>                    
                </div>
            </div>
        </header>


<!----------------------------- FOOTER -------------------------->
        <footer class="footer">
			
            <div class="container" >
				<div class="row row-footer justify-content-center">
                    <div class="text-center p-3">
                        <p> <h5> En cas de problème veuillez contacter admin@cartostages-ideal.fr </h5> </p>
                    </div>
                </div>

                <div class="row row-footer justify-content-center">
                    <div class="text-center p-3">
                        <p>Carto-stages IDéaL a été realisé dans le cadre d'un projet professionnel du Master IdL 2020-2021 </p>
                        <p>2021 Hesna SEBIANE & Alena SILVANOVICH</p>
                    </div>
                </div>
            </div>
        </footer>
        
<!----------- jQUERY FIRST, THEN POPPER.JS, THEN BOOTSTRAP JS ---------->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="jquery/umd/popper.min.js"></script>
        <script src="jquery/dist/js/bootstrap.min.js"></script>

        <script>

        </script>
    </body>
</html>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
<script>
// Get the modal
var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
  modal1.style.display = "block";
}
btn2.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}

</script>
