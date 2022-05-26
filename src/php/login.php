<?php 
session_start(); 
include 'header.php'; 

if(!empty($_POST['username']) && !empty($_POST['mdp'])) {
   $username = $_POST['username'];
   $mdp = $_POST['mdp'];  
   $_SESSION['user'] = $username; 
   $query = $pdo->prepare("SELECT username, mdp FROM personnes where username = '$username' LIMIT 1"); 
   $query->execute(); 
   $row = $query->rowCount();  
   if($row == 1 ){
       $personne = $query->fetch(PDO::FETCH_ASSOC);  
       if(password_verify($mdp, $personne['mdp'])) {
           $success = true; 
           $msg =  "Bienvenue " . $username . " !"; 
       }
       else {
           $success = false; 
           $msg = "erreur"; 
       }
   }
   else {
       $success = false; 
       $msg = "Ce nom d'utilisateur n'existe pas!"; 
   }

}
else {
    $msg = "Veuillez remplir tous les champs!"; 
}
retour_json($success, $msg); 
?>