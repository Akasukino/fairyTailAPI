<?php

function findCharacterById(int $characterId)
{
    $sql = '
        SELECT
            id,
            name AS characterName, 
            biography, 
            photo
        FROM personnages
        WHERE  id = ?
    ';

    $result = databaseFairyTail()->prepare($sql);
    $result->execute([$characterId]);

    return $result->fetch();
}

function queryCharacters()
{
    $query = databaseFairyTail()->query('
        SELECT 
            id AS characterId,
            name AS characterName,
            biography, 
            photo
        FROM personnages
        ORDER BY id
');
    return $query->fetchAll();
}
