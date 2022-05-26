<?php
include 'header.php'; 
 

$query = $pdo->prepare("SELECT idListe, nomListe, DescriptionListe FROM liste"); 
$query->execute(); 

$resultats = $query->fetchAll(); 

$results["idListe"]["nomListe"]["DescriptionListe"] = $resultats; 

retour_json(true, "Voici vos listes", $results); 



?>