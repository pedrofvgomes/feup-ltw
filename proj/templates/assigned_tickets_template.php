<?php
function draw_assigned_tickets(PDO $db, $session)
{
    $id = $session->getId();
    $stmt = $db->prepare('
        SELECT Account.name, Account.username, Ticket.id, Ticket.subject, Ticket.department, Ticket.datecreated, Ticket.status
        FROM Account, Ticket
        WHERE Account.id = Ticket.agent
        AND Account.id = ?
    ');
    $stmt->execute([$id]);
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
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Assigned Tickets</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
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
                                <tr id="ticket" onclick="window.location.href='ticket_details.php?id=<?php echo $ticket['id']; ?>'">
                                    <td>
                                        <img src="../images/people.png">
                                        <p><?php echo $ticket['name'] . ' (' . $ticket['username'] . ')'; ?></p>
                                    </td>
                                    <td><?php echo $ticket['subject']; ?></td>
                                    <td><?php echo $ticket['department']; ?></td>
                                    <td><?php echo $ticket['datecreated']; ?></td>
                                    <td><span class="status <?php echo strtolower($ticket['status']); ?>"><?php echo $ticket['status']; ?></span></td>
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
</body>

</html>
<?php } ?>
