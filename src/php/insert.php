<?php
include 'header.php'; 

if(!empty($_POST["listname"]) && !empty($_POST["descriptionliste"])) {
    $query = $pdo->prepare("INSERT INTO liste (nomListe, DescriptionListe) VALUES (NULL, :listenom, :descrpliste);");
    $query->bindParam(':listenom', $_POST["listname"]); 
    $query->bindParam(':descrpliste', $_POST["descriptionliste"]); 
    $query->execute(); 


    retour_json(true, "Une nouvelle liste a été créée!"); 
}
else {
    retour_json(false, "Veuillez compléter tous les champs"); 
}

?>