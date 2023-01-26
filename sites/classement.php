<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>classement</title>
        <link rel="stylesheet" href="../styles/styles_classement.css">
        <meta name="Author" content="Galet-Pertus-Dufour">
	    <meta name="Keywords" content="classement" />
	    <meta name="description" content="championnat de Tir a l'arc"/>	
   </head>
   <header>
        <h1 class="titre">Championnat de Tir à l’Arc</h1>
		<?php
		include("../config.inc.php") ;
		?>
    <nav>
        <ul>
			<li><a href="../index.php">Accueil</a></li>
            <li><a href="classement.php">Classement</a></li>
            <li><a href="competition.php">Competition</a></li>
            <li><a href="administration.php">Administration</a></li>
        </ul>
    </nav>
	</header>
        <table>
			<th>Joueur</th>
            <th>Equipe</th>
            <th>Score</th>                            
		
		<?php
        $scores = mysqli_query($bdd, "SELECT nom_joueur, joueur.code_equipe, SUM(score) AS score_joueur
        FROM competition 
        INNER JOIN joueur ON joueur.numero_licence=competition.numero_licence
        INNER JOIN equipe ON equipe.code_equipe=joueur.code_equipe
        GROUP BY nom_joueur
        ORDER BY score_joueur DESC ") or die(mysqli_error($bdd));
		
        while($donnees = mysqli_fetch_array($scores)) {
		extract($donnees);
		echo "<tr><td>&nbsp;$nom_joueur</td><td>&nbsp;$code_equipe</td><td>&nbsp;$score_joueur</td></tr>"; }
		?>
		</table>
		
		        <table>
			<th>Equipe</th>
            <th>Code</th>
            <th>Score Equipe</th>                            
		
		<?php
        $scores = mysqli_query($bdd, "SELECT nom_equipe, equipe.code_equipe, SUM(score) AS score_equipe
        FROM competition 
        INNER JOIN joueur ON joueur.numero_licence=competition.numero_licence 
        INNER JOIN equipe ON equipe.code_equipe=joueur.code_equipe
        GROUP BY equipe.code_equipe
        ORDER BY score_equipe DESC ") or die(mysqli_error($bdd));
		
        while($donnees = mysqli_fetch_array($scores)) {
		extract($donnees);
		echo "<tr><td>&nbsp;$nom_equipe</td><td>&nbsp;$code_equipe</td><td>&nbsp;$score_equipe</td></tr>"; }
		?>
		</table>
		        <table>
			<th>Date</th>
            <th>Joueur</th>
            <th>Score Joueur</th>                            
		
		<?php
        $scores = mysqli_query($bdd, "SELECT date, nom_joueur, score
        FROM competition 
        INNER JOIN joueur ON joueur.numero_licence=competition.numero_licence 
        INNER JOIN etape ON etape.numero_jour=competition.numero_jour
        ORDER BY date ") or die(mysqli_error($bdd));
		
        while($donnees = mysqli_fetch_array($scores)) {
		extract($donnees);
		echo "<tr><td>&nbsp;$date</td><td>&nbsp;$nom_joueur</td><td>&nbsp;$score</td></tr>"; }
		?>
		</table>
</html>
