<!-- THIS FILE DISPLAYS ARCHIVED INTERNSHIPS -->

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

    <!-- LOAD PHP CONNECTION FILE -->
    <?php include_once 'connexion.php';?>
    <title>Carto-stages IDéaL</title>
    </head>


    <body>
<!---------------------------- NAVIGATION BAR ------------------------>
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
                        <a class="nav-link" href="./form.php">
                        <span class="fa fa-address-card fa-lg"></span> PUBLIER
                        </a>
                    </li>
                </ul>
<!------------------------------ INSCRIPTION -------------------------------->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="myBtn">
                        <span class="fa fa-user fa-lg"></span> S'INSCRIRE  |
                        </a>			
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                        <span class="fa fa-sign-out fa-lg"></span> SE CONNECTER
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

<!---------------------------- BACKGROUND IMAGE --------------------------->  
        <header class="jumbotron">
            <div class="container">
                <div class="row row-header">
                    <div class="col-sm">
                        <div class="card">
                            <h4 class="card-header text-white">
                                Archive
                            </h4>
                        </div>
                    </div>  

                    <div class="col-12 col-sm-12  align-self-center">
                        <a href="./map.html"> <img src = "img/map.png" class = "img-responsive" width = "100%"></a>
                    </div>                    
                </div>
            </div>
        </header>

<!------------------------------- SEARCH BOX -------------------------------->
        <div class="container">
            <div class="row row-content align-items-center">
                <div class="col-sm-12 ">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" id = "searchbox" placeholder="Chercher" aria-label="Chercher"
                          aria-describedby="search-addon"/>

                        <span class="input-group-text border-0" id="search-addon">
                          <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>   
            </div>

<!------------------------------- ARCHIVE FORM -------------------------------->
            <div class="row row-content align-items-center">
                <div class="col col-sm col-md">
                    <div class="media-body">
                        <div id = "archiveform">
                            <?php
                            $request = "SELECT * FROM `archive`";
                            if ($response = $bdd->query($request)) {
                                echo "<table class='table' id = 'archivetab>'";
                                echo "<thead>";
                                echo  "<tr>";
                                echo  "<th scope='col'>ANNÉE</th>";
                                echo  "<th scope='col'>SUJET</th>";
                                echo  "<th scope='col'>AUTEUR</th>";
                                echo  "<th scope='col'>ORGANISME</th>";
                                echo  "</tr>";
                                echo  "</thead>";
                                while($info=$response->fetch()) {
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>" . $info['year'] . "</td>";
                                    echo "<td> <a href  = " .$info['link']. ">" .$info['sujet'].  "</a> </td>";
                                    echo "<td>" . $info['author'] . "</td>";
                                    echo "<td>" . $info['organisme'] . "</td>";
                                    echo "</tr>";
                                    echo "</tbody>";

                                }
                                echo "</table>";
                            } else {
                                print "Erreur" ;
                            }
                            ?>
                       </div>
                    </div>
                </div>
            </div>
        </div>

<!----------------------------- FOOTER -------------------------->
    <footer class="footer">
            <div class="container">
                    <div class="row row-footer justify-content-center">
                        <div class="col-4 col-sm-2">
                            <ul class="list-unstyled">
                                <li><a class ="text-dark" href="./index.php">Accueil</a></li>
                                <li><a class ="text-dark" href="./stages.php">Stages</a></li>
                                <li><a class ="text-dark" href="./archive.php">Archive</a></li>
                                <li><a class ="text-dark" href="./map.html">Carte</a></li>
                                <li><a class ="text-dark" href="./form.php">Publier</a></li>
                            </ul>
                        </div>
                    </div>

                <div class="row row-footer justify-content-center">
                    <div class="text-center p-3">
                        <p>Carto-stages IDéaL a été realisé dans le cadre d'un projet professionnel du Master IdL 2020-2021 </p>
                        <p>© 2021 Hesna SEBIANE & Alena SILVANOVICH</p>
                    </div>
                </div>
            </div>
    </footer>
<!----------- jQUERY FIRST, THEN POPPER.JS, THEN BOOTSTRAP JS ---------->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>


        <script>
/*************************** STATIC SEARCH **************************/
        $('#search-addon').on("click",function() {
            var value = $("#searchbox").val().toLowerCase();
            $("#archiveform tr").filter(function() {
                var skip = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(skip);
            });
        });
        </script>
    </body>
</html>
