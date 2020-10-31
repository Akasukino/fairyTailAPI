<?php
/* Dépendances */
include '../includes/configuration.php';
include '../includes/dataBaseFairyTail.php';
$db = databaseFairyTail();

/******************* Code Principale **********************/

/* Requete POST Ajouter un personnage */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if (empty($_POST['nameCharacter'])) {
        $errors['nameCharacter'] = 'Veuillez entrer un nom valide !';
    }
    if (empty($_POST['biography'])) {
        $errors['biography'] = 'Veuillez entrer une biography !';
    }
    if (empty($_POST['photo'])) {
        $errors['photo'] = 'Veuillez entrer une URL valide !';
    }

    if (empty($errors)) {
        $query = $db->prepare('
            INSERT INTO personnages
            (name, biography, photo)
            VALUES
            (:characterName, :biography, :photo)
        ');
        $query->execute([
            ':characterName' => $_POST['nameCharacter'],
            ':biography'     => $_POST['biography'],
            ':photo'         => $_POST['photo'],
        ]);
        $id = $db->lastInsertId();
        header("Location: addPage.php?id=$id");
        exit;
    }
}

// Variables Locales pour l'affichage des templates
$button = "../templates/master/content/button";
$template = "../templates/master/content/forms/addCharacter";
$header = "../templates/content/header";
$footer = "../templates/content/footer";
$pageTitle = "Ajouter un personnage";
include '../templates/layout.phtml';