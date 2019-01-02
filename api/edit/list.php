<?php

require_once "../../src/bootstrap.php";

$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

$boardId = $data['boardId'];
$listId = $data['_id'];

if (!isset($listId)) {
    dieWithError("List id missing");
}

$tasklist = $entityManager->find('Tasklist', $listId);

if (!isset($tasklist)) {
    dieWithError("List not found");
}

if ($tasklist->getBoard()->getId() != $boardId) {
    dieWithError("List does not belong to this board");
}

if (array_key_exists('listName', $data)) {
    $tasklist->setListName($data['listName']);
}

$entityManager->persist($tasklist);
$entityManager->flush();

dieOk($tasklist);