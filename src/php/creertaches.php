<?php
include 'header.php'; 

if(!empty($_POST['nomtache']) && !empty($_POST['etat']) &&  !empty($_POST['nomListe'])) {
    //verifier si le nom de la liste saisi par l'utilisateur n'est pas déjà utilisé

    $checkListName = $pdo->prepare("Select * from liste where nomListe = ?"); 
    $checkListName->execute([$_POST['nomListe']]); 
    $listname = $checkListName->fetch();

    if($listname) {
    $checktaskName = $pdo->prepare("Select * from taches where nomTaches = ?"); 
    $checktaskName->execute([$_POST['nomtache']]); 
    $taskname = $checktaskName->fetch(); 
        if(!$taskname) {
        $query = $pdo->prepare("INSERT INTO taches (nomTaches, EtatTaches, nomListe VALUES (:nomTaches, :EtatTaches, :nomLIste);");
        $query->bindParam(':nomTaches', $_POST['nomtache']); 
         $query->bindParam(':EtatTaches', $_POST['etat']); 
        $query->bindParam(':nomLIste', $_POST['nomliste']); 
        $query->execute(); 
        $success = true; 
        $msg = "La tâche '" .$_POST['nomtache']. "' a bien été créée!"; 
        }
        else {
        $success = false; 
        $msg = "Cette tache existe déjà!"; 
        }

    }
    else {
       $success = false; 
       $msg = "Cette liste n'existe pas!"; 
    }
}
else {
    $success = false; 
    $msg = "Veuillez completer tous les champs";  
}

retour_json($success,$msg); 

?>