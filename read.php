<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
    <?php
      try {
          // On se connecte à MySQL
          $bdd = new PDO('mysql:host=localhost;dbname=hiking;charset=utf8', 'root', '');

          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
          // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
      }

      $requete = $bdd->query('SELECT * FROM hiking');

      echo "<table border='1'>";
      echo "<tr><th>Id</th><th>Name</th><th>Difficulty</th><th>Distance</th><th>Duration</th><th>Height Difference</th></tr>";
      while ($donnees = $requete->fetch()) {
          echo "<tr><td>".$donnees['id']."</td><td>".$donnees['name']."</td><td>".$donnees['difficulty']."</td><td>".$donnees['distance']." Km</td><td>".$donnees['duration']."</td><td>".$donnees['height_difference']." m</td></tr>";
      }
      echo "</table>";
    ?>
    </table>
  </body>
</html>
