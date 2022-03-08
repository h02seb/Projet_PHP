<!-- THIS SCRIPT RETURNS LIMITED NUMBER OF INTERNSHIPS PER PAGE -->


<?php 
    //include PDO connection file
    require_once 'connexion.php';

    //set variables to limit displayed results from database
    $start = 0;  
    $per_page = 10;
    $page_counter = 0;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;
    
    if(isset($_GET['start'])){
     $start = $_GET['start'];
     $page_counter =  $_GET['start'];
     $start = $start *  $per_page;
     $next = $page_counter + 1;
     $previous = $page_counter - 1;
    }

    //query to get results from internship database
    $q = "SELECT * FROM mytable ORDER BY date DESC LIMIT $start, $per_page";
    $query = $bdd->prepare($q);
    $query->execute();

    if($query->rowCount() > 0){
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //count total number of rows in internship database
    $count_query = "SELECT * FROM mytable";
    $query = $bdd->prepare($count_query);
    $query->execute();
    $count = $query->rowCount();
    
    // calculate the pagination number by dividing total number of rows by per page
    $paginations = ceil($count / $per_page);

    //get the list of dates 
    $sql = "SELECT date FROM mytable";
    $query = $bdd->prepare($sql);
    $query->execute();
    if($query->rowCount() > 0){
        $dates = $query->fetchAll(PDO::FETCH_ASSOC);
    }

?>