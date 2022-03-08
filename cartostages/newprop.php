<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/styles.css">
    <?php include_once("connexion.php");?>
    <title>Carto-stages IDéaL</title>
    </head>


    <body>
        <!-----------------------NAVIGATION BAR------------------------>
        <nav class="navbar navbar-light navbar-expand-sm fixed-top">
            <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="./index.php"><img src="img/logo.png" height="120" width="120"></a>
            <div class="collapse navbar-collapse" id="Navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">
                    <span class="fa fa-home fa-lg"></span> ACCUEIL
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="./stages.php">
                    <span class="fa fa-folder fa-lg"></span> STAGES
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./archive.html">
                    <span class="fa fa-info fa-lg"></span> ARCHIVE
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./map.html">
                    <span class= "fa fa-map fa-lg"></span> CARTE
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contactus.html">
                    <span class="fa fa-address-card fa-lg"></span> POSTULER
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span class="fa fa-user fa-lg"></span> S'INSCRIRE  |
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span class="fa fa-sign-out fa-lg"></span> SE CONNECTER
                    </a>
                </li>
            </ul>
            </div>
            </div>
        </nav>
    <!---------------------------- BACKGROUND IMAGE ----------------------->  
        <header class="jumbotron">
            <div class="container">
                <div class="row row-header">
                    <div class="col-sm">
                        <div class="card">
                            <h5 class="card-header text-white">
                                Nous publions ici des offres de stages récentes et anciennes pour les étudiants IDL.
                            </h5>
                        </div>
                    </div>  

                    <div class="col-12 col-sm-12  align-self-center">
                        <a href="./map.html"> <img src = "img/map.png" class = "img-responsive" width = "100%"></a>
                    </div>                    
                </div>
            </div>
        </header>

    <!------------------------------- SEARCH BOX -------------------------->
        <div class="container">
            <div class="row row-content align-items-center">
                <div class="col-sm-12 ">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" id = "searchbox" placeholder="Search" aria-label="Chercher"
                          aria-describedby="search-addon"/>

                        <!--span class="input-group-text border-0" id="search-addon">
                          <i class="fa fa-search"></i>
                        </span-->
                    </div>
                </div>   
            </div>

    <!------------------------------- Nouvelles propositions de stages ------------------------->
             <div class="row row-content align-items-center">
                <div class="col col-sm col-md">
                        <h2 class="mt-0">Propositions de stages </h2>
                            <?php
                            $requete = "SELECT * FROM `publication` ORDER BY `id` DESC";
                            if ($reponse = $bdd->query($requete)) {
                                $i = 0;                 
                                while($enr=$reponse->fetch()) {
                                    echo "<div class='card'>";
                                            echo "<div class='card-header'>"; 
                                                    echo "<h4>";
                                                    echo "<a href='#" .$i. "data-toggle='collapse'>".$enr['nom']."     |  ".$enr['organisation']. "     |  " .$enr['ville']."</a>";
                                                    echo "</h4>";
                                            echo "</div>";
                                        echo "<div id=".$i. "class='collapse show'>";
                                            echo "<div class='card-body' >";
                                                echo "<dl class='row'>";
                                                echo "<dt class='col-sm-3'> <h5>".$enr['date']."</h5></dt>";
                                                echo "<dd class='col-sm-9'>".$enr['sujet']."</dd>";
												echo '<form action="valider.php" method="post">';
												$liste=[$enr["id"],$enr["date"],$enr["organisation"],$enr["ville"],$enr["sujet"]];
												echo "<dd class='col-sm-1'> <button class='btnvalider' name='valider' value='".serialize($liste)."'>Valider</button></dd>";
												echo "</form>";
												echo '<form action="delete.php" method="post">';
												echo "<dd class='col-sm-2'> <button  class='btnsupprimer' name='supprimer' value='".$enr['id']."'>Supprimer</button></dd>";
												echo "</form>";
                                                echo "</dl>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                                $i++;                             
                            } else {
                                print "Error" ;
                            }
                            ?>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                    <div class="row row-footer justify-content-center">
                        <div class="col-4 col-sm-2">
                            <h5>Liens</h5>
                            <ul class="list-unstyled">
                                <li><a href="/index.hml">Accueil</a></li>
                                <li><a href="./archive.php">Archive</a></li>
                                <li><a href="./map.html">Carte</a></li>
                                <li><a href="./contactus.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                <div class="row row-footer justify-content-center">
                    <div class="col-auto">
                        <p>Site realisé dans le cadre du projet professionnel en master IDL </p>
                    </div>
                </div>
            </div>
        </footer>
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
        <script src="jquery/jquery-3.5.1.slim.min.js"></script>
        <script src="jquery/umd/popper.min.js"></script>
        <script src="jquery/dist/js/bootstrap.min.js"></script>
        <script>
        var $rows = $('#lnform dl');
            $('#searchbox').keyup(function() {
                var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                reg = RegExp(val, 'i'),
                text;

                $rows.show().filter(function() {
                text = $(this).text().replace(/\s+/g, ' ')
                return !reg.test(text);
                }).hide();
            });

            /*$( "#stagehead" ).click(function() {
                $("#stagebody").show();
            });

            $( ".card-header" ).on( "click", function() {
                $(".card-body").toggle();
            });*/
        </script>
    </body>
</html>
