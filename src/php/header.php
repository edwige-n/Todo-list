<?php
header('Content-Type: application/json');
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=todolist', 'root', ''); 
    $retour["success"] = true; 
    $retour["message"] = "Connexion à la bdd reussie "; 
} catch(Exception $e) {
   
    retour_json(false, "Connexion à la base de données impossible"); 
}
function retour_json($success, $results, $msg=NULL)
{
    $retour["success"] = $success; 
    $retour["message"] = $msg; 
    $retour["results"] = $results; 
    echo json_encode($results); 
}
?>