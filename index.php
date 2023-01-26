<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>projet</title>
    <link rel="stylesheet" href="styles/styles.css">
    <meta name="Author" content="Galet-Pertus-Dufour">
	<meta name="Keywords" content="muscu" />
	<meta name="description" content="championnat de Tir a l'arc"/>	
  </head>
      
    <header>
        <h1 class="titre">Championnat de Tir à l’Arc</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="sites/classement.php">Classement</a></li>
            <li><a href="sites/competition.php">Competition</a></li>
            <li><a href="sites/administration.php">Administration</a></li>
        </ul>
    </nav>

    
    </header>
    <body>
        <section class="description">
        <h2>Description championnat :</h2>
        <p>Pour sa 21ème édition depuis 2000 ce tournoi confrontera les équipes : Arc Club de Blagnac, Toulouse Athlétic Club, Compagnie d’Archers de Muret. 
            Lors de ce tournoi nous verrons ses trois équipes composées de 3 joueurs s'affronter sur 3 journées dans 3 villes différentes a savoir Toulouse, Muret, Blagnac
            L'équipe gagnante du tournoi sera celle ayant remporté le plus de points.
            Durant les 3 jours, les équipes enverront 1 joueurs par jours pour les représentaient, le gagnant sera le joueur ayant rapporté le plus de points a son équipe a l'issu de la journée. 
            A la fin des 3 journées, les organisateurs du tournois partageront les scores totaux pour désigner l'équipe vainqueur.
            Les tenant du titre de l'année dernière sont Arc Club de Blagnac arriveront ils a conserver leur titre ?</p>
        </section>

        <section class="calandrier">
            <h1>Calendrier :</h1>
            <table>
                <tr>
                    <th>Ville</th>
                    <th>Date</th>
                </tr>
            <?php
            include( "./config.inc.php") ;
             $resultat = mysqli_query($bdd, "SELECT date,numero_ville  FROM `etape`") or die("dommage"); 
             mysqli_close($bdd);
            while ($ligne = mysqli_fetch_assoc($resultat))
            {
                extract($ligne);
                echo "<tr /><td>$numero_ville</td><td>$date</td><tr />";
                
            }
                 ?>
                 </table>
		</section>
        <section class="etape">
            <h1 class="etape">Etape :</h1>
            <table>
                <tr>
                    <th>Ville</th>
                    <th>Numero Ville</th>
                </tr>
            <?php
            include( "./config.inc.php") ;
             $resultat = mysqli_query($bdd, "SELECT nom_ville,numero_ville  FROM `ville`") or die("dommage"); 
             mysqli_close($bdd);
            while ($ligne = mysqli_fetch_assoc($resultat))
            {
                extract($ligne);
                echo "<tr /><td>$nom_ville</td><td>$numero_ville</td><tr />";
                
            }
                 ?>
                 </table>
		</section>

        <section class="equipe">
            <h1 class="equipeh1">Présentation des équipes :</h1>
            <table>
                <tr>
                    <th>Code de l'Equipe</th>
                    <th>Nom de l'équipe	</th>
                    <th>Nom des entraineurs</th>
                </tr>
            <?php
         
            include( "./config.inc.php") ;
            $resultat = mysqli_query($bdd, "SELECT nom_equipe,nom_entraineur,code_equipe FROM `equipe`") or die("dommage");
            mysqli_close($bdd);
            while ($ligne = mysqli_fetch_assoc($resultat))
            {
                extract($ligne);
                echo "<tr /><td>$code_equipe</td><td>$nom_equipe</td>  <td>$nom_entraineur </td><tr />";
            }
             ?>
            </table>
                <img src="images/FFTA.png" class="imgt"/>
        </section>

     

    </body>
</html>