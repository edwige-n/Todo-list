<?php
    session_start(); 
    include 'header.php'; 
    unset($_SESSION['user']); 
    if(!$_SESSION['user']) {
        $success = true; 
        $msg = "Vous êtes déconnectés, au revoir!"; 
    }
    else {
        $success = false; 
        $msg = "Une erreur s'est produite..."; 
    }
retour_json($success, $msg); 

?> 
