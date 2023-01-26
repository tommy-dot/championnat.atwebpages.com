<?php
session_start();
require('../../config.inc.php');

if (isset($_POST['nom_entraineur'])){
	$nom_entraineur = stripslashes($_REQUEST['nom_entraineur']);
	$nom_entraineur = mysqli_real_escape_string($bdd, $nom_entraineur);
	$mdp_entraineur = stripslashes($_REQUEST['mdp_entraineur']);
	$mdp_entraineur = mysqli_real_escape_string($bdd, $mdp_entraineur);
    $query = "SELECT * FROM `equipe` WHERE nom_entraineur='$nom_entraineur' and mdp_entraineur='$mdp_entraineur'";
	$result = mysqli_query($bdd,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['nom_entraineur'] = $nom_entraineur;
	    header("Location: ../competition.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../styles/style_login.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="nom_entraineur" placeholder="nom entraineur">
<input type="password" class="box-input" name="mdp_entraineur" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? veuiller nous contacter pour s'inscrire</p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>
