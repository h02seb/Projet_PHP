<?php

include "connexion.php"; // Using database connection file here
 


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['valider']))
{
	$a=unserialize($_POST['valider']);
	$id=$a[0];
	$rest=array_slice($a, 1);	
	$insertbdd = $bdd->prepare("INSERT INTO mytable(date, organisation, ville, sujet) VALUES(?, ?, ?,?)"); // enregistre la proposition dans la table mytable 
	$insertbdd->execute($rest);
	$sql = "DELETE FROM `publication` WHERE `publication`.`id` =".$id;
	$bdd->exec($sql);
	header("Location:./newprop.php");
	exit();
}else{
		echo "Error deleting record"; // display error message if not delete
	}
	$bdd = null;
?>

