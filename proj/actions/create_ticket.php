<?php
    declare(strict_types=1);

    require_once(__DIR__ . '/../session.php');
    $session = new Session();

    require_once(__DIR__ . '/../db/connection.php');
    require_once(__DIR__ . '/../db/ticket_class.php');

    $db = getdbconnection();

    $ticket = Ticket::createTicket($db, $session->getId(), 0, $_POST['subject'], $_POST['description'], $_POST['department']);

    if($ticket){
        $session->addMessage('success', 'Ticket created successfully!');
    } else {
        $session->addMessage('error', 'Failed to create ticket.');
    }

    header('Location: /../pages/profile.php');
?>