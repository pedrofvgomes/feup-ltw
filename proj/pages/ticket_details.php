<?php
    declare(strict_types=1);

    require_once(__DIR__ . '/../templates/sidebar_template.php');
    require_once(__DIR__ . '/../templates/ticket_details_template.php');
    require_once(__DIR__ . '/../db/ticket_class.php'); 
    require_once(__DIR__ . '/../db/connection.php'); 
    require_once(__DIR__ . '/../session.php');
    require_once(__DIR__ . '/../db/account_class.php');
    
    
    $db = getdbconnection();
    $session = new Session();

    if(!$session->isLoggedIn()) die(header('Location: authentication.php'));

    $user = Account::getUserWithId($db, $session->getId());
    
    $ticket = Ticket::getTicket($db, intval($_GET['id']));


    draw_head($ticket);
    switch($user->role){
        case 'Client':
            draw_client_sidebar();
            break;
        case 'Agent':
            draw_agent_sidebar();
            break;
        case 'Admin':
            draw_admin_sidebar();
            break;
        default:
            header('Location: authentication.php');
            break;
    }
    draw_ticket_details($session, $db, $ticket);
?>


<?php function draw_head(Ticket $ticket) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/coding.png" />

        <!-- Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <!-- My CSS -->
        <link rel="stylesheet" href="../style/style.css">

        <title><?php echo $ticket->subject ?></title>
    </head>

    <body>
<?php } ?>