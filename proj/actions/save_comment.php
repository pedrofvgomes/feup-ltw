<?php
declare(strict_types=1);

require_once(__DIR__ . '/../db/connection.php');

$db = getdbconnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketid = intval($_POST['ticketid']);
    $authorid = intval($_POST['authorid']);
    $comment = $_POST['comment'];

    $stmt = $db->prepare("
        INSERT INTO TicketComment (ticketid, authorid, comment)
        VALUES (?, ?, ?)
    ");

    $success = $stmt->execute([$ticketid, $authorid, $comment]);

    if ($success) {
        header('Location: ../pages/ticket_details.php?id=' . $ticketid);
        exit;
    } 
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}