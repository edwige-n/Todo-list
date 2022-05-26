<?php
include 'header.php'; 

if(!empty($_POST['listname']) && !empty($_POST['descriptionliste'])) {
    //verifier si le nom de la liste saisi par l'utilisateur n'est pas déjà utilisé
    $checkListName = $pdo->prepare("SELECT * from liste where nomListe = ?"); 
    $checkListName->execute([$_POST['listname']]); 
    $listname = $checkListName->fetch(); 

    if(!$listname) {
    $query = $pdo->prepare("INSERT INTO liste (nomListe, DescriptionListe) VALUES (:nomListe, :DescriptionListe);");
    $query->bindParam(':nomListe', $_POST['listname']); 
    $query->bindParam(':DescriptionListe', $_POST['descriptionliste']); 
    $query->execute(); 
    $success = true; 
    $msg = "La liste " .$_POST['listname']. " a bien été créée!"; 
    }
    else {
       $success = false; 
       $msg = "Cette liste existe déjà!"; 
    }
}
else {
    $success = false; 
    $msg = "Veuillez completer tous les champs";  
}

retour_json($success,$msg); 

?>