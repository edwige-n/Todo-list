<?php
include 'header.php'; 

if( !empty($_GET['listname']) ){
	$query = $pdo->prepare("SELECT * FROM liste WHERE nomListe LIKE :nom");
	$query->bindParam(':nom', $_GET['listname']);
} else {
	$query = $pdo->prepare("SELECT * FROM liste");
}

   if ($query->execute()) { 
       $success = true;
       $msg = "Voici les listes :"; 
       $liste = array(); 
       foreach($query->fetchAll(PDO::FETCH_ASSOC) as $ligne) {
        $liste = $ligne; 
        $results = $liste; 
        var_dump($results);  
       }
    }   
   else {
       $success = false; 
       $msg = "Il y un problème...";
   } 
retour_json($success, $msg, $results);

?>