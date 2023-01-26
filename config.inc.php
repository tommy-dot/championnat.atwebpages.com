<?php
// Informations d'identification
define('DB_SERVER', 'fdb27.eohost.com');
define('DB_USERNAME', '3669929_galet');
define('DB_PASSWORD', 'nicoquentin1');
define('DB_NAME', '3669929_galet');
 
// Connexion � la base de donn�es MySQL 
$bdd = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($bdd === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>