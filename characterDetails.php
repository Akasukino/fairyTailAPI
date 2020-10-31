<?php

include 'includes/configuration.php';
include 'includes/dataBaseFairyTail.php';
include 'includes/utilities.php';

$character = findCharacterById($_GET['characterId']);

$template = "templates/content/characterDetails";
$header = "templates/content/header";
$footer = "templates/content/footer";
$pageTitle = $character['characterName'];

include 'templates/layout.phtml';
