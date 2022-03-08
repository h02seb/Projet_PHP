<!--THIS FILE DISPLAYS INTERNSHIPS OFFERS -->

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

    <!-- LOAD PHP PAGINATION FILE -->
    <?php include_once 'pagination.php'; ?>
    <title>Carto-stages IDéaL</title>
    </head>


    <body>
<!------------------------- NAVIGATION BAR ------------------------>
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
                <li class="nav-item active">
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

<!------------------------------- BACKGROUND IMAGE ------------------------->  
        <header class="jumbotron">
            <div class="container">
                <div class="row row-header">
                    <div class="col-sm">
                        <div class="card">
                            <h4 class="card-header text-white">
                            Stages
                            </h4>
                        </div>
                    </div>  

                    <div class="col-12 col-sm-12  align-self-center">
                        <a href="./map.html"> <img src = "img/map.png" class = "img-responsive" width = "100%"></a>
                    </div>                    
                </div>
            </div>
        </header>
    
<!---------------------------------- SEARCH BOX ---------------------------->
    <div class="container">
            <div class="row row-content align-items-center">
                <div class="col-sm-12 ">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" id = "searchbox" placeholder="Chercher" aria-label="Chercher"aria-describedby="search-addon"/>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Date
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" id = "thisweek">Cette semaine</a>
                                <a class="dropdown-item" href="#" id = "thismonth">Ce mois</a>
                                <a class="dropdown-item" href="#" id = "thisyear">Cette année</a>
                            </div>
                        </div>                     
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fa fa-search"></i>
                        </span>                        
                    </div>
                </div>   
            </div>
<!-------------------------------- COLLAPSIBLE LISTE LN -------------------------------->
            <div class="row row-content align-items-center">
                <div class="col col-sm col-md" id ="collapsible">
                        <?php
                            //echo data from internship database in form of collapsible cards
                            $i = 0; 
                            foreach($result as $data) { 
                                echo "<div class='card' id = lntab>";
                                            echo "<div class='card-header'>"; 
                                                    echo "<h4>";
                                                    echo "<a href='#" .$i. "'class = 'text-dark' data-toggle='collapse'>".$data['organisation']. ", " .$data['ville']."</a>";
                                                    echo "</h4>";
                                            echo "</div>";

                                            echo "<div id='".$i. "'class='collapse show'>";
                                                echo "<div class='card-body'>";
                                                    echo "<dl class='row'>";
                                                    echo "<dt class='col-sm-3' id = 'lndate'> <h5>".$data['date']."</h5></dt>";
                                                    echo "<dd class='col-sm-9'>".$data['sujet']."</dd>";
                                                    echo "</dl>";
                                                echo "</div>";
                                            echo "</div>";
                                echo "</div>";                                
                            $i++;  
                            }                       
                        ?>
                </div>

                <!-- FULL LIST OF DATES FROM INTERNSHIP DATABASE -->
                <div class ="dates" style="display: none;"> 
                    <?php
                        foreach((array)$dates as $date) { 
                        echo "<div id = date>" .$date['date']."</div>";
                        }                       
                    ?>
                </div>
            </div>

<!------------------------ RESULTS OF DYNAMIC SEARCH ------------------------>
            <div class="row row-content align-items-center">
                <div class="col-sm-12">
                    <div id="output"></div>
                </div>
            </div>
<!------------------------------- PAGINATION ---------------------------------->
            <div class="pagination row row-content align-items-center">
                <div class="col col-sm col-md">
                    <nav class = "pagenav" aria-label="Page navigation">
                        <ul class="pagination justify-content-center id = 'pagelinks'>">
                        <?php
                            //show only 15 page links, place current page link in the center
                            if ($paginations >= 0 && $page_counter <= $paginations) {
                                $a = min($page_counter -1, 7);
                                $b = min($paginations - $page_counter, max(7, 14-$a));
                                $a = max($a, 14-$b);
                            //show previous page icon    
                                if ($page_counter > 0){
                                    echo "<li class='page-item'>
                                        <a class='page-link' href=?start=$previous aria-label='Previous'> 
                                            <span aria-hidden='true'> &laquo;</span>
                                            <span class='sr-only'> Previous </span>
                                        </a>
                                    </li>"; 
                                }
                            //show page links, highlight current page
                                for($j = $page_counter-$a; $j <= $page_counter+$b;$j++) {
                                    
                                    if($j == $page_counter) {
                                        echo "<li class='page-item active'><a class='page-link' href=?start=$j>".$j."</a></li>";
                                    }
                                    else {
                                        echo "<li class='page-item'><a class='page-link' href=?start=$j>".$j." </a></li>";
                                    }
                                }

                            //show next page icon
                                if ($paginations - $page_counter > 0){
                                    echo "<li class='page-item'>
                                            <a class='page-link' href=?start=$next aria-label='Next'>
                                                <span aria-hidden='true'>&raquo;</span>
                                                <span class='sr-only'>Next</span>
                                            </a>
                                        </li>";
                                }
                            }

                        ?>
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
<!------------------------------- FOOTER ---------------------------->
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
<!----------- jQUERY FIRST, THEN POPPER.JS, THEN BOOTSTRAP JS, THEN MOMENT.JS ---------->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="jquery/umd/popper.min.js"></script>
        <script src="jquery/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

        <script type="text/javascript">
        
