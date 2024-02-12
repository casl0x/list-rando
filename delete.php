<?php
/**** Supprimer une randonnée ****/
require_once './connect.php';

if (isset($_POST['supprimer'])){
    $suppRando = $_POST['supprimer'];

    $sql = "DELETE FROM `hiking` WHERE `name` = :name";
    $query = $bdd->prepare($sql);
    $query->bindValue(":name", $suppRando, PDO::PARAM_STR);
    $query->execute();

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}