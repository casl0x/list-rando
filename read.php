<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <a href="create.php">Ajouter une randonnée</a>

    <?php
      include "./connect.php";
      include "./delete.php";

      $requete = $bdd->query('SELECT * FROM hiking');

      echo "<table border='1'>";
      echo "<tr><th>Nom</th><th>Difficulté</th><th>Distance</th><th>Durée</th><th>Dénivelé</th><th>Possible perturbation</th></tr>";
      while ($donnees = $requete->fetch()) {
          echo "<tr><td>".$donnees['name']."</td><td>".$donnees['difficulty']."</td><td>".$donnees['distance']." Km</td><td>".$donnees['duration']."</td><td>".$donnees['height_difference']."</td><td>".$donnees['available']."</td><td><a href='./update.php?id=".$donnees['id']."'>Modifier</a></td><td><form method='post'><input type='hidden' name='supprimer' value='". htmlspecialchars($donnees['name'])."'><input type='submit' value='Supprimer'></form></td></tr>";
      }
      echo "</table>";
    ?>
  </body>
</html>