/*************************** DYNAMIC SEARCH **************************/
            //get the value of searchbox 
            $('#search-addon').on("click",function() {
                $('#collapsible').hide();
                var value = $("#searchbox").val().toLowerCase();
            //send this value via ajax request to search.php    
                if (value != "") {
                    $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {value:value},
            //get corresponding internships from search.php and place it in #output div 
                    success: function(data){
                        $('#output').html(data);
                        
                    }
                });
            } 
                else {
                    $('#output').css('display', 'none');
            }
        });

/******************************* FILTER BY DATE **************************/

            //filter by this week   
            $('#thisweek').on('click', function() {
                        $('#collapsible').hide();
            //get the value of date list
                        $('div#date').each(function() {
                            var value = $("#searchbox").val().toLowerCase();
                            var lndate = $(this).text();
                            var lnmoment  = moment(lndate, 'YYYY-MM-DD');
                            var now = moment();
            //compare dates with current week, if week is the same send ajax request to timesearch.php
                            if ( (lnmoment).isSame(now, 'week') ) {
                                if (value != "") {
                                    $.ajax({
                                        url: 'timesearch.php',
                                        method: 'POST',
                                        data: {lndate:lndate, value:value},
                                        success: function(data){
                                            $('#output').html(data);
                                            $('#output').css('display', 'block');                                
                                        }
                                    });
                                }
                                else {
                                    $.ajax({
                                        url: 'timesearch.php',
                                        method: 'POST',
                                        data: {lndate:lndate},
                                        success: function(data){
                                            $('#output').html(data);
                                            $('#output').css('display', 'block');                                
                                        }
                                    });
                                }
                            } 
                            else {
                                $('#output').css('display', 'none');
                            }
                        }); 
            });

            //filter by this month
            $('#thismonth').on('click', function() {
                    $('#collapsible').hide();
            //get the value of date list
                    $('div#date').each(function() {
                        var value = $("#searchbox").val().toLowerCase();
                        var lndate = $(this).text();
                        var lnmoment  = moment(lndate, 'YYYY-MM-DD');
                        var now = moment();
            //compare dates with current month, if month is the same send ajax request to timesearch.php
                        if ( (lnmoment).isSame(now, 'month') ) {
                                if (value != "") {
                                    $.ajax({
                                        url: 'timesearch.php',
                                        method: 'POST',
                                        data: {lndate:lndate, value:value},
                                        success: function(data){
                                            $('#output').html(data);
                                            $('#output').css('display', 'block');                                
                                        }
                                    });
                                }
                                else {
                                    $.ajax({
                                        url: 'timesearch.php',
                                        method: 'POST',
                                        data: {lndate:lndate},
                                        success: function(data){
                                            $('#output').html(data);
                                            $('#output').css('display', 'block');                                
                                        }
                                    });
                                }
                        } 
                        else {
                            $('#output').css('display', 'none');
                        }
                    }); 
                });
            

            //filter by this year
            $('#thisyear').on('click', function() {
                $('#collapsible').hide();
            //get the value of date list
                $('div#date').each(function() {
                    var value = $("#searchbox").val().toLowerCase();
                    var lndate = $(this).text();
                    var lnmoment  = moment(lndate, 'YYYY-MM-DD');
                    var now = moment();                
            //compare dates with current year, if year is the same send ajax request to timesearch.php
                    if ( (lnmoment).isSame(now, 'year') ) {
                        if (value != "") {
                                $.ajax({
                                url: 'timesearch.php',
                                method: 'POST',
                                data: {lndate:lndate, value:value},
                                success: function(data){
                                    $('#output').html(data);
                                    $('#output').css('display', 'block');                                
                                }
                            });
                        }
                        else {
                            $.ajax({
                                url: 'timesearch.php',
                                method: 'POST',
                                data: {lndate:lndate},
                                success: function(data){
                                    $('#output').html(data);
                                    $('#output').css('display', 'block');                                
                                }
                            });
                        }
                    } 
                    else {
                        $('#output').css('display', 'none');
                    }
                }); 
            });

        </script>
    </body>
</html>
