<!--THIS SCRIPT GETS AJAX REQUESTS FROM stages.php AND SENDS FILTERED INFO BACK IN FORM OF CARDS-->


<?php
  require_once "connexion.php";

  //if user input is sent via ajax, search for it in mytable
  if (isset($_POST['value'])) {
    
    $query = "SELECT * FROM mytable WHERE 
    ville LIKE '{$_POST['value']}%' 
    OR organisation LIKE '{$_POST['value']}%'
    OR sujet LIKE '{$_POST['value']}%'
    OR date LIKE '{$_POST['value']}%'
    LIMIT 100";
    $result = $bdd->prepare($query);
    $result->execute();
 
  if ($result->rowCount() > 0){
    $i = 0; 
    foreach($result as $info) {      
      echo "<div class='card' id = searchtab>";
          echo "<div class='card-header'>"; 
            echo "<h4>";
                  echo "<a href='#" .$i. "'class = 'text-dark' data-toggle='collapse'>".$info['organisation']. ", " .$info['ville']."</a>";
            echo "</h4>";
          echo "</div>";

          echo "<div id='".$i. "'class='collapse show'>";
              echo "<div class='card-body'>";
                echo "<dl class='row'>";
                  echo "<dt class='col-sm-3' id = 'lndate'> <h5>".$info['date']."</h5></dt>";
                  echo "<dd class='col-sm-9'>".$info['sujet']."</dd>";
                echo "</dl>";
              echo "</div>";
          echo "</div>";
      echo "</div>";                              
    $i++;  
    }         
  } else {
    echo "<p style='color:red'>Pas de résultats...</p>";
  }
 
}
?>