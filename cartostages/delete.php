<?php

include "connexion.php"; // Using database connection file here
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer']))
{
	$id = $_POST['supprimer'];	
	$sql = "DELETE FROM `publication` WHERE `publication`.`id` =".$id;
	$bdd->exec($sql);
	header("Location:./newprop.php");
	exit();
}else{
		echo "Error deleting record"; // display error message if not delete
	}
	$bdd = null;
?>

