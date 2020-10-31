<?php

/* Dépendances */
include '../includes/configuration.php';
include '../includes/dataBaseFairyTail.php';
include '../includes/utilities.php';

$characters = queryCharacters();

// Variables Locales pour l'affichage des templates
$button = "../templates/master/content/button";
$template = "../templates/master/content/forms/editCharacter";
$header = "../templates/content/header";
$footer = "../templates/content/footer";
$pageTitle = "Editer un personnage";

include '../templates/layout.phtml';