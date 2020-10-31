<?php

include '../includes/configuration.php';
include '../includes/dataBaseFairyTail.php';
include '../includes/utilities.php';

$query = databaseFairyTail()->prepare(' SELECT * FROM personnages WHERE id = ?');
$query->execute([$_GET['id']]);
$characters = $query->fetchAll();

$character = findCharacterById($_GET['id']);


$button = "../templates/master/content/button";
$template = "../templates/master/content/addPage";
$header = "../templates/content/header";
$footer = "../templates/content/footer";
$pageTitle = $character['characterName'];

include '../templates/layout.phtml';