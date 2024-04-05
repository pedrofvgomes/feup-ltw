<?php

require_once(__DIR__ . '/../db/account_class.php');

function draw_ticket_details(Session $session, PDO $db, Ticket $ticket)
{
    $stmt = $db->prepare('
    SELECT Priority.name AS priority_name, Status.name AS status_name, Department.name AS department_name
    FROM Ticket
    JOIN Priority ON Ticket.priority = Priority.id
    JOIN Status ON Ticket.status = Status.id
    JOIN Department ON Ticket.department = Department.id
    WHERE Ticket.id = ?
    ');
    $stmt->execute([$ticket->id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $priority = $result['priority_name'];
    $status = $result['status_name'];
    $department = $result['department_name'];

    $stmt = $db->prepare('
        SELECT username, name 
        FROM Account
        WHERE id = ?
    ');
    $stmt->execute([$ticket->authorid]);

    $result = $stmt->fetch();

    $username = $result['username'];
    $name = $result['name'];

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

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>
                        <?php echo $ticket->subject; ?>
                    </h1>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <table>
                        <div class="details-section">
                            <h1><?php echo $name.' ('.$username.')'; ?></h1>
                        </div>
                        <div class="details-section">
                            <h2>Description</h2>
                            <p>
                                <?php echo $ticket->description; ?>
                            </p>
                            <p class="date">
                                <?php echo $ticket->datecreated->format('F d, Y \a\t h:i A'); ?>
                            </p>
                        </div>

                        <?php
                        $stmt = $db->prepare('
                        SELECT *
                        FROM TicketComment
                        WHERE ticketid = ?
                        ');
                        $stmt->execute([$ticket->id]);
                        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (!empty($comments)):
                            ?>
                            <ul class="comment-section">
                                <h2>Comments</h2>
                                <?php foreach ($comments as $comment): ?>
                                    <div class="comment">
                                        <?php
                                        $commentAuthor = Account::getUserWithId($db, $comment['authorid']);
                                        ?>
                                        <li>
                                            <p>
                                                <a href="../pages/profile.php?id=<?php echo $commentAuthor->id; ?>">
                                                    <?php echo $commentAuthor->name . ' (' . $commentAuthor->username . '): '; ?>
                                                </a>
                                            </p>
                                            <p>
                                                <?php echo $comment['comment']; ?>
                                            </p>
                                            <span>
                                                <?php
                                                $datecreated = new DateTime($comment['datecreated']);
                                                echo $datecreated->format('F d, Y \a\t h:i A');
                                                ?>
                                            </span>
                                        </li>
                                    </div>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="comment-section">
                            <br>
                            <label for="comment-box">Add a Reply:</label>
                            <br>
                            <form action="../actions/save_comment.php" method="POST">
                                <input type="hidden" name="ticketid" value="<?php echo $ticket->id; ?>">
                                <input type="hidden" name="authorid" value="<?php echo $session->getId(); ?>">
                                <textarea id="comment-box" name="comment" rows="4"></textarea>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Ticket Details</h3>
                        <?php if ($session->getRole() === 'Agent' || $session->getRole() === 'Admin'): ?>
                            <a href="../pages/edit_ticket.php?id=<?php echo $ticket->id; ?>">
                                <i class='bx bx-pencil'></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <ul class="todo-list">
                        <li class="cor">
                            <p>Ticket ID: #
                                <?php echo $ticket->id; ?>
                            </p>

                        </li>
                        <li class="cor">
                            <p>Priority: <span id="priority">
                                    <?php echo $priority; ?>
                                </span></p>

                        </li>
                        <li class="cor">
                            <p>Status: <span id="status">
                                    <?php echo $status; ?>
                                </span></p>

                        </li>
                        <li class="cor">
                            <p>Department: <span id="department">
                                    <?php echo $department; ?>
                                </span></p>

                        </li>
                        <li class="cor">
                            <p>Assigned Agent: <span id="agent">
                                    <?php
                                    if ($ticket->agentid == 0)
                                        echo 'None';
                                    else {
                                        $agent = Account::getUserWithId($db, $ticket->agentid);
                                        echo $agent->name . ' (' . $agent->username . ')';
                                    }
                                    ?>
                                </span></p>

                        </li>
                        <li class="cor">
                            <p>Hashtags: #login #authentication #websiteissue</p>

                        </li>

                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../js/script.js"></script>
    </body>

    </html>
    <?php
}
?>
