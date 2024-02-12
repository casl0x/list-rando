<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Modifier</h1>
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
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<div>
			<label for="available">Possible perturbation</label>
			<input type="text" name="available" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

	<?php
		include "./connect.php";

		if (!empty($_POST)) {
			if (isset($_GET['id']) && !empty($_GET['id'])) {
				$id = $_GET['id'];
		
				$name = $_POST["name"];
				$difficulty = $_POST["difficulty"];
				$distance = $_POST["distance"];
				$duration = $_POST["duration"];
				$height_difference = $_POST["height_difference"];
				$available = $_POST["available"];
		
				$sql = "UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference, available = :available WHERE id = :id";
				$query = $bdd->prepare($sql);
				$query->bindValue(":name", $name, PDO::PARAM_STR);
				$query->bindValue(":difficulty", $difficulty, PDO::PARAM_STR);
				$query->bindValue(":distance", $distance, PDO::PARAM_INT);
				$query->bindValue(":duration", $duration, PDO::PARAM_INT);
				$query->bindValue(":height_difference", $height_difference, PDO::PARAM_INT);
				$query->bindValue(":availble", $available, PDO::PARAM_STR);
				$query->bindValue(":id", $id, PDO::PARAM_INT);
		
				$query->execute();
		
				header('Location: read.php');
				exit;
			} else {
				echo "ID de randonnée non fourni.";
			}
		}
	?>
</body>
</html>
