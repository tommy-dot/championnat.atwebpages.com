<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["login_admin"])){
		header("Location: registration/login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="../styles/styles_administration.css" />
	</head>
	<body>
	<header>
        <h1 class="titre">Championnat de Tir à l’Arc</h1>
    <nav>
        <ul>
			<li><a href="../index.php">Accueil</a></li>
            <li><a href="classement.php">Classement</a></li>
            <li><a href="competition.php">Competition</a></li>
            <li><a href="administration.php">Administration</a></li>
        </ul>
    </nav>
    </header>
	<h1>Bienvenue <?php echo $_SESSION['login_admin']; ?>!</h1>
	<?php
		include("../config.inc.php") ;
	?>
	<script src="/script/admin.js" type="text/javascript"></script>		
		<header>
			<h1 class="titre1">Administration des equipes :</h1>
		</header>
	<form method="post" id="inscription" />
	<fieldset>
		<legend> Inscrire un joueur </legend>
			<p> Nom du joueur : <input type="text"  placeholder="Nom" id="nom_joueur" name="nom_joueur" required /> </p>
			<p> Numero de licence : <input type="text"  placeholder="Licence" id="numero_licence" name="numero_licence" required /> </p>
			<input type="button" value="VÉRIFIER " onclick="admin()" />
			<p>
			<label for="code_equipe">Code equipe :
			<select name="code_equipe">
			<option value="TAC">TAC</option><option value="ACB">ACB</option><option value="CAM">CAM</option></select>
			</label>
			</p>
			<input type="submit" value="VALIDER" class="button" />
			<input type="reset" value="EFFACER" class="button" />
		</fieldset>
		<?php		
			if (isset($_POST['nom_joueur']) && isset($_POST['numero_licence']) && isset($_POST['code_equipe'])) {
				$sql = "INSERT INTO joueur (numero_licence, nom_joueur, code_equipe) VALUES ('$_POST[numero_licence]', '$_POST[nom_joueur]', '$_POST[code_equipe]')";
		
			if (mysqli_query($bdd, $sql)) {
		  		echo "L’enregistrement est ajouté /";} 
				  else {
					  echo "Erreur: " . $sql . "<br>" . mysqli_error($bdd);
					}
					echo 'Info joueur NOM : '.$_POST['nom_joueur'].' / LICENCE : '.$_POST['numero_licence'].' / EQUIPE : '.$_POST['code_equipe'].'';
				}
				else {
					echo 'Les variables du formulaire d inscription ne sont pas déclarées';
				}
		?>
		<fieldset>
			<legend> Joueur inscris </legend>
			<?php
				$resultat = mysqli_query($bdd, "SELECT * FROM `joueur`");
			?>
        <table>
            <tr>
                <th>Licence</th>
                <th>Nom</th>
                <th>Equipe</th>             
            </tr>
        	<?php
            while($donnees = mysqli_fetch_array($resultat)) {
			extract($donnees);
			echo "<tr><td>&nbsp;$numero_licence</td><td>&nbsp;$nom_joueur</td><td>&nbsp;$code_equipe</td></tr>";
			}
            ?>
        </table>
		</fieldset>
		<a href="registration/logout.php" class="button_deco">Déconnexion</a>		
	</body>
</html>