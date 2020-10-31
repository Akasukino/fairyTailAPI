<?php
// dépendences
include 'includes/configuration.php';
include 'includes/dataBaseFairyTail.php';
include 'includes/utilities.php';

$characters = queryCharacters();

// Variables Locales pour l'affichage des templates
$template = "templates/content/index";
$header ="templates/content/header";
$footer ="templates/content/footer";
$pageTitle = "Fairy Tail";

include 'templates/layout.phtml';