<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["nom_entraineur"])){
		header("Location: registration_competition/login_competition.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>classement</title>
        <link rel="stylesheet" href="../styles/styles_competition.css">
        <meta name="Author" content="Galet-Pertus-Dufour">
	    <meta name="Keywords" content="classement" />
	    <meta name="description" content="championnat de Tir a l'arc"/>	
   </head>
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
    <body>
      <?php
		  include("../config.inc.php") ;
		  ?>
      <section class="test">
        <fieldset>
			    <legend> Score du joueur </legend>
          <form method="post" id="inscription" />
          <p> Numero de licence : <input type="text"  placeholder="Numero_licence" id="numero_licence" name="numero_licence" required /> </p>
	        <p> Numero jour <input type="text"  placeholder="Numero_jour" id="numero_jour" name="numero_jour" required /> </p>
          <p> Scores <input type="text"  placeholder="Scores" id="Score" name="score" required /> </p>
	          <input type="submit" value="VALIDER" class="button" />
        </fieldset>
      <?php		

      if (isset($_POST['numero_licence']) && isset($_POST['numero_jour']) && isset($_POST['score'])) {
		    $sql = "INSERT INTO competition (numero_licence, numero_jour, score) VALUES ('$_POST[numero_licence]', '$_POST[numero_jour]', '$_POST[score]')";
		
		  if (mysqli_query($bdd, $sql)) {
		    echo "L’enregistrement est ajouté /";} 
        else {
		      echo "Erreur: " . $sql . "<br>" . mysqli_error($bdd);}
		      echo 'Info joueur Numero_licence : '.$_POST['numero_licence'].' / Numero_jour : '.$_POST['numero_jour'].' / Score : '.$_POST['score'].'';}
		    else {
		      echo 'Les variables du formulaire d inscription ne sont pas déclarées';}
    ?>
      </section>
      <a href="registration_competition/logout_competition.php" class="button_deco">Déconnexion</a>	
  </body>
</html>
