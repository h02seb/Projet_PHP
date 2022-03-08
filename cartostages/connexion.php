<!-- PDO CONNECTION FILE -->

<?php
try { 
$bdd=new PDO('mysql:host=localhost;dbname=ideal','ideal','IdealIdl');
}
catch (Exception $e) {
die('Erreur : '.$e->getMessage());
print "Accès impossible à la base !<br/>\n";
}
?>
