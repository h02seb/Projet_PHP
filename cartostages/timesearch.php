<!--THIS SCRIPT GETS AJAX REQUESTS FROM stages.php AND SENDS FILTERED INFO BACK IN FORM OF CARDS-->

<?php
  require_once "connexion.php";
  
  //if only a date is sent via ajax, search only for date in "mytable" 
  if ( isset($_POST['lndate']) &&  !isset($_POST['value'])  ) {
    $query = "SELECT * FROM mytable WHERE date LIKE '{$_POST['lndate']}'";
    $result = $bdd->prepare($query);
    $result->execute();

      //if results exist, echo them in form of card  
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
      } 
      else {
        echo "<p> </p>";
      }
  }

  //if a date is sent with user input, search for date in "date" column ans corresponding input in other columns
  else if (  isset($_POST['lndate'])  &&  isset($_POST['value']) ) {
    $query = "SELECT * FROM mytable WHERE date LIKE '{$_POST['lndate']}' AND 
    ( organisation = '{$_POST['value']}' OR ville = '{$_POST['value']}' OR sujet = '{$_POST['value']}' )";
    $result = $bdd->prepare($query);
    $result->execute();
  //if results exist, echo them in form of card  
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
      } 
      else {
        echo "<p> </p>";
      }
}
?>