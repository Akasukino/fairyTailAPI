<?php
if (!array_key_exists('id', $_REQUEST) || (isset($_REQUEST['id']) && !ctype_digit($_REQUEST['id']))) {
    header('Location: index.php');
    exit;
}

include '../includes/configuration.php';
include '../includes/dataBaseFairyTail.php';
include '../includes/utilities.php';

$character = findCharacterById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if (empty($_POST['characterName'])) {
        $errors['characterName'] = 'Veuillez entrer un nom valide !';
    }
    if (empty($_POST['characterBiography'])) {
        $errors['characterBiography'] = 'Veuillez entrer une biography !';
    }
    if (empty($_POST['changePhoto'])) {
        $errors['changePhoto'] = 'Veuillez entrer une URL valide !';
    }
    if (isset($_POST['edit'])) {
        if (empty($errors)) {
            $sql = '
        UPDATE personnages
        SET 
            name = :name,
            biography = :biography,
            photo = :photo
        WHERE id = :id
    ';
            $editCharacter = databaseFairyTail()->prepare($sql);
            $editCharacter->execute([
                    ':id'        => $_POST['id'],
                    ':name'      => $_POST['characterName'],
                    ':biography' => $_POST['characterBiography'],
                    ':photo'     => $_POST['changePhoto'],
                ]
            );
            header('Location: editCharacter.php');
            exit;
        }
    } elseif (isset($_POST['delete'])) {
        $delete = databaseFairyTail()->prepare('
        DELETE FROM personnages
        WHERE id = :id
        ');
        $delete->execute([
            ':id' => $_POST['id']
        ]);
        header('Location: editCharacter.php');
        exit;
    }
}

$button = "../templates/master/content/button";
$template = "../templates/master/content/editPage";
$header = "../templates/content/header";
$footer = "../templates/content/footer";
$pageTitle = $character['characterName'];

include '../templates/layout.phtml';