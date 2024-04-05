<?php
function draw_ticket_central(PDO $db)
{
    // Retrieve all tickets from the database
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $query = "SELECT Ticket.*, Account.name, Account.username, Department.name AS department_name, Status.name AS status_name FROM Ticket
        INNER JOIN Account ON Ticket.author = Account.id
        INNER JOIN Department ON Ticket.department = Department.id
        INNER JOIN Status ON Ticket.status = Status.id
        ORDER BY Ticket.id DESC LIMIT " . (($page - 1) * 10) . ", 10";
    $stmt = $db->query($query);
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <form action="#">

        </form>
        <label></label>
        <a href="../pages/profile.php" class="profile">
            <img src="../assets/user.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Ticket Central</h1>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
				<div class="head">
                    <h3>Recent Issues</h3>
                    <i class='bx bx-skip-previous' onclick="previousPage()"></i>
					<span>Page <?php echo $page; ?></span>
					<i class='bx bx-skip-next' onclick="nextPage()"></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Subject</th>
                            <th>Department</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $ticket) { ?>
                            <tr id="ticket" onclick="window.location.href='../pages/ticket_details.php?id=<?php echo $ticket['id']; ?>'">
                                <td>
                                    <img src="../assets/user.png">
                                    <p><?php echo $ticket['name'] . " (" . $ticket['username'] . ")"; ?></p>
                                </td>
                                <td><?php echo $ticket['subject']; ?></td>
                                <td><?php echo $ticket['department_name']; ?></td>
                                <td><?php echo  (new Datetime($ticket['datecreated']))->format('F d, Y \a\t h:i A'); ?></td>
                                <td><?php echo $ticket['status_name']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>

<script src="../js/script.js"></script>
<script>
    function previousPage() {
        if (<?php echo $page; ?> > 1) {
            window.location.href = '../pages/ticket_central.php?page=<?php echo $page - 1; ?>';
        }
    }

    function nextPage() {
        window.location.href = '../pages/ticket_central.php?page=<?php echo $page + 1; ?>';
    }
</script>
</body>
</html>

<?php
}
?>
