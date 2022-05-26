<?php 
session_start(); 
include 'header.php'; 

if(!empty($_POST['prenomPersonne']) && !empty($_POST['nomPersonne']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    //verifier le nom d'utilisateur entré par l'utilisateur n'est pas déjà utilisé
    $checkusername = $pdo->prepare("SELECT * FROM personnes where username = ? "); 
    $checkusername->execute([$_POST['username']]); 
    $username = $checkusername->fetch(); 

    if(!$username) {
        //hasher le mdp 
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT); 
        $query = $pdo->prepare("INSERT INTO personnes (nomPersonne, prenomPersonne, username, mdp) VALUES (?,?,?,?)"); 

        if($query->execute([$_POST['prenomPersonne'], $_POST['nomPersonne'], $_POST['username'], $hash])) {
            $success = true; 
            $msg = "Bienvenue " .$_POST['username']. " ! "; 
        }
        else {
            $success = false; 
            $msg = "Erreur"; 
        }
        
    }
    else {
        $success = false; 
        $msg = "Ce nom d'utilisateur est déjà utilisé!"; 
    }
}
else {
    $success = false; 
    $msg = "Veuillez remplir tous les champs!"; 
}

retour_json($success, $msg); 
?>