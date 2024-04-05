<?php
declare(strict_types=1);

require_once(__DIR__ . '/../session.php');
require_once(__DIR__ . '/../db/connection.php');
require_once(__DIR__ . '/../db/ticket_class.php');

$session = new Session();
$db = getdbconnection();

if (!$session->isLoggedIn()) {
    header('Location: authentication.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketId = intval($_POST['ticketid']);

    $ticket = Ticket::getTicket($db, $ticketId);
    if (!$ticket) {
        header('Location: ../pages/profile.php');
        exit();
    }

    printf("error1");

    $priority = $_POST['priority'];
    $stmt = $db->prepare('SELECT id FROM Priority WHERE name = ?');
    $stmt->execute([$priority]);
    $p_id = $stmt->fetchColumn();

    $status = $_POST['status'];
    $stmt = $db->prepare('SELECT id FROM Status WHERE name = ?');
    $stmt->execute([$status]);
    $s_id = $stmt->fetchColumn();

    $department = $_POST['department'];
    $stmt = $db->prepare('SELECT id FROM Department WHERE name = ?');
    $stmt->execute([$department]);
    $d_id = $stmt->fetchColumn();

    printf("error2");
    $stmt = $db->prepare('
        UPDATE Ticket SET priority = ?, status = ?, department = ?, agent = ?
        WHERE id = ?
    ');
    $stmt->execute([$p_id, $s_id, $d_id, intval($_POST['agentid']), $ticketId]);

    // Redirect back to the ticket details page
    header('Location: ../pages/ticket_details.php?id=' . $ticketId);
    exit();
} else {
    header('Location: ../pages/profile.php');
    exit();
}
?>