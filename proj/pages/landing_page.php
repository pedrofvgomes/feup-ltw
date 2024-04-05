<?php
    declare(strict_types = 1);

    require_once(__DIR__ . '/../templates/landing_page_template.php');

    draw_head();
    draw_landing_page();
?>


<?php function draw_head() { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <link
                rel="icon"
                type="image/png"
                sizes="32x32"
                href="../assets/coding.png"
            />

            <link rel="stylesheet" href="../style/style.css" />

            <title>QuickFix</title>
        </head>
    <body>
<?php } ?>