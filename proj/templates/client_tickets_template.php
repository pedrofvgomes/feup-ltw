<?php function draw_client_tickets(PDO $db, $session)
{
    $id = $session->getId();
    $stmt = $db->prepare('
        SELECT Ticket.id, Ticket.subject, Ticket.datecreated, Status.name as "status"
        FROM Ticket, Status
        WHERE Ticket.status = Status.id
		and Ticket.author = ?
    ');
    $stmt->execute([$id]);
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- CONTENT -->
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

	<script src="../js/script.js"></script>
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>My Tickets</h1>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>Ticket</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tickets as $ticket) { ?>
                                <tr id="ticket" onclick="window.location.href='ticket_details.php?id=<?php echo $ticket['id']; ?>'">
                                    <td><?php echo $ticket['subject']; ?></td>
                                    <td><?php echo $ticket['datecreated']; ?></td>
                                    <td><span><?php echo $ticket['status']; ?></span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../js/script.js"></script>
</body>
</html>
<?php } ?>