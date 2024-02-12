<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="Très facile">Très facile</option>
				<option value="Facile">Facile</option>
				<option value="Moyen">Moyen</option>
				<option value="Difficile">Difficile</option>
				<option value="Très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php
		require_once "./connect.php";

		if(!empty($_POST)){
            if(isset($_POST["name"], $_POST["difficulty"], $_POST["distance"], $_POST["duration"], $_POST["height_difference"]) && !empty($_POST["name"]) && !empty($_POST["difficulty"]) && !empty($_POST["distance"]) && !empty($_POST["duration"]) && !empty($_POST["height_difference"])){

				$name = $_POST["name"];
                $difficulty = $_POST["difficulty"];
                $distance = $_POST["distance"];
                $duration = $_POST["duration"];
				$height_difference = $_POST["height_difference"];

                $sql = "INSERT INTO `hiking`(`id`, `name`, `difficulty`,`distance`, `duration`, `height_difference`) VALUES (NULL, :name, :difficulty, :distance, :duration, :height_difference)";
            
                $query = $bdd->prepare($sql); // prépare le requête
                // injecter les valeurs
                $query->bindValue(":name", $name, PDO::PARAM_STR);
                $query->bindValue(":difficulty", $difficulty, PDO::PARAM_STR);
                $query->bindValue(":distance", $distance, PDO::PARAM_INT);
				$query->bindValue(":duration", $duration, PDO::PARAM_INT);
				$query->bindValue(":height_difference", $height_difference, PDO::PARAM_INT);

                $query->execute(); // execute la requête

                header('Location: read.php');
                exit;
            } else {
                die("le formulaire est incomplet");
            }
		}
	?>
</body>
</html>
