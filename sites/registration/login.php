<?php
session_start();
require('../../config.inc.php');

if (isset($_POST['login_admin'])){
	$login_admin = stripslashes($_REQUEST['login_admin']);
	$login_admin = mysqli_real_escape_string($bdd, $login_admin);
	$mdp_admin = stripslashes($_REQUEST['mdp_admin']);
	$mdp_admin = mysqli_real_escape_string($bdd, $mdp_admin);
    $query = "SELECT * FROM `administration` WHERE login_admin='$login_admin' and mdp_admin='$mdp_admin'";
	$result = mysqli_query($bdd,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['login_admin'] = $login_admin;
	    header("Location: ../administration.php");
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
<h1 class="box-title">Connexion administration</h1>
<input type="text" class="box-input" name="login_admin" placeholder="login">
<input type="password" class="box-input" name="mdp_admin" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? veuiller nous contacter pour s'inscrire</p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>
