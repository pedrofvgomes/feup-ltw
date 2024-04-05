<?php function draw_client_sidebar() { ?>
    <section id="sidebar">
        <a href="../pages/landing_page.php" class="brand">
            <img src="../assets/logoo.png" alt="Logo">
            <span class="text">QUICKFIX</span>
        </a>
        <ul class="side-menu top">
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/client_tickets.php') echo ' class="active"'; ?>>
                <a href="../pages/client_tickets.php">
                    <i class='bx bx-file'></i>
                    <span class="text">My Tickets</span>
                </a>
            </li>
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/faq.php') echo ' class="active"'; ?>>
                <a href="/../pages/faq.php">
                    <i class='bx bxs-help-circle'></i>
                    <span class="text">FAQ</span>
                </a>
            </li>
            <li>
                <a href="../actions/logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
<?php } ?>

<?php function draw_agent_sidebar() { ?>
    <section id="sidebar">
        <a href="../pages/landing_page.php" class="brand">
            <img src="../assets/logoo.png" alt="Logo">
            <span class="text">QUICKFIX</span>
        </a>
        <ul class="side-menu top">
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/ticket_central.php') echo ' class="active"'; ?>>
                <a href="../pages/ticket_central.php?page=1">
                    <i class='bx bxs-category'></i>
                    <span class="text">Ticket Central</span>
                </a>
            </li>
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/assigned_tickets.php') echo ' class="active"'; ?>>
                <a href="../pages/assigned_tickets.php">
                    <i class='bx bx-file'></i>
                    <span class="text">Assigned Tickets</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu top">
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/faq.php') echo ' class="active"'; ?>>
                <a href="/../pages/faq.php">
                    <i class='bx bxs-help-circle'></i>
                    <span class="text">FAQ</span>
                </a>
            </li>
            <li>
                <a href="../actions/logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
<?php } ?>

<?php function draw_admin_sidebar() { ?>
    <section id="sidebar">
        <a href="../pages/landing_page.php" class="brand">
            <img src="../assets/logoo.png" alt="Logo">
            <span class="text">QUICKFIX</span>
        </a>
        <ul class="side-menu top">
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/ticket_central.php') echo ' class="active"'; ?>>
                <a href="../pages/ticket_central.php?page=1">
                    <i class='bx bxs-category'></i>
                    <span class="text">Ticket Central</span>
                </a>
            </li>
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/assigned_tickets.php') echo ' class="active"'; ?>>
                <a href="../pages/assigned_tickets.php">
                    <i class='bx bx-file'></i>
                    <span class="text">Assigned Tickets</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu top">
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/upgrade.php') echo ' class="active"'; ?>>
                <a href="../pages/upgrade.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">User Roles</span>
                </a>
            </li>
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/admin_departments.php') echo ' class="active"'; ?>>
                <a href="../pages/admin_departments.php">
                    <i class='bx bxs-building'></i>
                    <span class="text">Departments</span>
                </a>
            </li>
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/admin_settings.php') echo ' class="active"'; ?>>
                <a href="../pages/admin_settings.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Administration</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu top">
            <li<?php if ($_SERVER['PHP_SELF'] == '/pages/faq.php') echo ' class="active"'; ?>>
                <a href="/../pages/faq.php">
                    <i class='bx bxs-help-circle'></i>
                    <span class="text">FAQ</span>
                </a>
            </li>
            <li>
                <a href="../actions/logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
<?php } ?>
