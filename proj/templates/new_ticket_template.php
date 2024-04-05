<?php
function draw_new_ticket(PDO $db)
{
    $departments = $db->query("SELECT * FROM Department")->fetchAll(PDO::FETCH_ASSOC);
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
                    <h1>New ticket</h1>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="ticket-form">
                        <form action="../actions/create_ticket.php" method="POST">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Issue" />

                            <label for="department">Department</label>
                            <div class="department">
                                <?php foreach ($departments as $department) { ?>
                                    <label>
                                        <input type="radio" id="<?php echo $department['id']; ?>" name="department" value="<?php echo $department['name']; ?>" <?php if ($department['id'] === 1) echo 'checked'; ?> />
                                        <span class="ml-2"><?php echo $department['name']; ?></span>
                                    </label>
                                <?php } ?>
                            </div>

                            <label for="description">Description</label>
                            <textarea id="description" name="description" rows="3" placeholder="Description of the ticket"></textarea>

                            <button type="submit">Submit Ticket</button>
                        </form>
                    </div>
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
