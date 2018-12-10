<?php

require_once "../src/bootstrap.php";

$boardId = $_GET['board_id'];
$listId = $_GET['list_id'];

$tasklist = $entityManager->find('Tasklist', $listId);

if (!isset($tasklist)) {
    dieWithError("List not found");
}

if ($tasklist->board->id != $boardId) {
    dieWithError("List does not belong to this board");
}

dieOk($tasklist);