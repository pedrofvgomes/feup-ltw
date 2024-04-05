<?php
    declare(strict_types = 1);

    require_once(__DIR__ . '/../templates/auth_template.php');
    require_once(__DIR__ . '/../session.php');

    $session = new Session();

    draw_head();
    draw_auth();
    draw_alerts($session);
?>

<?php function draw_head() { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=100.0">

        <link href="/../style/style_.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/../js/faq.js"></script>

        <title>Authentication</title>
    </head>
    <body>
<?php } ?>

<?php function draw_alerts(Session $session){
    $messages = $session->getMessages();

    foreach ($messages as $message) {
        if ($message['type'] === 'error') {
            echo '<script>window.onload = function() { alert("' . $message['text'] . '"); };</script>';
        }
    }

}
?>