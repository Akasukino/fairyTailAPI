<?php
include 'includes/configuration.php';
include 'includes/dataBaseFairyTail.php';
include 'includes/utilities.php';

$characters = queryCharacters();

$template = "templates/content/characterList";
$header = "templates/content/header";
$footer = "templates/content/footer";
$pageTitle = "Liste des personnages";

include 'templates/layout.phtml';