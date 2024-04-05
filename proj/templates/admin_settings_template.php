<?php
function draw_admin_settings(PDO $db)
{
    $departments = $db->query("SELECT * FROM Department")->fetchAll(PDO::FETCH_ASSOC);
    $statuses = $db->query("SELECT * FROM Status")->fetchAll(PDO::FETCH_ASSOC);
    $priorities = $db->query("SELECT * FROM Priority")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">

            </form>
            <label></label>
            <a href="../pages/profile.php" class="profile">
                <img src="../assets/user.png">
            </a>
        </nav>

        <main>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h1>Departments</h1>
                    </div>
                    <table>
                        <tbody>
                        <?php foreach ($departments as $department) { ?>
                            <tr>
                                <td><?php echo $department['name']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="order">
                    <div class="head">
                        <h1>Statuses</h1>
                    </div>
                    <table>
                        <tbody>
                        <?php foreach ($statuses as $status) { ?>
                            <tr>
                                <td><?php echo $status['name']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="order">
                    <div class="head">
                        <h1>Priorities</h1>
                    </div>
                    <table>
                        <tbody>
                        <?php foreach ($priorities as $priority) { ?>
                            <tr>
                                <td><?php echo $priority['name']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>
    <script src="../js/script.js"></script>
    </body>
    </html>
<?php } ?>
